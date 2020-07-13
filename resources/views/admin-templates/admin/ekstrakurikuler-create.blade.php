@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Ekstrakurikuler - Create
@endsection
@section('title-header')
  Create Ekstrakurikuler
@endsection
@section('js-head')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
@endsection
@section('content')
  <div class="container bg-light p-4">

    @include('admin-templates.alert-box')
    <form action="{{ url('admin/ekstrakurikuler/') }}" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" class="form-control" type="text" name="name" >
    </div>
    <div class="form-group">
      <label for="icon">Icon</label>
      <select id="icon" class="select2" name="icon">
        @foreach ($iconList as $key => $value)
          <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
      </select>
      <strong class="mx-3">Icon Selected: <i id="icon-selected" class="icon-list {{ $iconList[0] }}"></i></strong>
      <hr>
      <div class="icon-list-container">
        @foreach ($iconList as $key => $value)
          <i class="{{ $value }} icon-list" val="{{ $value }}"></i>
        @endforeach
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="color">Color</label>
      <select id="color" class="select2" name="color">
        @foreach ($colorList as $key => $value)
          <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
      </select>
      <strong class="mx-3">Color selected : </strong>
      <div id="color-selected" class="top-cat-area d-inline-block vertical-align-middle">
        <div class="top-cat-items inc-bg-color">
          <div class="item {{ $colorList[0] }}">
            <a class="p-4"></a>
          </div>
        </div>
      </div>
      <hr>
      @foreach ($colorList as $key => $value)
        <div class="top-cat-area d-inline-block color-list" val="{{ $value }}">
          <div class="top-cat-items inc-bg-color">
            <div class="item {{ $value }}">
              <a class="p-4 mx-3 cursor-pointer"></a>
            </div>
          </div>
        </div>
      @endforeach
      <hr>
    </div>

    <div class="form-group">
      <label for="content"><strong>Content</strong></label>
      <textarea id="content" class="form-control" name="content"></textarea>
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
  <script>
  $(document).ready(function() {
    CKOPTIONS = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    };
    CKEDITOR.replace('content', CKOPTIONS);
  })
  </script>
    <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
     var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
     $('#lfm').filemanager('image', {prefix: route_prefix});

     $(document).ready(function() {
          $icon = $('#icon').select2();
          $color = $('#color').select2();
          //icon list click
          $('.icon-list').on('click', function() {
            val = $(this).attr('val');
            $icon.val(val).trigger('change');
            $('#icon-selected').attr('class', 'icon-list '+val);
          });
          $icon.on('select2:select', function() {
            val = $(this).val();
            $('#icon-selected').attr('class', 'icon-list '+val);
          });

          $('.color-list').on('click', function() {
            val = $(this).attr('val');
            $color.val(val).trigger('change');
            $('#color-selected .item').attr('class', 'item '+val);
          });
          $color.on('select2:select', function() {
            val = $(this).val();
            $('#color-selected .item').attr('class', 'item '+val);
          });
      });

    </script>
@endsection
