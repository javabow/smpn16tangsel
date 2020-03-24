<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Pages;

class SejarahSekolahController extends MyController
{
    protected $data;
    public function index()
    {
      $this->data['sejarah'] = Pages::find(2);
      return view('sejarah-sekolah', $this->data);
    }
}
