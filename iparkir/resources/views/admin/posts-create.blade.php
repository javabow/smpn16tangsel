@extends('layouts.admin')
@section('title')
Admin Page iParkir | Posts - Create
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('css/posts-edit.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection
@section('title-header')
  Posts Create
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

    @include('layouts.alert-box')

    <form id="posts-form" action="{{ url('admin/posts/create-post') }}" method="post">
    <div class="form-group">
      <label for="title{{ session('lang') }}"><strong>{{ (!session('lang')) ? 'Judul' : 'Title' }}</strong></label>
      <input id="title{{ session('lang') }}" class="form-control" type="text" name="title{{ session('lang') }}" value="">
    </div>
    <div class="form-group">
      <label for="content{{ session('lang') }}"><strong>{{ (!session('lang')) ? 'Konten' : 'Content' }}</strong></label>
      <textarea id="content{{ session('lang') }}" class="form-control" name="content{{ session('lang') }}"></textarea>
    </div>
    <div class="form-group">
      <label for="thumbnail"><strong>Thumbnail</strong></label>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fas fa-image"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
    </div>
    <div class="form-group">
      <p><strong>Categories </strong><span class="sh-cat"> Show/Hide </span> </p>
      <ul id="cat-select" class="cat-select list-group">
        @foreach ($categories as $category)
          @php($listOpen = '')
          @php($listClose = '')
          @for ($i=0; $i < $category->level; $i++)
            @php($listOpen .= '&nbsp;&nbsp;&nbsp;&nbsp;')
            @php($listClose .= '&nbsp;&nbsp;&nbsp;&nbsp;')
          @endfor
            <li class="list-group-item" val="{{ $category->id }}">
                <input class="mr-2" id="cat-{{$category->id}}" name="cat[]" type="checkbox" value="{{ $category->id.'-'.$category->name }}" disabled="disabled"><label for="cat-{{$category->id}}"> {!! $listOpen . $category->name. ' id : ('.$category->id.')'. $listClose !!}</label>
            </li>
        @endforeach
      </ul>
      <div class="row">
        <div class="col-md-6">
          <label for="category"><strong>Nama Category</strong></label>
          <input id="category" class="form-control" type="text" name="category">
        </div>
        <div class="col-md-6">
          <label for="parent-category"><strong>Parent Category</strong></label>
          <select id="parent-category" class="form-control" name="parent-category">
            <option value="">-- Pilih Parent Category --</option>
            @foreach ($categories as $category)
              @php($listOpen = '')
              @php($listClose = '')
              @for ($i=0; $i < $category->level; $i++)
                @php($listOpen .= '&nbsp;&nbsp;&nbsp;&nbsp;')
                @php($listClose .= '&nbsp;&nbsp;&nbsp;&nbsp;')
              @endfor
                <option value="{{ $category->id }}">
                  {!! $listOpen . $category->name. ' id : ('.$category->id.')' . $listClose !!}
                </option>
            @endforeach
          </select>
        </div>
      </div>

      <p class="mt-2"><a class="btn btn-primary" id="send-cat" href="#">Buat Category</a></p>
    </div>
    <div class="form-group">
      <label for="tags"><strong>Tags <small>#Tekan tombol <strong>Tab</strong> untuk menambahkan tag baru</small></strong></label> <br>
      <select class="tags form-control" id="tags" name="tags[]" multiple="multiple">
        @foreach ($tags as $tag)
          <option value="{{ $tag->id.'-'.$tag->name }}">{{ $tag->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <button id="publish-btn" class="btn btn-success" type="submit" name="submit" value="publish"><i class="fas fa-newspaper"></i> Publish</button>
      <button id="draft-btn" class="btn btn-warning" type="submit" name="submit" value="draft"><i class="fas fa-save"></i> Save to Draft</button>
      <a class="btn btn-primary" target="_blank" href="{{ url('blog/preview/'. str_slug('Preview', '-')) }}"><i class="fas fa-eye"></i> Preview</a>
    </div>
    {{-- <input type="hidden" name="_method" value="patch"> --}}
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
  $(document).ready(function() {
    $('#cat-select li input[checked="checked"]').removeAttr('disabled');
    $('#cat-select li input[checked="checked"]').show();
    $('#cat-select li input[checked="checked"]').parents('li').show();
  });
      $('#category').on('keypress', function(e) {
        if(e.which == 13) {
          e.preventDefault();
          sendCat();
        }
      });
      $('#send-cat').on('click', function(e) {
        e.preventDefault();
        sendCat();
      })
    function sendCat() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var data = {
        'category': $('#category').val(),
        'parent': $('#parent-category').val(),
      };

      $.ajax({
         type: 'post',
         url: '{{ url('admin/categories') }}',
         data: data,
         success: function (response) {
           $('#parent-category').html($(response).find('#parent-category').html());
         },
         error: function(jqXHR, textStatus, errorThrown) {
         }
      });


    }
    $('.sh-cat').on('click', function(){
      $('#cat-select').slideToggle();
    });

    $('#cat-select li').on('click', function() {
      checkbox = $(this).find('input');
      if (checkbox.prop('checked')) {
        checkbox.prop('checked', false); // Unchecks it
        checkbox.attr('disabled', 'disabled');
        $(this).hide();
      } else {
        checkbox.prop('checked', true); // Checks it
        checkbox.removeAttr('disabled');
      }
    })
    // Categories append to
    $('#parent-category').on('change', function(e) {
      val = $(this).val();
      text = $('#parent-category option[value="'+val+'"]').text();

      $('#cat-select li[val="'+val+'"]').click();

      $('#cat-select li[val="'+val+'"]').show();
    });


    $('#tags').on('select2:closing', function(e) {
         val = $('.select2-search__field').val();
         sendTag(val);
    });

    function sendTag(tag) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var data = {
        'tag': tag,
        'name': tag
      };

      $.ajax({
         type: 'post',
         url: '{{ url('admin/tags') }}',
         data: data,
         success: function (response) {
           $('#tags').html($(response).find('#tags').html());
           // console.log(response);
         },
         error: function(jqXHR, textStatus, errorThrown) {
         }
      });
    }
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
