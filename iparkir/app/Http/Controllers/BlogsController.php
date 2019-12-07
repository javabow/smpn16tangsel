<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Posts;
use App\AdminModel\Categories;
use App\AdminModel\Tags;
use Carbon\Carbon; //api datetime
use Illuminate\Support\Facades\DB;

class BlogsController extends MyController
{
    //
    protected $data;

    public function __construct()
    {
      $this->data = parent::__construct();
    }

    public function index()
    {
      // dd(\Request::ip());
      $this->data['posts'] = Posts::where('id_post_status', '1')->paginate(7);
      $this->data['tags'] = Tags::all();
      $this->data['categories'] = Categories::all();
      // $carbon = new Carbon($this->data['posts'][0]->updated_at);
      // echo $carbon->format('h:i:s A, l, j F Y');
      return view('blogs', ['data'=>$this->data]);
    }

    public function search(Request $request)
    {
      $text = $request->input('text');
      $tags = $request->input('tags');
      $categories = $request->input('categories');

      $this->data['posts'] = Posts::select('posts.*')
      ->where('id_post_status', '1')
      ->where('content', 'LIKE', '%'.$text.'%')
      ->orWhere('content_en', 'LIKE', '%'.$text.'%')
      ->orWhere('title', 'LIKE', '%'.$text.'%')
      ->orWhere('title', 'LIKE', '%'.$text.'%')
      // ->join('tags_posts', 'tags_posts.id_posts', 'posts.id')
      // ->join('categories_posts', 'categories_posts.id_posts', 'posts.id')
      // if ($tags) {
      //   foreach ($tags as $key => $value) {
      //     $this->data['posts']->where('tags_posts.id', $value);
      //   }
      // }
      ->paginate(7);
      $this->data['tags'] = Tags::all();
      $this->data['categories'] = Categories::all();
      // dd($this->data['posts']);
      return view('blogs', ['data'=>$this->data]);
    }


// // ... of course format() is still available
// echo $dt->format('l jS \\of F Y h:i:s A');         // Thursday 25th of December 1975 02:15:16 PM
//
// // The reverse hasFormat method allows you to test if a string looks like a given format
// var_dump($dt->hasFormat('Thursday 25th December 1975 02:15:16 PM', 'l jS F Y h:i:s A')); // bool(true)
}
