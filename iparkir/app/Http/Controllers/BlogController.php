<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Posts;
use App\AdminModel\PostComments;
use Auth;

class BlogController extends MyController
{
    //
    protected $data;

    public function __construct()
    {
      $this->data = parent::__construct();
    }

    public function show($titleSlug) {
      if ($post = Posts::where('title_slug', $titleSlug)->where('id_post_status', '1')->first()) {
        $id = $post->id;
        $this->refreshViewers($post);
        $nextPost = Posts::where('id', '>', $post->id)->first();
        $prevPost = Posts::where('id', '<', $post->id)->orderBy('id', 'DESC')->first();
        // dd($post->postComments[0]->users);
        $parentComments = PostComments::where('id_posts', $id)->where('comments_on_comment', '0')->orderBy('id')->orderBy('updated_at')->get();
        $childComments = PostComments::where('id_posts', $id)->where('comments_on_comment', '!=', '0')->orderBy('id')->orderBy('updated_at')->get();
        return view('blog', ['data'=>$this->data, 'post'=>$post, 'nextPost'=>$nextPost, 'prevPost'=>$prevPost, 'id'=>$id, 'parentComments'=>$parentComments, 'childComments'=>$childComments]);
      } else {
        return abort(404);
      }
    }
    public function refreshViewers($post) {
      $post->views++;
      $post->update();
    }
    public function preview($titleSlug)
    {
      if ($post = Posts::where('title_slug', $titleSlug)->first()) {
        $nextPost = Posts::where('id', '>', $post->id)->first();
        $prevPost = Posts::where('id', '<', $post->id)->orderBy('id', 'DESC')->first();
        return view('blog', ['data'=>$this->data, 'post'=>$post, 'nextPost'=>$nextPost, 'prevPost'=>$prevPost]);
      } else {
        return abort(404);
      }
    }
}
