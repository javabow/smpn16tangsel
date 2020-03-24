<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\AdminModel\Posts;
use App\AdminModel\Ekstrakurikuler;
use App\AdminModel\Staff;
use App\AdminModel\Contacts;

class HomepageController extends MyController
{
    protected $data;
    public function index()
    {
      $this->data['beritaTerbaru'] = Posts::orderBy('id', 'desc')->limit(6)->get();
      $this->data['ekstrakurikuler'] = Ekstrakurikuler::all();
      $this->data['tenagaPendidik'] = Staff::where('id_staff_position', 2)->get();
      $this->data['alumni'] = Staff::where('id_staff_position', 4)->get();
      $this->data['kontak'] = Contacts::find(1);
      return view('homepage', $this->data);
    }
}
