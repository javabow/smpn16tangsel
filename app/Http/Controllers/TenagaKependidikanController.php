<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Staff;

class TenagaKependidikanController extends MyController
{
    protected $data;
    public function index()
    {
      $this->data['tenagaKependidikan'] = Staff::where('id_staff_position', '3')->get();
      return view('tenaga-kependidikan', $this->data);
    }
}
