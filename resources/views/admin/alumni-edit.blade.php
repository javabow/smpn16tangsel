@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Staff - Alumni - Edit
@endsection
@section('title-header')
  Edit Staff - Alumni
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('admin-templates.alert-box')
    <form action="{{ url('admin/alumni/'.$staff->id) }}" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" class="form-control" type="text" name="name" value="{{ $staff->name }}" >
    </div>
    <div class="form-group">
      <label for="biodata">Biodata</label>
      <textarea id="biodata" class="form-control" name="biodata" rows="8" cols="80">{{ $staff->biodata }}</textarea>
    </div>
    <div class="form-group">
      <label for="subjects">Subjects</label>
      <input id="subjects" class="form-control" type="text" name="subjects" value="{{ $staff->subjects }}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" class="form-control" type="email" name="email" value="{{ $staff->email }}">
    </div>
    <div class="form-group">
      <label for="dp"><strong>Foto Profile</strong></label>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="dp" data-preview="holder" class="btn btn-primary">
            <i class="fas fa-image"></i> Choose
          </a>
        </span>
        <input id="dp" class="form-control" type="text" name="dp" value="{{ $staff->dp }}">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ asset($staff->dp) }}">
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
  </script>
@endsection
