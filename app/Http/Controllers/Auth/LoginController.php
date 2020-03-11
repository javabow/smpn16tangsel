<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\AdminModel\Users;
use Hash;
use Auth;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /**
    * Redirect the user to the GitHub authentication page.
    *
    * @return \Illuminate\Http\Response
    */
   public function redirectToProvider($social)
   {
       session(['urlPrev'=> url()->previous()]);
       return Socialite::driver($social)->redirect();
   }

   /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
   public function handleProviderCallback($social)
   {
     // init
       $user = Socialite::driver($social)->user();
       $username = $user->id.'-'.$user->email;
       $provider_id = '';
       switch ($social) {
         case 'google': $provider_id = '1'; break;
         case 'github': $provider_id = '2'; break;
         case 'facebook': $provider_id = '3'; break;
         case 'instagram': $provider_id = '4'; break;
         case 'twitter': $provider_id = '5'; break;
       }
       $manRequest =  [
         'name' => $user->name,
         'username' => $username,
         'email' => $user->email,
         'password' => Hash::make(md5($username)),
         'dp' => $user->avatar,
         'provider' => $social,
         'provider_id' => $provider_id,
         'id_user_roles' => 3
       ];
       // insert into database
       if (Users::where('username', $username)->doesntExist()) {
         try {
           $users = new Users;
           foreach ($manRequest as $key => $value) {
             $users->{$key} = $value;
           }
           $users->save();
         } catch (\Exception $e)
         {
           dd($e->getMessage());
         }
       }

       $credentials = [
         'username' => $manRequest['username'],
         'password' => md5($username),
       ];
       // echo '<p>'.$manRequest['username'].'</p>';
       // echo '<p>'.md5($username).'</p>';
       Auth::attempt($credentials);
       return redirect(session('urlPrev').'#comment-textarea');
   }
   function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
