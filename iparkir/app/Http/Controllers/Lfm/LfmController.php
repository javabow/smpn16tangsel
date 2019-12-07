<?php

namespace App\Http\Controllers\Lfm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UniSharp\LaravelFilemanager\Traits\LfmHelpers;
use UniSharp\LaravelFilemanager\Controllers\LfmController as BaseLfmController;

class LfmController extends BaseLfmController
{
    //

   public function show()
   {
       return view('lfm.upload-thumbnail');
   }

}
