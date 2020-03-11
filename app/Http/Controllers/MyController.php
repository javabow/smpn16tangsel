<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Menus;
class MyController extends Controller
{
    //
    private $data;
    
    public function __construct()
    {
      $this->data['menus'] = Menus::where('id_pages', '1')->get();
      return $this->data;
    }

}
