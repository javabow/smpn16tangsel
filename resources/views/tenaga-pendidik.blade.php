@extends('templates.pages-templates')
@section('title')
  {{ $sText->{'tenagaPendidik'.Session::get('lang')} }}
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
                          <li class="active">{{ $sText->{'tenagaPendidik'.Session::get('lang')} }}</li>
                      </ul>
                  </div>
                  <div class="blog-content col-md-10 col-md-offset-1">
                      <div class="item-box">
                          <div class="item">
                              <div class="thumb">
                                      {{-- <a href="#"><img class="img-responsive" width="100%" src="{{asset('')}}" alt="Thumb"></a> --}}
                              </div>
                              <div class="info">
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
                                  <div class="content text-justify">
                                    @php
                                      $num = 1;
                                    @endphp
                                    <table class="table">
                                      <thead class="thead-dark">
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">{{ $sText->{'nama'.Session::get('lang')} }}</th>
                                          <th scope="col">Status</th>
                                          {{-- <th scope="col">Matapelajaran</th> --}}
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <th scope="row">{{ $num++ }}</th>
                                          <td>{{ $kepsek->name }}</td>
                                          <td>{{ $sText->{'tenagaPendidik2'.Session::get('lang')} }}</td>
                                          {{-- <td>{{ $value->subjects }}</td> --}}
                                        </tr>
                                        @foreach ($tenagaPendidik as $key => $value)
                                          <tr>
                                            <th scope="row">{{ $num++ }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $sText->{'tenagaPendidik2'.Session::get('lang')} }}</td>
                                            {{-- <td>{{ $value->subjects }}</td> --}}
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>

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
