<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\AdminModel\Tenants;

class TenantsController extends BaseController
{

   public function index(Request $request)
   {
       $where = $request->input('where');
       $orderBy = $request->input('orderBy');
       $limit = $request->input('limit');
       $offset = $request->input('offset');

       try {
         $tenants = new tenants();
         if ($where) {
           $where = explode(',', str_replace(' ', '', $where));
           $where[2] = strtolower($where[1]) == 'like' ? '%'.$where[2].'%' : $where[2];
           $tenants = $tenants->where($where[0], $where[1], $where[2]);
         }
         if ($orderBy) {
           $orderBy = explode(',', str_replace(' ', '', $orderBy));
           if (empty($orderBy[1])) {
             $orderBy[1] = 'asc';
           }
           $tenants = $tenants->orderBy($orderBy[0], $orderBy[1]);
         }
         if ($offset) {
           $tenants = $tenants->skip($offset);
         }
         if ($limit) {
           $tenants = $tenants->take($limit);
         }
         $tenants = $tenants->get();

         foreach ($tenants as $key => $value) {
           $tenants[$key]['fotos'] = $tenants[$key]->fotos;
           $tenants[$key]['locations'] = $tenants[$key]->locations;
           $tenants[$key]['opening_hours'] = $tenants[$key]->openingHours;
         }

         return $this->sendResponse($tenants->toArray(), 'Tenants berhasil diselect');
       } catch (\Exception $e) {
         return $this->sendError($tenants->toArray(), 'Tenants gagal diselect');
       }

   }
}
