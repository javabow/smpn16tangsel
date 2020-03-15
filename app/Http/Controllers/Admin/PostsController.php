<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Posts;
use App\AdminModel\Categories;
use App\AdminModel\Tags;
use App\AdminModel\CategoriesPosts;
use App\AdminModel\TagsPosts;
use App\AdminModel\PostStatus;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $postStatus = PostStatus::where('id', '!=', '3')->get();
        $posts = Posts::all();
        return view('admin.posts', ['posts'=>$posts, 'postStatus'=>$postStatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = [];
        $catParent = Categories::where('level', 0)->where('parent', NULL)->get();
        $catChild = Categories::where('level', '>', 0)->where('parent', '!=', 'NULL')->get();
        $c = 0;
        for ($i=0; $i < count($catParent); $i++) {
          $categories[$c++] = $catParent[$i];
          for ($j=0; $j < count($catChild); $j++) {
            if ($catChild[$j]->parent == $catParent[$i]->id) {
              $categories[$c] = $catChild[$j];
              for ($k=0; $k < count($catChild); $k++) {
                if ($categories[$c]->id == $catChild[$k]->parent) {
                  $categories[++$c] = $catChild[$k];
                }
              }
              $c++;
            }
          }
        }
        $tags = Tags::all();
        return view('admin.posts-create', ['categories'=>$categories, 'tags'=>$tags]);
    }

    public function createPost(Request $request)
    {
      if (session('lang') == '_en') {
        $valid['title_en'] = 'required';
        $valid['content_en'] = 'required';
      } else {
        $valid['title'] = 'required';
        $valid['content'] = 'required';
      }
      $validate = $request->validate($valid);

      try {
        if ($request->input('submit') == 'draft')
        {
          $request->merge(['id_post_status'=>'2']);
        } else if ($request->input('submit') == 'publish')
        {
          $request->merge(['id_post_status'=>'1']);
        }
        $dataPosts = $request->except(['category', 'parent-category', 'submit', '_method', '_token', 'cat', 'tags']);
        $posts = new Posts;
        foreach ($dataPosts as $key => $value) {
          $posts->{$key} = $value;
        }
        if ($posts->title) {
          $posts->title_en = $posts->title;
          $posts->content_en = $posts->content;
        } else {
          $posts->title = $posts->title_en;
          $posts->content = $posts->content_en;
        }
        $posts->thumbnail = ($posts->thumbnail) ? $posts->thumbnail : 'img/blog-6.jpg';
        $posts->title_slug = str_slug($posts->title);
        $posts->created_by = Auth::user()->id;
        $posts->updated_by = Auth::user()->id;
        $posts->save();
        $id = $posts->id;

        $categories = $request->input('cat');
        $tags = $request->input('tags');
        if ($categories) {
          foreach ($categories as $cat) {
            $catId = $this->getCategoryId($cat);
            $categoriesPosts = new CategoriesPosts;
            $categoriesPosts->id_posts = $id;
            $categoriesPosts->id_categories = $catId;
            $categoriesPosts->save();
          }
        }
        if ($tags) {
          foreach ($tags as $tag) {
            $tagId = $this->getTagId($tag);
            $tagsPosts = new TagsPosts;
            $tagsPosts->id_posts = $id;
            $tagsPosts->id_tags = $tagId;
            $tagsPosts->save();
          }
        }
        return redirect('/admin/posts')->with('success', 'Posts berhasil tambahkan');
      } catch(\Exception $e)
      {
          dd($e->getMessage());
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
        $post = Posts::find($id);
        $categories = [];
        $catParent = Categories::where('level', 0)->where('parent', NULL)->get();
        $catChild = Categories::where('level', '>', 0)->where('parent', '!=', 'NULL')->get();
        $c = 0;
        for ($i=0; $i < count($catParent); $i++) {
          $categories[$c++] = $catParent[$i];
          for ($j=0; $j < count($catChild); $j++) {
            if ($catChild[$j]->parent == $catParent[$i]->id) {
              $categories[$c] = $catChild[$j];
              for ($k=0; $k < count($catChild); $k++) {
                if ($categories[$c]->id == $catChild[$k]->parent) {
                  $categories[++$c] = $catChild[$k];
                }
              }
              $c++;
            }
          }
        }
        $tags = Tags::all();
        // dd($post->categories);
        return view('admin.posts-edit', ['id'=>$id, 'categories'=>$categories, 'tags'=>$tags, 'post'=>$post]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  public function updatePost($request, $id) {
      if (session('lang') == '_en') {
        $valid['title_en'] = 'required';
        $valid['content_en'] = 'required';
      } else {
        $valid['title'] = 'required';
        $valid['content'] = 'required';
      }
      $validate = $request->validate($valid);
      $categories = $request->input('cat');
      $tags = $request->input('tags');
      $dataPosts = $request->except(['category', 'parent-category', 'submit', '_method', '_token', 'cat', 'tags']);
      $posts = Posts::find($id);
      $posts->id_post_status = 2;
      foreach ($dataPosts as $key => $value) {
        $posts->{$key} = $value;
      }
      $posts->thumbnail = ($posts->thumbnail) ? $posts->thumbnail : 'img/blog-6.jpg';
      $posts->title_slug = str_slug($posts->title);
      $posts->updated_by = Auth::user()->id;
      $posts->update();

      $this->resetCategories($id);
      if ($categories) {
        foreach ($categories as $cat) {
          $catId = $this->getCategoryId($cat);
          $categoriesPosts = new CategoriesPosts;
          $categoriesPosts->id_posts = $id;
          $categoriesPosts->id_categories = $catId;
          $categoriesPosts->save();
        }
      }

      $this->resetTags($id);
      if ($tags) {
        foreach ($tags as $tag) {
          $tagId = $this->getTagId($tag);
          $tagsPosts = new TagsPosts;
          $tagsPosts->id_posts = $id;
          $tagsPosts->id_tags = $tagId;
          $tagsPosts->save();
        }
      }
  }

   public function updateSaveDraft(Request $request, $id) {
     try {
         $request->merge(['id_post_status'=>'2']);
         $this->updatePost($request, $id);
         return redirect()->back()->with('success', 'Posts berhasil disave');
      } catch (\Exception $e) {
       // return redirect()->back()->with('danger', 'Posts gagal di update');
        print_r($e->getMessage());
      }
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

        if ($request->input('submit') == 'draft') {
          $this->updateSaveDraft($request, $id);
          return redirect()->back()->with('success', 'Posts berhasil disave');
        } else {
          try {
            $request->merge(['id_post_status'=>'1']);
            $this->updatePost($request, $id);
            return redirect()->back()->with('success', 'Posts berhasil dipublish');
          } catch (\Exception $e) {
            // return redirect()->back()->with('danger', 'Posts gagal di update');
            print_r($e->getMessage());
          }
        }
    }

    public function updateStatus(Request $request, $id)
    {
      try {
        $posts = Posts::find($id);
        $posts->id_post_status = $request->input('id_post_status');
        $posts->update();
        return redirect()->back()->with('success', 'Status Post berhasil diubah');
      } catch (\Exception $e) {
        print_r($e->getMessage());
      }

    }

    public function getCategoryId($string)
    {
      if(preg_match('/^([0-9]+)-.+$/', $string, $matches)) {
        return $matches[1];
      }
    }

    public function getTagId($string)
    {
      if(preg_match('/^([0-9]+)-.+$/', $string, $matches)) {
        return $matches[1];
      }
    }

    public function resetCategories($id_posts)
    {
      CategoriesPosts::where('id_posts', $id_posts)->delete();
    }

    public function resetTags($id_posts)
    {
      TagsPosts::where('id_posts', $id_posts)->delete();
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
        Posts::find($id)->delete();
        return back()->with('success', 'Posts berhasil dihapus');
    }
}
