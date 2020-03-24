@extends('templates.pages-templates')
@section('title')
  {{ $berita->title }}
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
                          <li>Berita</li>
                          <li class="active">{{ $berita->title }}</li>
                      </ul>
                  </div>
                  <div class="blog-content col-md-10 col-md-offset-1">
                    <div class="meta">
                      <h1 class="h2"><strong>{{ $berita->title }}</strong></h1>
                      <p>Created By: <i class="fas fa-user"></i> <strong>{{ ucwords($berita->users->name) }}</strong> - Updated At: {{ MyHelpers::getCustomDate2($berita->updated_at) }}</p>
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
                                    {!! $berita->content !!}
                                  </div>
                                  <div class="meta">
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
                                    </div>
                              </div>


                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
