<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Tenants;
use App\AdminModel\TenantsLocations;
use App\AdminModel\TenantsOpeningHours;
use App\AdminModel\TenantsFotos;
use Illuminate\Support\Facades\Auth;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenants::all();
        return view('admin.tenants', ['tenants' => $tenants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tenants-create');
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
        'name' => 'required',
      ]);
      try
      {
        $dataTenant = $request->only(['name', 'description', 'phone', 'more_info']);
        $dataTenantLocations = $request->only(['location_name', 'location_address', 'lat', 'lng']);
        $opHours = ['senin-open-time', 'senin-close-time', 'selasa-open-time', 'selasa-close-time', 'rabu-open-time', 'rabu-close-time', 'kamis-open-time', 'kamis-close-time', 'jumat-open-time', 'jumat-close-time', 'sabtu-open-time', 'sabtu-close-time', 'minggu-open-time', 'minggu-close-time'];
        // array_values() returns all the values from the array and indexes the array numerically.
        $dataTenantOpeningHours = array_values($request->only($opHours));
        $dataTenantFotos = $request->only('foto');
        $tenant = new Tenants;
        foreach ($dataTenant as $key => $value) {
          $tenant->{$key} = $value;
        }
        $tenant->id_users = Auth::user()->id;
        $tenant->save();
        if (array_key_exists('location_name', $dataTenantLocations) && $dataTenantLocations['location_name'][0]) {
          for ($i=0; $i < count($dataTenantLocations['location_name']); $i++) {
            $tenantLocation = new TenantsLocations;
            $tenantLocation->name = $dataTenantLocations['location_name'][$i];
            $tenantLocation->address = $dataTenantLocations['location_address'][$i];
            $tenantLocation->lat = $dataTenantLocations['lat'][$i];
            $tenantLocation->lng = $dataTenantLocations['lng'][$i];
            $tenantLocation->id_tenants = $tenant->id;
            $tenantLocation->save();
          }
        }

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jum\'at', 'sabtu', 'minggu'];
        $j = 0;
        for ($i=0; $i < 14; $i+=2) {
          $tenantOpeningHours = new TenantsOpeningHours;
          $tenantOpeningHours->day = $days[$j++];
          $tenantOpeningHours->open_time = $dataTenantOpeningHours[$i];
          $tenantOpeningHours->close_time = $dataTenantOpeningHours[$i+1];
          $tenantOpeningHours->id_tenants = $tenant->id;
          $tenantOpeningHours->save();
        }
        if (array_key_exists('foto', $dataTenantFotos) && $dataTenantFotos['foto'][0]) {
          foreach ($dataTenantFotos['foto'] as $key => $value) {
            $tenantFotos = new TenantsFotos;
            $tenantFotos->name = $value;
            $tenantFotos->path = $value;
            $tenantFotos->id_tenants = $tenant->id;
            $tenantFotos->save();
          }
        }
        return redirect('/admin/tenants/')->with('success', 'Tenant berhasil ditambahkan');
      } catch (\Exception $e)
      {
        dd($e->getMessage());
          return back()->with('danger', 'Tenant gagal ditambahkan : '. $e->getMessage());
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
      $tenant = Tenants::find($id);
      return view('admin.tenants-edit', ['id' => $id, 'tenant' => $tenant]);
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
        'name' => 'required',
      ]);
      try
      {
        $id_tenants = $request->input('id');
        $dataTenant = $request->only(['name', 'description', 'phone', 'more_info']);
        $dataTenantLocations = $request->only(['location_name', 'location_address', 'lat', 'lng']);
        $opHours = ['senin-open-time', 'senin-close-time', 'selasa-open-time', 'selasa-close-time', 'rabu-open-time', 'rabu-close-time', 'kamis-open-time', 'kamis-close-time', 'jumat-open-time', 'jumat-close-time', 'sabtu-open-time', 'sabtu-close-time', 'minggu-open-time', 'minggu-close-time'];
        // array_values() returns all the values from the array and indexes the array numerically.
        $dataTenantOpeningHours = array_values($request->only($opHours));
        $dataTenantFotos = $request->only('foto');
        $tenant = Tenants::find($id_tenants);
        foreach ($dataTenant as $key => $value) {
          $tenant->{$key} = $value;
        }
        $tenant->id_users = Auth::user()->id;
        $tenant->update();
        TenantsLocations::where('id_tenants', $id)->delete();
        if (array_key_exists('location_name', $dataTenantLocations) && $dataTenantLocations['location_name'][0]) {
          for ($i=0; $i < count($dataTenantLocations['location_name']); $i++) {
            $tenantLocation = new TenantsLocations;
            $tenantLocation->name = $dataTenantLocations['location_name'][$i];
            $tenantLocation->address = $dataTenantLocations['location_address'][$i];
            $tenantLocation->lat = $dataTenantLocations['lat'][$i];
            $tenantLocation->lng = $dataTenantLocations['lng'][$i];
            $tenantLocation->id_tenants = $tenant->id;
            $tenantLocation->save();
          }
        }

        TenantsOpeningHours::where('id_tenants', $id)->delete();
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jum\'at', 'sabtu', 'minggu'];
        $j = 0;
        for ($i=0; $i < 14; $i+=2) {
          $tenantOpeningHours = new TenantsOpeningHours;
          $tenantOpeningHours->day = $days[$j++];
          $tenantOpeningHours->open_time = $dataTenantOpeningHours[$i];
          $tenantOpeningHours->close_time = $dataTenantOpeningHours[$i+1];
          $tenantOpeningHours->id_tenants = $tenant->id;
          $tenantOpeningHours->save();
        }
        TenantsFotos::where('id_tenants', $id)->delete();
        if (array_key_exists('foto', $dataTenantFotos) && $dataTenantFotos['foto'][0]) {
          foreach ($dataTenantFotos['foto'] as $key => $value) {
            $tenantFotos = new TenantsFotos;
            $tenantFotos->name = $value;
            $tenantFotos->path = $value;
            $tenantFotos->id_tenants = $tenant->id;
            $tenantFotos->save();
          }
        }
        return redirect('/admin/tenants/')->with('success', 'Tenant berhasil diupdate');
      } catch (\Exception $e)
      {
          return back()->with('danger', 'Tenant gagal diupdate : '. $e->getMessage());
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
        Tenants::find($id)->delete();
        return back()->with('success', 'Tenant berhasil dihapus');
    }
}
