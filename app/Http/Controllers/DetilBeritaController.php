<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Posts;

class DetilBeritaController extends MyController
{
    protected $data;
    public function index($id)
    {
      $this->data['berita'] = Posts::find($id);
      return view('detil-berita', $this->data);
    }
}
