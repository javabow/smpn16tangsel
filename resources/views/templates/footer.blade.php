<!-- Start Footer
    ============================================= -->
    <footer class="bg-fixed shadow dark-hard default-padding-top text-light" style="background-image: url(img/tes2.jpg);">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 item">
                        <div class="f-item">
                            {{-- <img class="img-responsive" src="{{asset('img/logo.png')}}"  alt="Logo"> --}}
                            <p class="h3">SMPN 16 Tangerang Selatan</p>
                            <p>
                                SMPN 16 Tangerang Selatan, adalah Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                	<li>
                                        <a target="_blank" href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item recent-post">
                            <h4>Info Sekolah</h4>
                            <ul>
                              @foreach ($footerInfoSekolah as $key => $value)
                                <li>
                                  <div class="thumb">
                                    <a href="{{ url('detil-berita/'.$value->id) }}">
                                      <img class="img-responsive" src="{{ asset($value->thumbnail) }}"  alt="Thumb">
                                    </a>
                                  </div>
                                  <div class="info">
                                    <a href="{{ url('detil-berita/'.$value->id) }}">{{ $value->title }}</a>
                                    <div class="meta-title">
                                      <span class="post-date">{{ MyHelpers::getCustomDate3($value->updated_at) }}</span>
                                      <p>{!! strip_tags(str_limit($value->content, 200)) !!}</p>
                                    </div>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item recent-post">
                            <h4>Agenda Sekolah</h4>
                            <ul>
                              @foreach ($footerAgendaSekolah as $key => $value)
                                <li>
                                  <div class="thumb">
                                    <a href="{{ url('detil-berita/'.$value->id) }}">
                                      <img class="img-responsive" src="{{ asset($value->thumbnail) }}"  alt="Thumb">
                                    </a>
                                  </div>
                                  <div class="info">
                                    <a href="{{ url('detil-berita/'.$value->id) }}">{{ $value->title }}</a>
                                    <div class="meta-title">
                                      <span class="post-date">{{ MyHelpers::getCustomDate3($value->updated_at) }}</span>
                                      <p>{!! strip_tags(str_limit($value->content, 200)) !!}</p>
                                    </div>
                                  </div>
                                </li>
                              @endforeach
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>&copy; Copyright 2020. All Rights Reserved by <a href="{{ url('') }}">SMPN 16 Tangerang Selatan</a></p>
                        </div>
                        <div class="col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="#">Terms of user</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    {{-- load --}}
    <div id="loading-wrapper">
      <div id="loading-text">LOADING</div>
      <div id="loading-content"></div>
    </div>
