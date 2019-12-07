@extends('layouts.admin')
@section('title')
Admin Page iParkir | File Manager
@endsection
@section('title-header')
  File Manager
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('laravel-filemanager::index')
  </div>
@endsection
