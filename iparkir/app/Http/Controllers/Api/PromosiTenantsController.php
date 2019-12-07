<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\AdminModel\TenantsPromo;

class PromosiTenantsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = $request->input('where');
        $orderBy = $request->input('orderBy');
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        try {
          $tenantsPromo = new TenantsPromo();

          if ($where) {
            $where = explode(',', str_replace(' ', '', $where));
            $where[2] = strtolower($where[1]) == 'like' ? '%'.$where[2].'%' : $where[2];
            $tenantsPromo = $tenantsPromo->where($where[0], $where[1], $where[2]);
          }
          if ($orderBy) {
            $orderBy = explode(',', str_replace(' ', '', $orderBy));
            if (empty($orderBy[1])) {
              $orderBy[1] = 'asc';
            }
            $tenantsPromo = $tenantsPromo->orderBy($orderBy[0], $orderBy[1]);
          }
          if ($offset) {
            $tenantsPromo = $tenantsPromo->skip($offset);
          }
          if ($limit) {
            $tenantsPromo = $tenantsPromo->take($limit);
          }
          $tenantsPromo = $tenantsPromo->get();

          foreach ($tenantsPromo as $key => $value) {
            $tenantsPromo[$key]['fotos'] = $tenantsPromo[$key]->fotos;
            $tenantsPromo[$key]['locations'] = $tenantsPromo[$key]->locations;
            $tenantsPromo[$key]['tenants'] = $tenantsPromo[$key]->tenants;
            $tenantsPromo[$key]['tenants']['fotos'] = $tenantsPromo[$key]->tenants->fotos;
            $tenantsPromo[$key]['tenants']['locations'] = $tenantsPromo[$key]->tenants->locations;
            $tenantsPromo[$key]['tenants']['opening_hours'] = $tenantsPromo[$key]->tenants->openingHours;
          }
          return $this->sendResponse($tenantsPromo->toArray(), 'Promosi Tenants berhasil diselect');

        } catch (\Exception $e) {
          return $this->sendError($tenantsPromo->toArray(), 'Promosi Tenants gagal diselect');

        }

    }


}
