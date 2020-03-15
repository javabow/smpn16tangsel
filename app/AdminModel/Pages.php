<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    public function pageStatus()
    {
      return $this->hasOne('\App\AdminModel\PageStatus', 'id', 'id_page_status');
    }
}
