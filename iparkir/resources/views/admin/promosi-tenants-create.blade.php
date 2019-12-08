@extends('layouts.admin')
@section('title')
Admin Page Pengelola Parkir | Promosi Tenants - Create
@endsection
@section('title-header')
  Create Promosi Tenants
@endsection
@section('js-head')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
@endsection
@section('content')
  <div class="container bg-light p-4">
    @include('layouts.alert-box')
    <form action="{{ url('admin/promosi-tenants/') }}" method="post">
    <div class="form-group">
      <label for="id_tenants">Pilih Tenants</label>
      <select class="id_tenants form-control" id="id_tenants" name="id_tenants">
        @foreach ($tenants as $tenant)
          <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="product_name">Nama Produk</label>
      <input id="product_name" class="form-control" type="text" name="product_name">
    </div>
    <div class="form-group border p-3">
      <label for="location">Lokasi Promo</label>
      <p>Berapa jumlah lokasi yang ingin ditambahkan ? (Tekan TAB untuk Oke) <input type="number" id="loclen" value="1"></p>
      <div id="loc-container" class="form-group border p-3">
        <div class="ss1">
          <p>Lokasi 1</p>
          <label>Nama Lokasi</label> <input class="form-control" type="text" name="location_name[]" >
          <label>Alamat Lokasi</label> <input class="form-control" type="text" name="location_address[]" >
          <label>Latitude</label> <input class="form-control" type="number" name="lat[]" step="any">
          <label>Longitude</label> <input class="form-control" type="number" name="lng[]" step="any">
          <br>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="promo_date">Tanggal Promosi</label>
      <input name="promo_date" type="text" class="form-control m-datepicker" readonly="" placeholder="Select Date">
    </div>
    <div class="form-group">
      <label for="promo_end_date">Tanggal Akhir Promosi</label>
      <input name="promo_end_date" type="text" class="form-control m-datepicker" readonly="" placeholder="Select Date">
    </div>
    <div class="form-group">
      <label for="description">Deskripsi Produk</label>
      <textarea id="description" class="form-control" name="description" rows="8" cols="80"></textarea>
    </div>
    <div class="form-group">
      <label for="more_info">Info Lebih Lanjut Produk</label>
      <textarea id="more_info" class="form-control" name="info" rows="8" cols="80"></textarea>
    </div>

    <div class="form-group" id="foto-container">
      <label for="foto"><strong>Foto Produk</strong></label>
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
    <script src="{{ asset('js/multi-location.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
      $('.m-datepicker').datepicker();
    </script>
    <script type="text/javascript">
      $('#id_tenants').select2();
    </script>
    <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/multiple-lfm.js')) !!}
     var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
     $('.lfm').filemanager('image', {prefix: route_prefix});

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
