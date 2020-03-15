<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Ekstrakurikuler;
use Illuminate\Support\Facades\Auth;

class EkstrakurikulerController extends Controller
{
    private $colorList = ['mariner', 'java', 'malachite', 'brilliantrose', 'casablanca', 'emerald', 'cinnabar', 'plum'];
    private $iconList = ['flaticon-faculty-shield', 'flaticon-book', 'flaticon-book-1', 'flaticon-book-2', 'flaticon-diploma', 'flaticon-scholarship', 'flaticon-trending', 'flaticon-online-course', 'flaticon-books', 'flaticon-reading', 'flaticon-presentation', 'flaticon-professor', 'flaticon-training', 'flaticon-learning', 'flaticon-education', 'flaticon-print', 'flaticon-software', 'flaticon-feature', 'flaticon-interaction', 'flaticon-conveyor', 'flaticon-firewall', 'flaticon-potential', 'flaticon-potential-1', 'flaticon-code', 'flaticon-web-design', 'flaticon-html', 'flaticon-artificial-intelligence', 'flaticon-gear', 'flaticon-medal', 'flaticon-contract', 'flaticon-teacher-lecture-in-front-an-auditory', 'flaticon-manager', 'flaticon-translate', 'flaticon-translator', 'flaticon-online', 'flaticon-university-campus'];
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', ['ekstrakurikuler'=>$ekstrakurikuler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.ekstrakurikuler-create', ['colorList'=>$this->colorList, 'iconList'=>$this->iconList]);
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
          'icon' => 'required',
          'color' => 'required',
        ]);
        try
        {
          $newData = $request->only(['name', 'icon', 'color']);
          $ekstrakurikuler = new Ekstrakurikuler;
          foreach ($newData as $key => $value) {
            $ekstrakurikuler->{$key} = $value;
          }
          $ekstrakurikuler->save();
          return back()->with('success', 'Ekstrakurikuler berhasil ditambah');
        } catch (\Exception $e)
        {
          return back()->with('danger', 'Ekstrakurikuler gagal ditambah : '. $e->getMessage());
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
      $ekstrakurikuler = Ekstrakurikuler::find($id);
      return view('admin.ekstrakurikuler-edit', ['ekstrakurikuler'=>$ekstrakurikuler, 'colorList'=>$this->colorList, 'iconList'=>$this->iconList]);
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
          'icon' => 'required',
          'color' => 'required',
        ]);
        try
        {
          $newData = $request->only(['name', 'icon', 'color']);
          $ekstrakurikuler = Ekstrakurikuler::find($id);
          foreach ($newData as $key => $value) {
            $ekstrakurikuler->{$key} = $value;
          }
          $ekstrakurikuler->update();
          return back()->with('success', 'Ekstrakurikuler berhasil diupdate');
        } catch (\Exception $e)
        {
          return back()->with('danger', 'Ekstrakurikuler gagal diupdate : '. $e->getMessage());
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
        Ekstrakurikuler::find($id)->delete();
        return back()->with('success', 'Ekstrakurikuler berhasil dihapus');
      } catch (\Exception $e) {
        return back()->with('danger', 'Ekstrakurikuler gagal dihapus : ');
      }

    }
}
