@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Contacts - Edit
@endsection
@section('title-header')
  Edit Contact
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('admin-templates.alert-box')
    <form action="{{ url('admin/contacts/'.$contact->id) }}" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" class="form-control" type="email" name="email" value="{{ $contact->email }}" >
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea class="form-control" name="address" id="address" rows="8" cols="80">{{ $contact->address }}</textarea>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input id="phone" class="form-control" type="text" name="phone" value="{{ $contact->phone }}" >
    </div>
    <div class="form-group">
      <label for="fax">Fax</label>
      <input id="fax" class="form-control" type="text" name="fax" value="{{ $contact->fax }}">
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
