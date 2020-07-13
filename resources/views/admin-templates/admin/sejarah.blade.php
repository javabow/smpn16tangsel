@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Sejarah Sekolah
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('css/posts-edit.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection
@section('title-header')
  Sejarah Sekolah
@endsection
@section('js-head')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link {{ (!session('lang')) ? 'active' : '' }}" href="{{ url('set-lang/in') }}">Indonesia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (session('lang') === '_en') ? 'active' : '' }}" href="{{ url('set-lang/en') }}">English</a>
      </li>
    </ul>
    @include('admin-templates.alert-box')

    <form id="posts-form" action="{{ url('admin/sejarah/'.$id) }}" method="post">
    <div class="form-group">
      <label for="title{{ session('lang') }}"><strong>{{ (!session('lang')) ? 'Judul' : 'Title' }}</strong></label>
      <input id="title{{ session('lang') }}" class="form-control" type="text" name="title{{ session('lang') }}" value="{{ $page->{'title'.session('lang')} }}">
    </div>
    <div class="form-group">
      <label for="content{{ session('lang') }}"><strong>{{ (!session('lang')) ? 'Konten' : 'Content' }}</strong></label>
      <textarea id="content{{ session('lang') }}" class="form-control" name="content{{ session('lang') }}">{!! $page->{'content'.session('lang')} !!}</textarea>
    </div>
    <div class="form-group">
      <label for="thumbnail"><strong>Thumbnail</strong></label>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fas fa-image"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{ $page->thumbnail }}">
      </div>
      <img src="{{ asset($page->thumbnail) }}" id="holder" style="margin-top:15px;max-height:100px;">
    </div>

    <div class="form-group">
      <button id="publish-btn" class="btn btn-success" type="submit" name="submit" value="publish"><i class="fas fa-newspaper"></i> Publish</button>
      <a class="btn btn-primary" target="_blank" href="{{ url('blog/preview/'. $page->title_slug) }}"><i class="fas fa-eye"></i> Preview</a>
    </div>
    <input type="hidden" name="_method" value="patch">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  </div>
@endsection

@section('js')


  {{-- single upload --}}
  <script src="{{ asset('js/lfm/upload-thumbnail.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    options = {
      prefix: '/laravel-filemanager/show-post-thumbnail',
    };
    $('#lfm').filemanager('image&for=post_thumbnail', options);
  </script>

  <script type="text/javascript">

      $('#cat-select li').on('click', function() {
        checkbox = $(this).find('input');
        if (checkbox.prop('checked')) {
          checkbox.prop('checked', false); // Unchecks it
        } else {
          checkbox.prop('checked', true); // Checks it
        }
      })

      $('#tags').select2();
  </script>
  <script src="{{ asset('js/select2.min.js') }}" charset="utf-8"></script>
  <script>
  $(document).ready(function() {
    CKOPTIONS = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    };
    CKEDITOR.replace('content{{session('lang')}}', CKOPTIONS);
  })
  </script>
@endsection
