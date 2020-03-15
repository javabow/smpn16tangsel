<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Staff;
use App\AdminModel\StaffPosition;
use Illuminate\Support\Facades\Auth;

class TenagaPendidikController extends Controller
{
    public function index()
    {
        $staff = Staff::where('id_staff_position', '2')->get();
        return view('admin.tenaga-pendidik', ['staff'=>$staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.tenaga-pendidik-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
          'name' => 'required',
        ]);
        try
        {
          $request->merge(['id_staff_position'=>'2']);
          $newData = $request->only(['name', 'id_staff_position', 'biodata', 'email', 'subjects', 'dp']);
          $staff = new Staff;
          foreach ($newData as $key => $value) {
            if ($key == 'dp' && !$value) {
              $value = '/img/profil-pic_dummy.png';
            }
            $staff->{$key} = $value;
          }
          $staff->save();
          return back()->with('success', 'Tenaga pendidik berhasil ditambah');
        } catch (\Exception $e)
        {
          return back()->with('danger', 'Tenaga pendidik gagal ditambah : '. $e->getMessage());
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
      $staff = Staff::find($id);
      return view('admin.tenaga-pendidik-edit', ['staff'=>$staff]);
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
        //

        $validate = $request->validate([
          'name' => 'required',
        ]);
        try
        {
          $request->merge(['id_staff_position'=>'2']);
          $newData = $request->only(['name', 'id_staff_position', 'biodata', 'email', 'subjects', 'dp']);
          $staff = Staff::find($id);
          foreach ($newData as $key => $value) {
            if ($key == 'dp' && !$value) {
              $value = '/img/profil-pic_dummy.png';
            }
            $staff->{$key} = $value;
          }
          $staff->update();
          return back()->with('success', 'Tenaga pendidik berhasil diupdate');
        } catch (\Exception $e)
        {
          return back()->with('danger', 'Tenaga pendidik gagal diupdate : '. $e->getMessage());
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
      try {
        Staff::find($id)->delete();
        return back()->with('success', 'Tenaga pendidik berhasil dihapus');
      } catch (\Exception $e) {
        return back()->with('danger', 'Tenaga pendidik gagal dihapus : ');
      }

    }
}
