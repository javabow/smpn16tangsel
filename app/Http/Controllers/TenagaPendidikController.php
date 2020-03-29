<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Staff;

class TenagaPendidikController extends MyController
{
    protected $data;
    public function index()
    {
      $this->data['kepsek'] = Staff::find(1);
      $this->data['tenagaPendidik'] = Staff::where('id_staff_position', '2')->get();
      return view('tenaga-pendidik', $this->data);
    }
}
