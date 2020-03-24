<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SMPN 16 Tangerang Selatan">
    <meta name="keywords" content="smpn 16 tangerang selatan, smpn 16 tangsel">

    <title>SMPN 16 Tangerang Selatan</title>

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('web_assets/http://sman1yogya.sch.id/assets/js/html5/html5shiv.min.js')}}"></script>
      <script src="{{asset('web_assets/http://sman1yogya.sch.id/assets/js/html5/respond.min.js')}}"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="{{asset('web_assets/css/css_1.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/css.css')}}" rel="stylesheet">
    <link href="{{asset('web_assets/css/css_2.css')}}" rel="stylesheet">
    <link href="{{asset('css/homepage.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
       integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
       crossorigin=""/>
</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    @include('templates.navbar-homepage')

    @include('templates.banner')
    <!-- Start Blog
    ============================================= -->
    <div id="berita" class="blog-area circle default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Berita Terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="blog-items">
                @php
                  $i = 0;
                @endphp
                @foreach ($beritaTerbaru as $key => $value)
                  @if ($i % 3 == 0)
                    <div class="row">
                  @endif
                  <div class="col-md-4 single-item">
                    <div class="item">
                      <div class="thumb">
                        <a href="#"><img class="img img-responsive img-fluid" src="{{asset($value->thumbnail)}}"  alt="Thumb"></a>
                        <div class="date">
                          <h4><span>14</span>Aug, 2019</h4>
                        </div>
                      </div>
                      <div class="info">
                        <h4>
                          <a href="#">{{ $value->title }}</a>
                        </h4>
                        <p class="text-justify">{{ strip_tags(str_limit($value->content, 400)) }}...</p>
                        <a href="#"></i></a>
                        <div class="meta">
                          <ul>
                            <li>
                              <a href="#"><i class="fas fa-user"></i> admin</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if ($i % 3 == 2)
                  </div>
                  @endif
                  @php
                    $i++;
                  @endphp
                @endforeach


                <div class="more-btn col-md-12 text-center">
                  <a href="#">Tampilkan Semua Berita</a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Top Categories
    ============================================= -->
    <div id="ekstrakurikuler" class="top-cat-area bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Ekstrakurikuler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-cat-items text-light inc-bg-color">
                  @foreach ($ekstrakurikuler as $key => $value)
                    <div class="col-md-3 col-sm-6 equal-height">
                      <div class="item {{ $value->color }}" style="background-image: url(images/800x600.png);">
                        <a href="#">
                          <i class="{{ $value->icon }}"></i>
                          <div class="info">
                            <h4>{{ $value->name }}</h4>
                          </div>
                        </a>
                      </div>
                    </div>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Top Categories -->

    <!-- Start Event
    ============================================= -->
    <section id="prestasi" class="event-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Prestasi Terbaru</h2>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="event-items">
                                        <!-- Single Item -->
                     <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url('{{asset('img/tes2.jpg')}}');">
                            <!-- <div class="date">
                                <h4><span>12</span> Dec, 2018</h4>
                            </div> -->
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                                <a>This is The Title</a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i>04 Aug, 2019 - 11 Aug, 2019</li>
                                    <li><i class="fas fa-map"></i> Tangerang Selatan, Indonesia </li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ..</p>
                        </div>
                    </div>
                                        <!-- Single Item -->
                     <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url('{{asset('img/tes2.jpg')}}');">
                            <!-- <div class="date">
                                <h4><span>12</span> Dec, 2018</h4>
                            </div> -->
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                              <a>This is The Title</a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i>01 Apr, 2019 - 08 Apr, 2019</li>
                                    <li><i class="fas fa-map"></i> Tangerang Selatan, Indonesia </li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ..</p>

                        </div>
                    </div>
                                        <!-- Single Item -->
                     <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url('{{asset('img/tes2.jpg')}}');">
                            <!-- <div class="date">
                                <h4><span>12</span> Dec, 2018</h4>
                            </div> -->
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                              <a>This is The Title</a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i>22 Mar, 2019 - 23 Mar, 2019</li>
                                    <li><i class="fas fa-map"></i> Tangerang Selatan, Indonesia </li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ..</p>

                        </div>
                    </div>

                    <div class="more-btn col-md-12 text-center">
                        <a href="#">Tampilkan semua prestasi</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Event -->

<!-- Start Fun Factor
    ============================================= -->
    <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard bg-piala" style="background-image: url(images/piala.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="212" data-speed="5000"></span>
                            <span class="medium">Prestasi <br> Internasional</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="128" data-speed="5000"></span>
                            <span class="medium">Prestasi <br> Tingkat Nasional</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="8970" data-speed="5000"></span>
                            <span class="medium">Prestasi <br> Tingkat Provinsi</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="640" data-speed="5000"></span>
                            <span class="medium">Prestasi <br> Tingkat Kabupaten</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Fun Factor -->

    <!-- Start Advisor Area
    ============================================= -->
    <section id="guru" class="advisor-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Tenaga Pendidik</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-carousel owl-carousel owl-theme text-center text-light carousel-pendidik">
                      @foreach ($tenagaPendidik as $key => $value)
                        <div class="advisor-item">
                          <div class="info-box">
                            <img class="img-responsive" width="100%" src="{{asset($value->dp)}}"  alt="Thumb">
                            <div class="info-title">
                              <h4>{{ $value->name }}</h4>
                              <span>{{ $value->subjects }}</span>
                            </div>
                          </div>
                        </div>
                      @endforeach

                    </div>
                    <div class="more-btn col-md-12 text-center">
                        <a href="#">Tampilkan Semua Guru</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Advisor Area -->

    <!-- Start Testimonials
    ============================================= -->
    <div id="alumni" class="testimonials-area carousel-shadow default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Profil Alumni</h2>
                        <!-- <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-review-carousel owl-carousel owl-theme">
                      @foreach ($alumni as $key => $value)
                        <div class="item">
                          <div class="col-md-5 thumb">
                            <img src="{{asset($value->dp)}}" alt="Thumb">
                          </div>
                          <div class="col-md-7 info">
                            <h4><a href="#"><span>{{ $value->name }}</span></a></h4>
                            <p>{{ $value->biodata }}</p>
                          </div>
                        </div>
                      @endforeach
                        <!-- Single Item -->
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Start Contact Info
    ============================================= -->
    <div id="contact" class="contact-info-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Hubungi Kami</h2>
                        <!-- <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="row">


                <!-- Start Maps & Contact Form -->
                <div class="maps-form">
                    <div class="col-md-6 maps">
                        <h3>Denah Lokasi</h3>
                        <div class="google-maps">
                            {{-- <iframe src="embed.html" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                            <div id="mapid" style="height: 270px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 form">
                        <div class="heading f-item address">
                            <h3>Kontak</h3>
                            <!-- <p>
                                Occasional terminated insensible and inhabiting gay. So know do fond to half on. Now who promise was justice new winding
                            </p> -->
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <p>Email <br><span><a href="mailto:{{ $kontak->email }}">{{ $kontak->email }}</a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i>
                                    <p>Address <br><span>{{ $kontak->address }}</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <p>Phone <br><span>{{ $kontak->phone }}</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-fax"></i>
                                    <p>Fax <br><span>{{ $kontak->fax }}</span></p>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- End Maps & Contact Form -->

            </div>
        </div>
    </div>
    <!-- End Contact Info -->

    @include('templates.footer')
    @include('templates.scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <script type="text/javascript">
  var mymap = L.map('mapid').setView([-6.2425178, 106.6690029], 15);
  var marker = L.marker([-6.2425178, 106.6690029]).addTo(mymap);
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
  }).addTo(mymap);
  </script>
</body>
</html>
