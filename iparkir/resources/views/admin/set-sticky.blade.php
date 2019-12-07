@extends('layouts.admin')
@section('title')
Admin Page iParkir | Dashboard - Edit Sticky Note
@endsection
@section('title-header')
  Edit Sticky Note
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('layouts.alert-box')
    <form action="{{ url('admin/dashboard/update-sticky-note') }}" method="post">
    <div class="form-group">
      <label for="description">Description</label>
      <textarea id="description" class="form-control" type="text" name="description" >{{ $stickyNote }}</textarea>
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
@endsection
