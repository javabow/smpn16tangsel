<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class WebsiteText extends Model
{
    //
    protected $table = 'website_text';

    public function pages() {
      return $this->belongsTo('App\AdminModel\PageStatus', 'id_pages', 'id');
    }
}
