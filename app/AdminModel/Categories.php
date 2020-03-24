<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'categories';


    public function posts()
    {
      return $this->belongsToMany('\App\AdminModel\Posts', 'categories_posts', 'id_posts', 'id_categories');
    }
}
