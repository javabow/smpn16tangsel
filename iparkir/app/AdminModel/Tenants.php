<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenants extends Model
{
      protected $table = 'tenants';
      use SoftDeletes;
      protected $dates = ['deleted_at'];

      public function locations()
      {
        return $this->hasMany('\App\AdminModel\TenantsLocations', 'id_tenants', 'id');
      }
      public function openingHours()
      {
        return $this->hasMany('\App\AdminModel\TenantsOpeningHours', 'id_tenants', 'id');
      }
      public function fotos()
      {
        return $this->hasMany('\App\AdminModel\TenantsFotos', 'id_tenants', 'id');
      }
}
