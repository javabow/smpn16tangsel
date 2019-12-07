<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\PostComments;
use Auth;
use App\AdminModel\Users;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MyNotification;
use App\User;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = PostComments::select('id_users')->where('id', $id)->first();
        $user =  ($user) ? $user->id_users : 0;

        if ($user == Auth::user()->id) {
          PostComments::find($id)->delete();
          PostComments::where('comments_on_comment', $id)->delete();
          return true;
        } else {
          return false;
        }
    }

    public function comments(Request $request)
    {
      if (!Auth::user()) {
        return back()->with('danger', 'Ups, harap login untuk komentar');
      }
      $validate = $request->validate([
        'content' => 'required',
      ]);
      $data = [
        'id_users' => Auth::user()->id,
        'content' => $request->input('content'),
        'ip' => $request->ip(),
        'comments_on_comment' => $request->input('comments_on_comment'),
        'id_posts' => $request->input('id_posts')
      ];
      $postComments = new PostComments;
      foreach ($data as $key => $value) {
        $postComments->{$key} = $value;
      }
      $postComments->save();

      // Notif
      $users = User::where('id_user_roles', '1')->get();
      $details = [
        'from' => Auth::user()->id,
        'comment' => $request->input('content'),
        'id_comment' => $postComments->id,
        'notif' => Auth::user()->name.' mengomentari postingan <a href="'.asset('blog').'/'.$postComments->posts->title_slug.'">'.$postComments->posts->title.'</a>',
      ];
      Notification::send($users, new MyNotification($details));
      return back()->with('success', 'Komentarmu berhasil ditambahkan');
    }

    public function delete($id)
    {
      if ($this->destroy($id)) {
        return back()->with('success', 'Komentarmu berhasil dihapus');
      } else {
        return back()->with('danger', 'Komentarmu gagal dihapus');
      }
    }


}
