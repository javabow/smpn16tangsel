<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SMPN 16 Tangerang Selatan">
    <meta name="keywords" content="smpn 16 tangerang selatan, smpn 16 tangsel">

    <title>{{ ($categoryName) ? $categoryName->{'name'.Session::get('lang')}.' ' : ' ' }}SMPN 16 Tangerang Selatan</title>

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <link href="{{asset('web_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/flaticon-set.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/bootsnav.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/style2.css')}}" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

    <!-- ========== Google Fonts ========== -->
    <link href="{{asset('web_assets/css/css_1.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/css.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/css_2.css')}}" rel="stylesheet">
    <link href="{{asset('css/homepage.css')}}" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->
    @include('templates.navbar')

<!-- Start Blog
============================================= -->
<div class="blog-area full-blog left-sidebar full-blog padding-page">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="col-md-12">
                    <br>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                        @if ($categoryName)
                          <li class="active">{{ $categoryName->{'name'.Session::get('lang')} }}</li>
                        @else
                          <li class="active">{{ $sText->{'beritaTerbaru'.Session::get('lang')} }}</li>
                        @endif
                    </ul>
                </div>
                <div class="blog-content col-md-8">
                  @foreach ($berita as $key => $value)
                    <div class="single-item">
                      <div class="item">
                        <div class="thumb">
                          <a href="{{ url('detil-berita/'.$value->id) }}"><img onerror="this.onerror=null; this.src='{{ asset('img/dummy-img.png') }}'" src="{{ asset($value->thumbnail) }}" style="width: 100%" alt="Thumb"></a>
                          <div class="date">
                            {{ MyHelpers::getCustomDate($value->updated_at) }}
                          </div>
                        </div>
                        <div class="info">
                          <h3>
                            <a href="{{ url('detil-berita/'.$value->id) }}">{{$value->{'title'.Session::get('lang')} }}</a>
                          </h3>
                          <p>{!! strip_tags(str_limit($value->{'content'.Session::get('lang')}, 400)) !!}</p>
                          <a href="{{ url('detil-berita/'.$value->id) }}">{{ $sText->{'bacaLebihLanjut'.Session::get('lang')} }} <i class="fas fa-angle-double-right"></i></a>
                          <div class="meta">
                            <ul>
                              <li>
                                <a href="#"><i class="fas fa-user"></i> {{ $value->users->name }}</a>
                              </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach


                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="pagination-berita" aria-label="pagination-berita">
                              {{ $berita->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Start Sidebar -->
                <div class="sidebar col-md-4">
                    <aside>

                        <!-- Start Sidebar Item -->
                        <div class="sidebar-item search">
                            <div class="title">
                                <h4>{{ $sText->{'cari'.Session::get('lang')} }}</h4>
                            </div>
                            <div class="sidebar-info">
                              @if (isset($_GET['search']) && $berita[0])
                                <div class="alert alert-info" role="alert">
                                  Pencarian berita dengan kata kunci <strong>"{{ $search }}"</strong>
                                </div>
                              @elseif (isset($_GET['search']) && !$berita[0])
                                <div class="alert alert-danger" role="alert">
                                  Tidak ditemukan berita dengan kata kunci <strong>"{{ $search }}"</strong>
                                </div>
                              @endif
                              <form action="{{url('berita')}}" method="GET">
                                  <input type="text" class="form-control" name="search" value="{{ $search }}">
                                  <input type="submit" value="{{ $sText->{'cari'.Session::get('lang')} }}">
                              </form>
                            </div>
                        </div>
                        <!-- End Sidebar Item -->

                        <!-- Start Sidebar Item -->
                        <div class="sidebar-item category">
                            <div class="title">
                                <h4>{{ $sText->{'kategori'.Session::get('lang')} }}</h4>
                            </div>
                            <div class="sidebar-info">
                                <ul>
                                    <li>
                                        <a class="{{ (!$category) ? 'active' : '' }}" href="{{ url('berita') }}"><i class="{{ (!$category) ? 'fas fa-check' : '' }}"></i> {{ $sText->{'beritaTerbaru'.Session::get('lang')} }}</a>
                                    </li>
                                    @foreach ($categories as $key => $value)
                                      <li>
                                        <a class="{{ ($category == $value->id) ? 'active' : '' }}" href="{{url('berita/'.$value->id)}}"><i class="{{ ($category == $value->id) ? 'fas fa-check' : '' }}"></i> {{ $value->{'name'.Session::get('lang')} }}</a>
                                      </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End Sidebar Item -->


                        <!-- Start Sidebar Item -->
                        <div class="sidebar-item archives">
                            <div class="title">
                                <h4>Tags</h4>
                            </div>
                            <div class="sidebar-info">
                                <ul>
                                  @foreach ($tags as $key => $value)
                                    <li><a class="{{ ($tag == $value->id) ? 'active' : '' }}" href="{{url('berita/0/'.$value->id)}}"><i class="{{ ($tag == $value->id) ? 'fas fa-check' : '' }}"></i> {{ $value->name }}</a></li>
                                  @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End Sidebar Item -->

                        <!-- Start Sidebar Item -->
                        <div class="sidebar-item social-sidebar">
                            <div class="title">
                                <h4>follow us</h4>
                            </div>
                            <div class="sidebar-info">
                                <ul>
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="g-plus">
                                        <a href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>
                <!-- End Start Sidebar -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@include('templates.footer')
@include('templates.scripts')

</body>
</html>
