@extends('layouts.admin')
@section('title')
Admin Page iParkir | Users - Edit
@endsection
@section('title-header')
  Edit User
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
    <form class="form-submit" action="{{ url('admin/tenants/'.$id) }}" method="post">
    <div class="form-group">
      <label for="name">Nama Tenants</label>
      <input id="name" class="form-control" type="text" name="name" value="{{ $tenant->name }}">
    </div>
    <div class="form-group">
      <label for="description">Dekripsi Tenants</label>
      <textarea id="description" class="form-control" name="description" rows="8" cols="80">{{ $tenant->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="phone">No. Telp Tenants</label>
      <input id="phone" class="form-control" type="text" name="phone" value="{{ $tenant->phone }}">
    </div>
    <div class="form-group border p-3">
      <label for="location">Lokasi Tenants</label>
      <p>Berapa jumlah lokasi yang ingin ditambahkan ? (Tekan TAB untuk Oke) <input type="number" id="loclen" value="1"></p>
      <div id="loc-container" class="form-group border p-3">
        @php
          $i = 1
        @endphp
        @foreach ($tenant->locations as $key => $value)
          <p>Lokasi {{ $i++ }}</p>
          <label>Nama Lokasi</label> <input class="form-control" type="text" name="location_name[]" value="{{ $value->name }}">
          <label>Alamat Lokasi</label> <input class="form-control" type="text" name="location_address[]" value="{{ $value->address }}">
          <label>Latitude</label> <input class="form-control" type="number" name="lat[]" step="any" value="{{ $value->lat }}">
          <label>Longitude</label> <input class="form-control" type="number" name="lng[]" step="any" value="{{ $value->lng }}">
          <br>
        @endforeach
      </div>
    </div>
    <div class="form-group">
      <label for="info">Info Lebih Lanjut</label>
      <textarea id="more_info" class="form-control" name="more_info" rows="8" cols="80">{{ $tenant->more_info }}</textarea>
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
      @php
        $i = 0
      @endphp
      <label for="opening-hours">Jam Buka</label>
      {{-- {{ dd($tenant->openingHours[6]->open_time) }} --}}

      @foreach ($opHours as $key => $op)
      <div class="opening-hours">
        <label>{{ ucwords($key) }}</label>:
        <input name="{{ $op[0] }}" type="text" class="form-control m-timepicker open-hour" readonly="" placeholder="Select time" value="{{ $tenant->openingHours[$i]->open_time }}" {{ ($tenant->openingHours[$i]->open_time == '-') ? 'disabled' : '' }}>
        <label class="text-center">--</label>
        <input name="{{ $op[1] }}" type="text" class="form-control m-timepicker close-hour" readonly="" placeholder="Select time" value="{{ $tenant->openingHours[$i]->close_time }}" {{ ($tenant->openingHours[$i]->open_time == '-') ? 'disabled' : '' }}>
        <input type="checkbox" class="24-jam"
        {{ ($tenant->openingHours[$i]->close_time == $tenant->openingHours[$i]->open_time && $tenant->openingHours[$i]->open_time != '-') ? 'checked' : '' }}
        >
        <label>Buka 24 Jam</label>
        <input type="checkbox" class="tutup-jam"
        {{ ($tenant->openingHours[$i]->open_time == '-') ? 'checked' : '' }}
        >
        <label>Tutup</label>
      </div>
      @php
        $i++
      @endphp
      @endforeach
    </div>

    <div class="form-group" id="foto-container">
      <label for="foto"><strong>Foto Tenants</strong></label>
      <p>Berapa jumlah foto yang ingin diupload ? (Tekan TAB untuk Oke) <input type="number" id="fotolen" value="1"></p>
      <div id="lfm-container">
        @php
          $i = 1
        @endphp
        @foreach ($tenant->fotos as $key => $value)
          <div class="input-group">
            <span class="input-group-btn">
              <a data-input="foto{{ $i }}" data-preview="holder{{ $i }}" class="btn btn-primary lfm">
                <i class="fas fa-image"></i> Choose
              </a>
            </span>
            <input id="foto{{ $i }}" class="form-control" type="text" name="foto[]" value="{{ $value->path }}">
          </div>
          <img id="holder{{ $i }}" src="{{ asset($value->path) }}" style="margin-top:15px;max-height:100px;">
          <br>
          <br>
          @php
            $i++
          @endphp
        @endforeach
      </div>

      {{--  --}}

    </div>

    <div class="form-group">
      <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-edit"></i> Update</button>
    </div>
    <input type="hidden" name="id" value="{{ $id }}">
    <input type="hidden" name="_method" value="patch">
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
  $(document).ready(function() {
    $('.open-hour[disabled]').val('-');
    $('.close-hour[disabled]').val('-');
  });
  </script>
@endsection
