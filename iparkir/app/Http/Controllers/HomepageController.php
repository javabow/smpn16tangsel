<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\WebsiteText;
use App\AdminModel\Contacts;

class HomepageController extends MyController
{
    //
    protected $data;

    public function __construct()
    {
      $this->data = parent::__construct();
    }

    public function index()
    {
      $this->data['website_text'] = WebsiteText::where(['id_pages'=>'1'])->get();
      $this->data['contacts'] = Contacts::all();
      return view('homepage', ['data'=>$this->data]);
    }
}
