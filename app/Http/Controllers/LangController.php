<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    //
    public function lang($lang = '')
    {
      if ($lang == 'en') {
        session(['lang' => '_en']);
      } else {
        session(['lang' => '']);
      }
      return back();
    }
}
