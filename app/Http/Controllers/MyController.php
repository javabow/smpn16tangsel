<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Categories;
use App\AdminModel\Tags;
use App\AdminModel\Posts;

class MyController extends Controller
{
    //
    protected $data;
    public function __construct()
    {
      $this->data['categories'] = Categories::all();
      $this->data['tags'] = Tags::all();

      $this->data['footerInfoSekolah'] = Posts::whereHas('categories', function($q) {
        $q->where('categories.id', 1);
      })->orderBy('updated_at', 'DESC')->limit(2)->get();
      $this->data['footerAgendaSekolah'] = Posts::whereHas('categories', function($q) {
        $q->where('categories.id', 2);
      })->orderBy('updated_at', 'DESC')->limit(2)->get();
    }

}
