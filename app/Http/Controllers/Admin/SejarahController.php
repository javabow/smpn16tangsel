<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Pages;
use Illuminate\Support\Facades\Auth;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $page = Pages::find(2);
      return view('admin.sejarah', ['page'=>$page, 'id'=>'2']);
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

   public function update(Request $request, $id)
   {
       //
       if (session('lang') == '_en') {
         $valid['title_en'] = 'required';
         $valid['content_en'] = 'required';
       } else {
         $valid['title'] = 'required';
         $valid['content'] = 'required';
       }
       $validate = $request->validate($valid);
       try {
         $request->merge(['id_page_status'=>'1']);
         $dataPages = $request->except(['category', 'parent-category', 'submit', '_method', '_token', 'cat', 'tags']);
         $pages = Pages::find($id);
         foreach ($dataPages as $key => $value) {
           $pages->{$key} = $value;
         }
         $pages->thumbnail = ($pages->thumbnail) ? $pages->thumbnail : 'img/blog-6.jpg';
         $pages->title_slug = str_slug($pages->title);
         $pages->updated_by = Auth::user()->id;
         $pages->update();
         return redirect()->back()->with('success', 'Sejarah sekolah berhasil dipublish');
       } catch (\Exception $e) {
         // return redirect()->back()->with('danger', 'Pages gagal di update');
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
