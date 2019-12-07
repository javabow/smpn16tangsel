<?php

namespace App\Http\Middleware;
use App\AdminModel\Notifications;
use Closure;
use Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function checkNotif() {
       $notif = Notifications::where('notifiable_id', Auth::user()->id)->orderBy('updated_at', 'desc')->limit(10)->get();
       $notif_unread = Notifications::where('notifiable_id', Auth::user()->id)->where('read_at', NULL)->orderBy('updated_at', 'desc')->limit(10)->get();
       session(['notif' => $notif]);
       session(['notif_unread' => $notif_unread]);
       foreach (session('notif') as $key => $value) {
         session('notif')[$key]->data = json_decode($value->data);
       }
     }
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id_user_roles == '1') {
          // check notif dulu
          $this->checkNotif();
          // dd(session('notif')[0]->data->notif);
          return $next($request);
        } else if (Auth::user()->id_user_roles == '2') {
          $this->checkNotif();
          return redirect('/admin/pengelola-parkir');
        } else {
          return redirect('/');
        }
    }
}
