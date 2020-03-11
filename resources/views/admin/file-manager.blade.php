@extends('layouts.admin')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | File Manager
@endsection
@section('title-header')
  File Manager
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('laravel-filemanager::index')
  </div>
@endsection
