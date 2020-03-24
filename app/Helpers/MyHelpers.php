<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
 *
 */
class MyHelpers
{
  public static function getCustomDate($waktu='')
  {
    echo '<h4><span>'.date('d', strtotime($waktu)).'</span>'.date('M, Y', strtotime($waktu)).'</h4>';
  }

  public static function getCustomDate2($waktu='')
  {
    echo date('d F Y', strtotime($waktu));
  }

  public static function getCustomDate3($waktu='')
  {
    echo date('d M, Y', strtotime($waktu));
  }
}

 ?>
