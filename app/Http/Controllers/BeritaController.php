<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\AdminModel\Posts;
use App\AdminModel\Categories;
use Illuminate\Support\Facades\DB;

class BeritaController extends MyController
{
    protected $data;
    private $category;
    private $tags;

    public function index($category='', $tag='', Request $request)
    {
      $search = $request->input('search');
      $this->data['search'] = $search;
      $category = trim($category);
      $tag = trim($tag);
      $this->data['category'] = $category;
      $this->data['tag'] = $tag;
      if ($search) {
        $this->data['berita'] = Posts::where('title', 'LIKE', '%'.$search.'%')
        ->orWhereHas('categories', function($q) {
          $q->where('categories.name', 'LIKE', '%'.$this->data['search'].'%');
        })->orWhereHas('tags', function($q) {
          $q->where('tags.name', 'LIKE', '%'.$this->data['search'].'%');
        })->paginate(7);
      }
      else if ((!$category && !$tag) || $category == 'terbaru')
      {
        $this->data['berita'] = Posts::orderBy('updated_at', 'DESC')->paginate(7);
      }
      else if (!$tag)
      {
        $this->data['berita'] = Posts::whereHas('categories', function($q) {
          $q->where('categories.id', $this->data['category']);
        })->orderBy('updated_at', 'DESC')->paginate(7);
      } else
      {
        $this->data['berita'] = Posts::whereHas('tags', function($q) {
          $q->where('tags.id', $this->data['tag']);
        })->paginate(7);
      }
      $this->data['categoryName'] = Categories::find($category);
      return view('berita', $this->data);
    }
}
