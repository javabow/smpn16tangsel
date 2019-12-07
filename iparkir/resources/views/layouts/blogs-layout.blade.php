<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('img/Asset 2.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blogs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    @yield('css')
    @yield('js-head')
</head>
<body>
  <header>
    @include('layouts.navbar')
  </header>
  <form action="{{ url('blogs/search') }}" method="get">
    <section class="filter">
        <p class="submit"><button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button></p>
        <p class="inp-text"><input class="form-control" name="text" type="text" placeholder="Search by Text"></p>
        <div class="filter-container">
          <span>CATEGORIES</span> <i class="fas fa-angle-down"></i>
          <div class="filter-cont">
            <select class="form-control categories" name="categories[]" multiple="multiple">
              @foreach ($data['categories'] as $key => $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="filter-container">
          <span>TAGS</span> <i class="fas fa-angle-down"></i>
          <div class="filter-cont">
            <select class="form-control tags" name="tags[]" multiple="multiple" >
              @foreach ($data['tags'] as $key => $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
    </section>
  </form>
  <div class="container my-5">
    @php
      $c = 1;
      $d = 0;
      $d = count($data['posts']);
    @endphp
    @foreach ($data['posts'] as $post)

      @if ($c == 1)
        <div class="row my-5">
          <div class="col-md-8">
            <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="">
            {{-- <img class="img-fluid" src="{{ asset('img/blog-'.($c%7+1).'.jpg') }}" alt=""> --}}
          </div>
          <div class="col-md-4">
            <p class="article-title">{{ $post->{'title'.session('lang')} }}</p>
            <p class="article-author">By {{ $post->users->name }}, {{ $post->updated_at->format('l, F j Y, h:i:s A') }}</p>
            <p class="article-content">{{ str_limit(strip_tags($post->{'content'.session('lang')}), 488) }}</p>
            <p><a href="{{ url('blog/'.$post->title_slug) }}"><strong>Read More</strong></a></p>
          </div>
        </div>
        @php($c++)
        @continue
      @endif

      @if ($c == 2 || $c == 5)
        <div class="row">
      @endif

        <div class="col-md-4">
          <div class="img-container">
            <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="">
          </div>
          <p class="article-title">{{ $post->{'title'.session('lang')} }}</p>
          <p class="article-author">By {{ $post->users->name }}, {{ $post->updated_at->format('h:i:s A, l, j F Y') }}</p>
          <p class="article-content">{{ str_limit(strip_tags($post->{'content'.session('lang')}), 488) }}</p>
          <p><a href="{{ url('blog/'.$post->title_slug) }}"><strong>Read More</strong></a></p>
        </div>


      @if ($c == 4 || $c == 7  || $c == $d)
      </div>
      @endif

      @if ($c == 7)
        @php($c = 1)
      @endif

      @php($c++)
    @endforeach
    {{ $data['posts']->links() }}
    {{-- @php($c = 2) --}}
    {{-- @for ($i=0; $i < 2; $i++)
      <div class="row">
      @for ($j=0; $j < 3; $j++)
        <div class="col-md-4">
          <div class="img-container">
            <img class="img-fluid" src="{{ asset('img/blog-'.$c++.'.jpg') }}" alt="">
          </div>
          <p class="article-title">Lorem ipsum dolor sit amet</p>
          <p class="article-author">By Angelica, 30 Juli 2019</p>
          <p class="article-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
          <p><a href="{{ url('blog/lorem-ipsum') }}"><strong>Read More</strong></a></p>
        </div>
      @endfor
      </div>
      <hr>
    @endfor --}}
  </div>
  @include('layouts.footer')
  @include('layouts.loader')
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/fontawesome-all.min.js') }}"></script>
  <script src="{{ asset('js/public.js') }}"></script>
  <script src="{{ asset('js/loader.js') }}"></script>
  <script src="{{ asset('js/blogs.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.categories').select2({
        'placeholder' : 'Filter by category'
      });
      $('.tags').select2({
        'placeholder' : 'Filter by tag'
      });
    });

    $('.filter-cont').css('display', 'none');
    $('.filter-container span').on('click', function(e){
      if (e.target == this) {
        $(this).parents('.filter-container').find('.filter-cont').fadeToggle();
      }
    });
  </script>
  @yield('js')
</body>
</html>
