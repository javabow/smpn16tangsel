@extends('admin-templates.admin-templates')
@section('title')
Admin Page iParkir | Users - Create
@endsection
@section('title-header')
  Create Users
@endsection
@section('content')
  <div class="container bg-light p-4">

    @include('admin-templates.alert-box')
    <form action="{{ url('admin/users/') }}" method="post">
    <div class="form-group">
      <label for="name">Nama</label>
      <input id="name" class="form-control" type="text" name="name" >
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" class="form-control" type="text" name="username" >
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" class="form-control" type="email" name="email" >
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" class="form-control" type="password" name="password" >
    </div>
    <div class="form-group">
      <label for="re-password">Re-Password</label>
      <input id="re-password" class="form-control" type="password" name="re-password">
    </div>
    <div class="form-group">
      <label for="id_user_roles">User Roles</label>
      <select class="form-control" name="id_user_roles">
        @foreach ($userRoles as $key => $userRole)
          <option value="{{ $userRole->id }}">{{ ucwords($userRole->name) }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="dp"><strong>Foto Profile</strong></label>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="dp" data-preview="holder" class="btn btn-primary">
            <i class="fas fa-image"></i> Choose
          </a>
        </span>
        <input id="dp" class="form-control" type="text" name="dp">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
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
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
     var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
     $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endsection
