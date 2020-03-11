<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Users;
use App\AdminModel\UserRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function isAdmin()
    {
      $userLevel = Auth::user()->id_user_roles;
      return ($userLevel == 1)  ? true : false;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->isAdmin()) {
          $users = Users::all();
          return view('admin.users', ['users'=>$users]);
        } else {
          return back()->with('danger', 'Ups anda tidak memiliki wewenang..');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if ($this->isAdmin()) {
        $userRoles = UserRoles::all();
        return view('admin.users-create', ['userRoles'=>$userRoles]);
      } else {
        return back()->with('danger', 'Ups anda tidak memiliki wewenang..');
      }
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
          'password' => 'required',
          're-password' => 'required',
        ]);
        try
        {
          $newData = $request->only(['name', 'username', 'email', 'password', 'dp', 'id_user_roles']);
          $user = new Users;
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
          return back()->with('success', 'Account berhasil diupdate');
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
      if ($this->isAdmin() || Auth::user()->id == $id) {
        $user = Users::find($id);
        $userRoles = UserRoles::all();
        return view('admin.users-edit', ['user'=>$user, 'userRoles'=>$userRoles]);
      } else {
        return back()->with('danger', 'Ups anda tidak memiliki wewenang..');
      }
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
          return back()->with('success', 'Account berhasil diupdate');
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
