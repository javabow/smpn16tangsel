<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Pages;

class KataSambutanController extends MyController
{
    protected $data;
    public function index()
    {
      $this->data['kataSambutan'] = Pages::find(1);
      return view('kata-sambutan', $this->data);
    }
}
