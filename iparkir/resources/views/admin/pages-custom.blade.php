@extends('layouts.admin')
@section('title')
Admin Page iParkir | Pages - Custom
@endsection
@section('title-header')
  Pages Custom
@endsection
@section('js-head')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
@endsection
@section('content')
  <div class="container bg-light">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link {{ (!session('lang')) ? 'active' : '' }}" href="{{ url('set-lang/in') }}">Indonesia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (session('lang') === '_en') ? 'active' : '' }}" href="{{ url('set-lang/en') }}">English</a>
      </li>
    </ul>


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
    <form action="{{ url()->current() }}" method="post">
      @foreach ($websiteText as $webText)
        @if ($webText->need_editor)
          <div class="form-group my-5">
            <label class="label" for="editor-{{ $webText->id }}"><strong>{{ $webText->{'label'.session('lang')} }}</strong></label>
            <textarea name="editor-{{ $webText->id }}" id="editor-{{ $webText->id }}" rows="10" cols="80">
              {{ $webText->{'content'.session('lang')} }}
            </textarea>
          </div>
        @else
          <div class="form-group my-5">
            <label class="label" for="editor-{{ $webText->id }}"><strong>{{ $webText->{'label'.session('lang')} }}</strong></label>
            <input class="form-control" type="text" name="editor-{{ $webText->id }}" value="{{ $webText->{'content'.session('lang')} }}">
          </div>
        @endif
      @endforeach
      <input type="hidden" name="_method" value="patch">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
        <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancel</button>
      </div>
    </form>
  </div>
@endsection

@section('js')
  <script>
  @foreach ($websiteText as $webText)
    @if ($webText->need_editor)
      CKEDITOR.replace( 'editor-{{ $webText->id }}', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
      });
    @endif
  @endforeach
  </script>
@endsection
