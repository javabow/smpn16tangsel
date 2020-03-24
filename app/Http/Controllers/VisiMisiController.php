<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Pages;

class VisiMisiController extends MyController
{
    protected $data;
    public function index()
    {
      $this->data['visimisi'] = Pages::find(3);
      return view('visi-misi', $this->data);
    }
}
