<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class TenantsPromo extends Model
{
    protected $table = 'tenants_promo';

    public function tenants()
    {
      return $this->belongsTo('\App\AdminModel\Tenants', 'id_tenants', 'id');
    }

    public function locations()
    {
      return $this->hasMany('\App\AdminModel\TenantsPromoLocations', 'id_tenants_promo', 'id');
    }

    public function fotos()
    {
      return $this->hasMany('\App\AdminModel\TenantsPromoFotos', 'id_tenants_promo', 'id');
    }
}
