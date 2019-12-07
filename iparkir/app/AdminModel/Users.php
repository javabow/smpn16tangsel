<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';

    public function userRoles()
    {
      return $this->hasOne('\App\AdminModel\UserRoles', 'id', 'id_user_roles');
    }
}
