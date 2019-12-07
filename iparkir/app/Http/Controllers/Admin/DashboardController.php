<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Users;
use App\AdminModel\Pages;
use App\AdminModel\Posts;
use App\AdminModel\ParamDetails;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stickyNote = ParamDetails::where('id', '0020')->first();
        $stickyNote = $stickyNote ? $stickyNote->description : '';
        $posts = Posts::all();
        $pages = Pages::all();
        $users = Users::all();
        $views = Posts::sum('views');
        $top3Article = Posts::orderBy('views', 'desc')->limit(3)->get();

        $data = [
          'posts' => $posts,
          'pages' => $pages,
          'users' => $users,
          'views' => $views,
          'top3Article' => $top3Article,
          'stickyNote' => $stickyNote,
        ];
        return view('admin.dashboard', $data);
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
        //
    }

    public function editStickyNote()
    {
      $stickyNote = ParamDetails::where('id', '0020')->first();
      $stickyNote = $stickyNote ? $stickyNote->description : '';
      return view('admin.set-sticky', ['stickyNote'=>$stickyNote]);
    }
    public function updateStickyNote(Request $request)
    {
      $request->validate([
        'description' => 'required',
      ]);
      $stickyNote = ParamDetails::where('id', '0020')->first();
      $stickyNote->description = $request->input('description');
      $stickyNote->update();
      return redirect('/admin/dashboard')->with('success', 'Sticky Note berhasil di edit');
    }
}
