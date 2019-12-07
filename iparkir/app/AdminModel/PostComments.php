<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComments extends Model
{
    protected $table = 'post_comments';
    use SoftDeletes;
    protected $dates =['deleted_at'];

    public function users()
    {
      return $this->hasOne('\App\AdminModel\Users', 'id', 'id_users');
    }

    public function posts()
    {
      return $this->belongsTo('\App\AdminModel\Posts', 'id_posts', 'id');
    }
}
