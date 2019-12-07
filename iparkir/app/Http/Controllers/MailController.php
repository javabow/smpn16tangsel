<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function testmail()
    {
      Mail::to('jabbarujang@gmail.com')->send(new Email());
    }
    public function subscribe(Request $request)
    {
      return back();
      $email = $request->input('email');
      Mail::to($email)->send(new Email());
    }
}
