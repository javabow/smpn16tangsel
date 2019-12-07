<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Tenants;
use App\AdminModel\TenantsPromo;
use App\AdminModel\TenantsPromoLocations;
use App\AdminModel\TenantsPromoFotos;

class PromosiTenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenantsPromos = TenantsPromo::all();
        return view('admin.promosi-tenants', ['tenantsPromos' => $tenantsPromos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tenants = Tenants::all();
        return view('admin.promosi-tenants-create', ['tenants' => $tenants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validate = $request->validate([
        'product_name' => 'required',
        'id_tenants' => 'required',
        'promo_date' => 'required',
        'promo_end_date' => 'required',
      ]);
      try
      {
        $dataTenantsPromo = $request->only(['id_tenants', 'product_name', 'promo_date', 'promo_end_date', 'description', 'more_info']);
        $dataTenantsPromo['promo_date'] = date('Y-m-d', strtotime($dataTenantsPromo['promo_date']));
        $dataTenantsPromo['promo_end_date'] = date('Y-m-d', strtotime($dataTenantsPromo['promo_end_date']));
        $dataTenantsPromoLocations = $request->only(['location_name', 'location_address', 'lat', 'lng']);
        $dataTenantsPromoFotos = $request->only('foto');
        $tenantsPromo = new TenantsPromo;
        foreach ($dataTenantsPromo as $key => $value) {
          $tenantsPromo->{$key} = $value;
        }
        $tenantsPromo->save();
        if (array_key_exists('location_name', $dataTenantsPromoLocations) && $dataTenantsPromoLocations['location_name'][0]) {
          for ($i=0; $i < count($dataTenantsPromoLocations['location_name']); $i++) {
            $tenantsPromoLocations = new TenantsPromoLocations;
            $tenantsPromoLocations->name = $dataTenantsPromoLocations['location_name'][$i];
            $tenantsPromoLocations->address = $dataTenantsPromoLocations['location_address'][$i];
            $tenantsPromoLocations->lat = $dataTenantsPromoLocations['lat'][$i];
            $tenantsPromoLocations->lng = $dataTenantsPromoLocations['lng'][$i];
            $tenantsPromoLocations->id_tenants_promo = $tenantsPromo->id;
            $tenantsPromoLocations->save();
          }
        }

        if (array_key_exists('foto', $dataTenantsPromoFotos) && $dataTenantsPromoFotos['foto'][0]) {
          foreach ($dataTenantsPromoFotos['foto'] as $key => $value) {
            $tenantsPromoFotos = new TenantsPromoFotos;
            $tenantsPromoFotos->name = $value;
            $tenantsPromoFotos->path = $value;
            $tenantsPromoFotos->id_tenants_promo = $tenantsPromo->id;
            $tenantsPromoFotos->save();
          }
        }
        return redirect('/admin/promosi-tenants/')->with('success', 'Promosi Tenant berhasil ditambahkan');
      } catch (\Exception $e)
      {
          return back()->with('danger', 'Promosi Tenant gagal ditambahkan : '. $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenants = Tenants::all();
        $tenantsPromo = TenantsPromo::find($id);
        return view('admin.promosi-tenants-edit', ['id' => $id, 'tenants' => $tenants, 'tenantsPromo' => $tenantsPromo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validate = $request->validate([
        'product_name' => 'required',
        'id_tenants' => 'required',
        'promo_date' => 'required',
        'promo_end_date' => 'required',
      ]);
      try
      {
        $dataTenantsPromo = $request->only(['id_tenants', 'product_name', 'promo_date', 'promo_end_date', 'description', 'more_info']);
        $dataTenantsPromo['promo_date'] = date('Y-m-d', strtotime($dataTenantsPromo['promo_date']));
        $dataTenantsPromo['promo_end_date'] = date('Y-m-d', strtotime($dataTenantsPromo['promo_end_date']));
        $dataTenantsPromoLocations = $request->only(['location_name', 'location_address', 'lat', 'lng']);
        $dataTenantsPromoFotos = $request->only('foto');
        $tenantsPromo = TenantsPromo::find($id);
        foreach ($dataTenantsPromo as $key => $value) {
          $tenantsPromo->{$key} = $value;
        }
        $tenantsPromo->update();
        TenantsPromoLocations::where('id_tenants_promo', $id)->delete();
        if (array_key_exists('location_name', $dataTenantsPromoLocations) && $dataTenantsPromoLocations['location_name'][0]) {
          for ($i=0; $i < count($dataTenantsPromoLocations['location_name']); $i++) {
            $tenantsPromoLocations = new TenantsPromoLocations;
            $tenantsPromoLocations->name = $dataTenantsPromoLocations['location_name'][$i];
            $tenantsPromoLocations->address = $dataTenantsPromoLocations['location_address'][$i];
            $tenantsPromoLocations->lat = $dataTenantsPromoLocations['lat'][$i];
            $tenantsPromoLocations->lng = $dataTenantsPromoLocations['lng'][$i];
            $tenantsPromoLocations->id_tenants_promo = $id;
            $tenantsPromoLocations->save();
          }
        }

        TenantsPromoFotos::where('id_tenants_promo', $id)->delete();
        if (array_key_exists('foto', $dataTenantsPromoFotos) && $dataTenantsPromoFotos['foto'][0]) {
          foreach ($dataTenantsPromoFotos['foto'] as $key => $value) {
            $tenantsPromoFotos = new TenantsPromoFotos;
            $tenantsPromoFotos->name = $value;
            $tenantsPromoFotos->path = $value;
            $tenantsPromoFotos->id_tenants_promo = $tenantsPromo->id;
            $tenantsPromoFotos->save();
          }
        }
        return redirect('/admin/promosi-tenants/')->with('success', 'Promosi Tenant berhasil diupdate');
      } catch (\Exception $e)
      {
        dd($e->getMessage());
        return back()->with('danger', 'Promosi Tenant gagal diupdate : '. $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TenantsPromo::find($id)->delete();
      return back()->with('success', 'Promosi Tenant berhasil dihapus');
    }
}
