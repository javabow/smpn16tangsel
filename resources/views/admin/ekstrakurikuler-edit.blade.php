@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Ekstrakurikuler - Edit
@endsection
@section('title-header')
  Edit Ekstrakurikuler
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('admin-templates.alert-box')
    <form action="{{ url('admin/ekstrakurikuler/'.$ekstrakurikuler->id) }}" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input id="name" class="form-control" type="text" name="name" value="{{ $ekstrakurikuler->name }}">
      </div>
      <div class="form-group">
        <label for="icon">Icon</label>
        <select id="icon" class="select2" name="icon">
          @foreach ($iconList as $key => $value)
            <option value="{{ $value }}" @if ($value == $ekstrakurikuler->icon)
              selected
            @endif>{{ $value }}</option>
          @endforeach
        </select>
        <strong class="mx-3">Icon Selected: <i id="icon-selected" class="icon-list {{ $ekstrakurikuler->icon }}"></i></strong>
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
            <option value="{{ $value }}" @if ($value == $ekstrakurikuler->color)
              selected
            @endif>{{ $value }}</option>
          @endforeach
        </select>
        <strong class="mx-3">Color selected : </strong>
        <div id="color-selected" class="top-cat-area d-inline-block vertical-align-middle">
          <div class="top-cat-items inc-bg-color">
            <div class="item {{ $ekstrakurikuler->color }}">
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
      <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-edit"></i> Update</button>
    </div>
    <input type="hidden" name="_method" value="patch">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  </div>


@endsection
@section('js')

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
