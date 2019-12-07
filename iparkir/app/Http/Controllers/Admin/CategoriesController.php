<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoriyes = [];
        $catParent = Categories::where('level', 0)->where('parent', NULL)->get();
        $catChild = Categories::where('level', '>', 0)->where('parent', '!=', 'NULL')->get();
        $c = 0;
        for ($i=0; $i < count($catParent); $i++) {
          $categoriyes[$c++] = $catParent[$i];
          for ($j=0; $j < count($catChild); $j++) {
            if ($catChild[$j]->parent == $catParent[$i]->id) {
              $categoriyes[$c] = $catChild[$j];
              for ($k=0; $k < count($catChild); $k++) {
                if ($categoriyes[$c]->id == $catChild[$k]->parent) {
                  $categoriyes[++$c] = $catChild[$k];
                }
              }
              $c++;
            }
          }
        }
        $categories = Categories::all();
        return view('admin.categories', ['categories'=>$categories, 'categoriyes'=>$categoriyes]);
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
        try {
          $name = $request->input('category');
          $parent = $request->input('parent');
          if (Categories::where('name', $name)->where('parent', $parent)->doesntExist()) {
            $parentRow = Categories::find($parent);
            $parentLevel = ($parentRow) ? $parentRow->level : 0;
            $categories = new Categories;
            $categories->name = $name;
            $categories->name_en = $name;
            $categories->parent = $parent;
            $categories->level = ($parentLevel + 1);
            $categories->save();
            return redirect('admin/posts/create');
          }
          else {
            echo 'Data sudah ada';
          }

        } catch(\Exception $e)
        {
          dd($e->getMessage());
        }
        // else {
        //   $request->merge(['name_en'=>$name]);
        //   $this->update($request, Categories::where('name', $name)->first()->id);
        // }
    }

    public function add(Request $request)
    {
      $validation = $request->validate([
        'name' => 'required'
      ]);
      $parent = $request->input('parent-category');
      $level = Categories::select('level')->where('id', $parent)->first();
      if ($level) {
        $level = $level->level;
      } else {
        $level = -1;
      }
      $name = $request->input('name');
      if (Categories::where('name', $name)->doesntExist()) {
        $categories = new Categories;
        $categories->name = $name;
        $categories->name_en = $name;
        $categories->parent = $parent;
        $categories->level = $level+1;
        $categories->save();
      }
      return back()->with('success', 'Categories berhasil ditambah');
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
        // $categories = Categories::find($id);
        // foreach ($request as $key => $value) {
        //   $categories->{$key} = $value;
        // }
        // $categories->update();
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

    public function inlineUpdate(Request $request, $id)
    {
      // $id
        try {
           $tags = Categories::find($id);
           $tags->name = $request->input('name');
           $tags->name_en = $tags->name;
           $tags->update();
           return redirect()->back()->with('success', 'Categories berhasil diupdate');
         } catch (\Exception $e) {
           // return redirect()->back()->with('danger', 'Posts gagal di update');
           print_r($e->getMessage());
         }
    }
    public function inlineDelete($id)
    {
      try {
         Categories::where('parent', $id)->delete();
         Categories::find($id)->delete();
         return redirect()->back()->with('success', 'Categories berhasil dihapus');
       } catch (\Exception $e) {
         // return redirect()->back()->with('danger', 'Posts gagal di update');
         print_r($e->getMessage());
       }
    }
}
