<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Categories;
use App\AdminModel\Tags;
use App\AdminModel\Posts;

class MyController extends Controller
{
    //
    protected $data;
    public function __construct()
    {
      $this->data['sText'] = $this->getSText();

      $this->data['categories'] = Categories::all();
      $this->data['tags'] = Tags::all();

      $this->data['footerInfoSekolah'] = Posts::whereHas('categories', function($q) {
        $q->where('categories.id', 1);
      })->orderBy('updated_at', 'DESC')->limit(2)->get();
      $this->data['footerAgendaSekolah'] = Posts::whereHas('categories', function($q) {
        $q->where('categories.id', 2);
      })->orderBy('updated_at', 'DESC')->limit(2)->get();
    }

    public function getSText()
    {
      $sText = (Object) [
        'profilSekolah' => 'Profil Sekolah',
        'profilSekolah_en' => 'School Profile',
        'kataSambutan' => 'Kata Sambutan',
        'kataSambutan_en' => 'Opening Speech',
        'sejarah' => 'Sejarah',
        'sejarah_en' => 'History',
        'visimisi' => 'Visi & Misi',
        'visimisi_en' => 'Vision & Mission',
        'staf' => 'Staf',
        'staf_en' => 'Staff',
        'tenagaPendidik' => 'Tenaga Pendidik',
        'tenagaPendidik_en' => 'Teachers',
        'tenagaKependidikan' => 'Tenaga Kependidikan',
        'tenagaKependidikan_en' => 'Educational Staff',
        'berita' => 'Berita',
        'berita_en' => 'News',
        'ekstrakurikuler' => 'Ekstrakurikuler',
        'ekstrakurikuler_en' => 'Extracurricular',
        'prestasi' => 'Prestasi',
        'prestasi_en' => 'Achievements',
        'profilAlumni' => 'Profil Alumni',
        'profilAlumni_en' => 'Alumni Profile',
        'kontak' => 'Kontak',
        'kontak_en' => 'Contact',
        'bahasa' => 'Bahasa',
        'bahasa_en' => 'Language',
        'beritaTerbaru' => 'Berita Terbaru',
        'beritaTerbaru_en' => 'Latest News',
        'tampilkanSemuaBerita' => 'Tampilkan Semua Berita',
        'tampilkanSemuaBerita_en' => 'Show All News',
        'prestasiTerbaru' => 'Prestasi Terbaru',
        'prestasiTerbaru_en' => 'Latest Achievements',
        'tampilkanSemuaPrestasi' => 'Tampilkan Semua Prestasi',
        'tampilkanSemuaPrestasi_en' => 'Show All Achievements',
        'prestasiInternasional' => 'Prestasi <br /> Internasional',
        'prestasiInternasional_en' => 'International <br /> Achievements',
        'prestasiTingkatNasional' => 'Prestasi <br /> Tingkat Nasional',
        'prestasiTingkatNasional_en' => 'National <br /> Achievements',
        'prestasiTingkatProvinsi' => 'Prestasi <br /> Tingkat Provinsi',
        'prestasiTingkatProvinsi_en' => 'Provincial <br /> Achievements',
        'prestasiTingkatKabupaten' => 'Prestasi <br /> Tingkat Kabupaten',
        'prestasiTingkatKabupaten_en' => 'District <br /> Achievements',
        'tampilkanSemuaTenagaPendidik' => 'Tampilkan Semua Tenaga Pendidik',
        'tampilkanSemuaTenagaPendidik_en' => 'Show All Teachers',
        'hubungiKami' => 'Hubungi Kami',
        'hubungiKami_en' => 'Contact Us',
        'denahLokasi' => 'Denah Lokasi',
        'denahLokasi_en' => 'Site Plan',
        'alamat' => 'Alamat',
        'alamat_en' => 'Address',
        'nomorTelepon' => 'Nomor Telepon',
        'nomorTelepon_en' => 'Phone Number',
        'cari' => 'Cari',
        'cari_en' => 'Search',
        'cariApa' => 'Apa yang ingin Anda cari ?',
        'cariApa_en' => 'What are You looking for ?',
        'kategori' => 'Kategori',
        'kategori_en' => 'Categories',
        'bacaLebihLanjut' => 'Baca Lebih Lanjut',
        'bacaLebihLanjut_en' => 'Read More',
        'nama' => 'Nama',
        'nama_en' => 'Name',
        'tenagaPendidik2' => 'Tenaga Pendidik',
        'tenagaPendidik2_en' => 'Teacher',
      ];

      return $sText;
    }
}
