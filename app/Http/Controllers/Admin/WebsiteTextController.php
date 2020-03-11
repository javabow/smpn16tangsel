<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\WebsiteText;

class WebsiteTextController extends Controller
{

    public function edit($id)
    {
      if ($id === '1') {
        $websiteText = WebsiteText::where('id_pages', '1')->get();
        return view('admin.pages-custom', ['websiteText' => $websiteText]);
      } else {
        return view('admin.pages-custom-blog');
      }
    }

    public function update(Request $request, $id)
    {
        //
        try {
          // pisahkan id dengan name="editor-x" bawaan CKEDITOR
          foreach ($request->input() as $key => $content) {
            if (preg_match('/editor-(.+)/', $key, $matches)) {
                // simpan berdasarkan id website text dari name="editor-xxx"
                // matches[1] menyimpan id-nya
                $id = $matches[1]; // id_website_text
                $websiteText = WebsiteText::find($id);
                $websiteText->{'content'.session('lang')} = $content;
                $websiteText->save();
            }
          }
          return redirect()->back()->with('success', 'Data berhasil di update');
        } catch (\Exception $e) {
          return redirect()->back()->with('danger', 'Data gagal di update');
        }

    }
}
