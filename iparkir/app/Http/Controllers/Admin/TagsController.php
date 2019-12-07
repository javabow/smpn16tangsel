<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Tags;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tags::all();
        return view('admin.tags', ['tags'=>$tags]);
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
        if ($request->input('page_id')) {
          return $this->storeFromPosts($request);
        } else {
          $name = $request->input('name');
          if(Tags::where('name', $name)->doesntExist()){
            $tags = new Tags;
            $tags->name = $name;
            $tags->name_en = $name;
            $tags->save();
          }
        }
        return back()->with('success', 'Tags berhasil ditambahkan');
    }

    public function storeFromPosts(Request $request)
    {
      $tag = $request->input('tag');
      if (Tags::where('name', $tag)->exists()) {
        dd('ups, tidak bisa store data');
      } else {
        $tags = new Tags;
        $tags->name = $tag;
        $tags->name_en = $tag;
        $tags->save();
        return redirect('admin/posts/'.$request->input('page_id').'/edit');
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

    public function inlineUpdate(Request $request, $id)
    {
      // $id
        try {
           $tags = Tags::find($id);
           $tags->name = $request->input('name');
           $tags->name_en = $tags->name;
           $tags->update();
           return redirect()->back()->with('success', 'Tags berhasil diupdate');
         } catch (\Exception $e) {
           // return redirect()->back()->with('danger', 'Posts gagal di update');
           print_r($e->getMessage());
         }
    }
    public function inlineDelete($id)
    {
      try {
         Tags::find($id)->delete();
         return redirect()->back()->with('success', 'Tags berhasil dihapus');
       } catch (\Exception $e) {
         // return redirect()->back()->with('danger', 'Posts gagal di update');
         print_r($e->getMessage());
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
        //

    }
}
