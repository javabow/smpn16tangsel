<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Users;

class SendNotifController extends Controller
{
    public function NotifCommentar()
    {
      $users = Users::where('id_user_roles', '1')->get();
      $details = [
        // 'greeting' => 'Hi Artisan',
        // 'body' => 'This is my first notification from ItSolutionStuff.com',
        // 'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
        // 'actionText' => 'View My Site',
        // 'actionURL' => url('/'),
        'order_id' => 105,
        'from' => 1,
      ];
      Notification::send($user, new MyNotification($details));
    }
}
