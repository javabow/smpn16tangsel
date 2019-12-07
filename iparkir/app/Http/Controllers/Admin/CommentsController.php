<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\PostComments;
use App\AdminModel\Notifications;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = PostComments::all();
        return view('admin.comments', ['comments'=>$comments]);
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
    public function show($id, Request $request)
    {
        $id_notif = $request->input('id_notif');
        $notification = Notifications::find($id_notif);
        $notification->read_at = \Carbon\Carbon::now();
        $notification->update();
        $comment = PostComments::find($id);
        return view('admin.comments-show', ['comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = PostComments::find($id);
      return view('admin.comments-edit', ['comment'=>$comment]);
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
      $validate = $request->validate([
        'content' => 'required',
      ]);
      try
      {
        $comment = PostComments::find($id);
        $comment->content = $request->input('content');
        $comment->update();
        return back()->with('success', 'Comment berhasil diupdate');
      } catch (\Exception $e)
      {
        return back()->with('danger', 'Comment gagal diupdate');
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
      try {
        PostComments::find($id)->delete();
        PostComments::where('comments_on_comment', $id)->delete();
        return back()->with('success', 'Comment berhasil dihapus');
      } catch (\Exception $e) {
        return back()->with('danger', 'Comment gagal dihapus');
      }

    }
}
