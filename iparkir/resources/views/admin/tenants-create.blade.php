@extends('layouts.admin')
@section('title')
Admin Page Pengelola Parkir | Tenants - Create
@endsection
@section('title-header')
  Create Tenants
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('css/tenants.css') }}">
@endsection
@section('js-head')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
@endsection
@section('content')
  <div class="container bg-light p-4">

    @include('layouts.alert-box')
    <form class="form-submit" action="{{ url('admin/tenants/') }}" method="post">
    <div class="form-group">
      <label for="name">Nama Tenants</label>
      <input id="name" class="form-control" type="text" name="name" >
    </div>
    <div class="form-group">
      <label for="description">Dekripsi Tenants</label>
      <textarea id="description" class="form-control" name="description" rows="8" cols="80"></textarea>
    </div>
    <div class="form-group">
      <label for="phone">No. Telp Tenants</label>
      <input id="phone" class="form-control" type="text" name="phone">
    </div>
    <div class="form-group border p-3">
      <label for="location">Lokasi Tenants</label>
      <p>Berapa jumlah lokasi yang ingin ditambahkan ? (Tekan TAB untuk Oke) <input type="number" id="loclen" value="1"></p>
      <div id="loc-container" class="form-group border p-3">
        <p>Lokasi 1</p>
        <label>Nama Lokasi</label> <input class="form-control" type="text" name="location_name[]" >
        <label>Alamat Lokasi</label> <input class="form-control" type="text" name="location_address[]" >
        <label>Latitude</label> <input class="form-control" type="number" name="lat[]" step="any">
        <label>Longitude</label> <input class="form-control" type="number" name="lng[]" step="any">
      </div>
    </div>
    <div class="form-group">
      <label for="info">Info Lebih Lanjut</label>
      <textarea id="more_info" class="form-control" name="more_info" rows="8" cols="80"></textarea>
    </div>
    <div class="form-group">
      @php
        $opHours = [
          'senin' => ['senin-open-time', 'senin-close-time'],
          'selasa' => ['selasa-open-time', 'selasa-close-time'],
          'rabu' => ['rabu-open-time', 'rabu-close-time'],
          'kamis' => ['kamis-open-time', 'kamis-close-time'],
          'jumat' => ['jumat-open-time', 'jumat-close-time'],
          'sabtu' => ['sabtu-open-time', 'sabtu-close-time'],
          'minggu' => ['minggu-open-time', 'minggu-close-time'],
        ];
      @endphp
      <label for="opening-hours">Jam Buka</label>
      @foreach ($opHours as $key => $op)
      <div class="opening-hours">
        <label>{{ ucwords($key) }}</label>:
        <input name="{{ $op[0] }}" type="text" class="form-control m-timepicker open-hour" readonly="" placeholder="Select time" value="7:00 AM">
        <label class="text-center">--</label>
        <input name="{{ $op[1] }}" type="text" class="form-control m-timepicker close-hour" readonly="" placeholder="Select time" value="9:00 PM">
        <input type="checkbox" class="24-jam">
        <label>Buka 24 Jam</label>
        <input type="checkbox" class="tutup-jam">
        <label>Tutup</label>
      </div>
      @endforeach
    </div>

    <div class="form-group" id="foto-container">
      <label for="foto"><strong>Foto Tenants</strong></label>
      <p>Berapa jumlah foto yang ingin diupload ? (Tekan TAB untuk Oke) <input type="number" id="fotolen" value="1"></p>
      <div id="lfm-container">
        <div class="input-group">
          <span class="input-group-btn">
            <a data-input="foto1" data-preview="holder1" class="btn btn-primary lfm">
              <i class="fas fa-image"></i> Choose
            </a>
          </span>
          <input id="foto1" class="form-control" type="text" name="foto[]">
        </div>
        <img id="holder1" style="margin-top:15px;max-height:100px;">
      </div>
    </div>

    <div class="form-group">
      <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-plus"></i> Create</button>
    </div>
    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  </div>
@endsection
@section('js')

  <script src="{{ asset('js/tenants.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/multi-location.js') }}" charset="utf-8"></script>
  <script>
  {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/multiple-lfm.js')) !!}
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
   $('.lfm').filemanager('image', {prefix: route_prefix});
  </script>

  <script>
  $(document).ready(function() {
    CKOPTIONS = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    };
    CKEDITOR.replace('description', CKOPTIONS);
    CKEDITOR.replace('more_info', CKOPTIONS);
  })
  </script>
@endsection
