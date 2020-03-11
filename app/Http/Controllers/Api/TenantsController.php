<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\AdminModel\Tenants;

/**
 * @group Tenants
 * APIs for managing tenants
 */
class TenantsController extends BaseController
{


  /**
  * api/tenants
  * Api Tenants, select Tenants, Tenants Locations, Tenants Fotos, Tenants Opening Hours.
  * @queryParam where optional isi query string dengan 3 argumen, pisahkan dengan koma.  contoh: ?where=id,!=,1  Example: id,!=,1
  * @queryParam orderBy optional isi query string dengan 2 argumen, pisahkan dengan koma.  contoh: ?orderBy=id,DESC Example: id,DESC
  * @queryParam limit optional untuk membatasi banyak rows yang ditampilkan. contoh: ?limit=3. Example: 3
  * @queryParam offset optional (hanya bisa dipakai jika menggunakan query limit). contoh: ?offset=2. Example: 2
  */
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
