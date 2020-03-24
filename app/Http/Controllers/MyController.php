<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Categories;
use App\AdminModel\Tags;

class MyController extends Controller
{
    //
    protected $data;
    public function __construct()
    {
      $this->data['categories'] = Categories::all();
      $this->data['tags'] = Tags::all();
    }

}
