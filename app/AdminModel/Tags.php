<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $table = 'tags';

    public function posts()
    {
      return $this->belongsToMany('\App\AdminModel\Posts', 'tags_posts', 'id_posts', 'id_tags');
    }
}
