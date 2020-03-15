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
                              @for ($i=0; $i < 2; $i++)
                                <li>
                                  <div class="thumb">
                                    <a href="#">
                                      <img class="img-responsive" src="{{asset('web_assets/images/f22266e69ce7b0ddbd644284b8433088-100x100.jpeg')}}"  alt="Thumb">
                                    </a>
                                  </div>
                                  <div class="info">
                                    <a href="#">Info Berita Sekolah</a>
                                    <div class="meta-title">
                                      <span class="post-date">05 Oct, 2019</span>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                                    </div>
                                  </div>
                                </li>
                              @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item recent-post">
                            <h4>Agenda Sekolah</h4>
                            <ul>
                              <li>
                                <div class="thumb">
                                    <a href="#">
                                        <img class="img-responsive" src="{{asset('web_assets/images/6c1da5caa5caf36956b66a1aa6c5c928-100x100.jpg')}}"  alt="Thumb">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="#">Berita Agenda Sekolah</a>
                                    <div class="meta-title">
                                        <span class="post-date">13 May, 2019</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                                    </div>
                                </div>
                            </li>
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
                            <p>&copy; Copyright 2020. All Rights Reserved by <a href="#">SMPN 16 Tangerang Selatan</a></p>
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
