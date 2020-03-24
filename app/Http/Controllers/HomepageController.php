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
      $this->data['beritaTerbaru'] = Posts::orderBy('updated_at', 'DESC')->limit(6)->get();
      $this->data['ekstrakurikuler'] = Ekstrakurikuler::all();
      $this->data['tenagaPendidik'] = Staff::where('id_staff_position', 2)->get();
      $this->data['alumni'] = Staff::where('id_staff_position', 4)->get();
      $this->data['kontak'] = Contacts::find(1);
      $this->data['prestasiTerbaru'] = Posts::whereHas('categories', function($q) {
        $q->where('categories.id', 3);
      })->orderBy('updated_at', 'DESC')->limit(3)->get();
      return view('homepage', $this->data);
    }
}
