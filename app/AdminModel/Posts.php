<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = 'posts';

    public function postStatus()
    {
      return $this->hasOne('\App\AdminModel\PostStatus', 'id', 'id_post_status');
    }

    public function categories()
    {
      return $this->belongsToMany('\App\AdminModel\Categories', 'categories_posts', 'id_posts', 'id_categories');
    }

    public function tags()
    {
      return $this->belongsToMany('\App\AdminModel\Tags', 'tags_posts', 'id_posts', 'id_tags');
    }

    public function users()
    {
      return $this->belongsTo('\App\AdminModel\Users', 'created_by', 'id');
    }

    public function postComments()
    {
      return $this->hasMany('\App\AdminModel\PostComments', 'id_posts', 'id');
    }
}
