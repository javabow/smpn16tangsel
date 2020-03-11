<?php

namespace App\Http\Controllers\PengelolaParkir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JuruParkirController extends Controller
{
    public function isAdmin()
    {
      $userLevel = Auth::user()->id_user_roles;
      return ($userLevel == 2)  ? true : false;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Users::where('id_user_roles', '4')->get();
        return view('pengelola.juru-parkir', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengelola.juru-parkir-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validate = $request->validate([
          'name' => 'required',
          'username' => 'required',
          'email' => 'required',
          'password' => 'required',
          're-password' => 'required',
        ]);
        try
        {
          if ($request->input('password') != $request->input('re-password')) {
            return back()->with('danger', 'Account gagal diupdate (Password dan Re-password tidak sama)');
          }
          $newData = $request->only(['name', 'username', 'email', 'password', 'dp']);
          $user = new Users;
          $user->{'id_user_roles'} = '4';
          foreach ($newData as $key => $value) {
            if ($key == 'password') {
              $value = Hash::make($value);
            }
            if ($key == 'dp' && !$value) {
              $value = 'img/dp.jpg';
            }
            $user->{$key} = $value;
          }
          $user->save();
          return redirect('admin/pengelola-parkir/juru-parkir')->with('success', 'Account berhasil diupdate');
        } catch (\Exception $e)
        {
          if ($e->errorInfo[1] == '1062') {
            return back()->with('danger', 'Account gagal diupdate : Username sudah terpakai');
          } else {
            return back()->with('danger', 'Account gagal diupdate');
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Users::find($id);
        return view('pengelola.juru-parkir-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
          'name' => 'required',
          'username' => 'required',
          'email' => 'required',
          'password' => 'required',
          're-password' => 'required',
        ]);
        try
        {
          if ($request->input('password') != $request->input('re-password')) {
            return back()->with('danger', 'Harap isi password dan re-password');
          }
          $newData = $request->only(['name', 'username', 'email', 'password', 'dp', 'id_user_roles']);
          $user = Users::find($id);
          foreach ($newData as $key => $value) {
            if ($key == 'password') {
              $value = Hash::make($value);
            }
            if ($key == 'dp' && !$value) {
              $value = 'img/dp.jpg';
            }
            $user->{$key} = $value;
          }
          $user->update();
          return redirect('admin/pengelola-parkir/juru-parkir')->with('success', 'Account berhasil diupdate');
        } catch (\Exception $e)
        {
          if ($e->errorInfo[1] == '1062') {
            return back()->with('danger', 'Account gagal diupdate : Username sudah terpakai');
          } else {
            return back()->with('danger', 'Account gagal diupdate');
          }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id)
        {
          return back()->with('danger', 'Account gagal dihapus : Maaf tidak bisa menghapus account sendiri');
        }
        else if (!$this->isAdmin())
        {
          return back()->with('danger', 'Ups anda tidak memiliki wewenang..');
        }
        else
        {
          Users::find($id)->delete();
          return back()->with('success', 'Account berhasil dihapus');
        }
    }
}
