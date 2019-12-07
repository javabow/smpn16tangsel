@extends('layouts.admin')
@section('title')
Admin Page iParkir | Contacts - Edit
@endsection
@section('title-header')
  Edit Contact
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('layouts.alert-box')
    <form action="{{ url('admin/contacts/'.$contact->id) }}" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" class="form-control" type="text" name="name" value="{{ $contact->name }}" >
    </div>
    <div class="form-group">
      <label for="position">Position</label>
      <input id="position" class="form-control" type="text" name="position" value="{{ $contact->position }}" >
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" class="form-control" type="email" name="email" value="{{ $contact->email }}" >
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input id="phone" class="form-control" type="text" name="phone" value="{{ $contact->phone }}">
    </div>
    <div class="form-group">
      <label for="foto"><strong>Foto</strong></label>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="foto" data-preview="holder" class="btn btn-primary">
            <i class="fas fa-image"></i> Choose
          </a>
        </span>
        <input id="foto" class="form-control" type="text" name="foto" value="{{ $contact->foto }}">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
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
