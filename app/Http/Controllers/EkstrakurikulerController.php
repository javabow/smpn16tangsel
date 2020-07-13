<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Ekstrakurikuler;

class EkstrakurikulerController extends MyController
{
    public function show($id)
    {
      $this->data['ekskul'] = Ekstrakurikuler::find($id);
      return view('ekstrakurikuler', $this->data);
    }
}
