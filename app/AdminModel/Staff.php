<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staff';

    public function staffPosition()
    {
      return $this->hasOne('\App\AdminModel\StaffPosition', 'id', 'id_staff_position');
    }
}
