@extends('layouts.admin')
@section('title')
Admin Page iParkir | Pages - Edit
@endsection
@section('title-header')
  Pages Edit
@endsection
@section('content')
  <div class="container bg-light p-4">

      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
        </div>
      @endif
      @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
          <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
        </div>
      @endif
    <form action="{{ url('admin/pages/'.$page->id) }}" method="post">
      {{-- <div class="form-group">
      <label for="id">Id</label>
      <input id="id" class="form-control" type="text" name="id" value="{{ $page->id }}" >
    </div> --}}
    <div class="form-group">
      <label for="name">Nama</label>
      <input id="name" class="form-control" type="text" name="name" value="{{ $page->name }}" >
    </div>
    <div class="form-group">
      <label for="name_en">Name (English)</label>
      <input id="name_en" class="form-control" type="text" name="name_en" value="{{ $page->name_en }}" >
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="id_page_status">
        @foreach ($page_status as $status)
          <option value="{{ $status->id }}" @if ($status->id === $page->id_page_status)
            selected
          @endif>{{ $status->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-edit"></i> Update</button>
    </div>
    <input type="hidden" name="_method" value="patch">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  </div>
@endsection
