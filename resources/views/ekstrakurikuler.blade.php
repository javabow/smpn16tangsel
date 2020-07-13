@extends('templates.pages-templates')
@section('title')
  {{ $ekskul->name }}
@endsection
@section('content')
  <div class="blog-area full-blog standard single-blog full-blog padding-page">
      <div class="container">
          <div class="row">
              <div class="blog-items">
                  <div class="col-md-10 col-md-offset-1">
                      <br>
                      <ul class="breadcrumb">
                          <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                          <li class="active">Ekstrakurikuler {{ $ekskul->name }}</li>
                      </ul>
                  </div>
                  <div class="blog-content col-md-10 col-md-offset-1">
                    <div class="meta">
                      <h1 class="h2"><strong>{{ $ekskul->name }}</strong></h1>
                    </div>
                    <br><hr>
                      <div class="item-box">
                          <div class="item">
                              {{-- <div class="thumb">
                                <a href="#">
                                  <img onerror="this.onerror=null; this.src='{{ asset('img/dummy-img.png') }}'" src="{{ asset($value->thumbnail) }}" style="width: 100%" alt="Thumb">
                                </a>
                              </div> --}}
                              <div class="info">
                                  <div class="content text-justify">
                                    {!! $ekskul->content !!}
                                  </div>
                                  {{-- <div class="meta">
                                      <div class="share">
                                          <ul>
                                            <li class="share">
                                              <a href="#"><i class="fas fa-share-alt"></i></a>
                                            </li>
                                            <li class="facebook">
                                                <div id="fb-root"></div>
                                            	<div class="fb-share-button" data-layout="button" data-size="small">
                                                   	<a href="#"><i class="fab fa-facebook-f"></i></a>
                                            	</div>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                          </ul>
                                      </div>
                                    </div> --}}
                              </div>


                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
