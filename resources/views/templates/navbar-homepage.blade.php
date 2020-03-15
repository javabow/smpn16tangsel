<!-- Header
============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    {{-- <div class="scroll-container"> --}}
                      {{-- <img src="{{ asset('img/logo-smp-16.png') }}" class="logo logo-display img-fluid img-responsive" alt="Logo"> --}}
                    {{-- </div> --}}
                    <div class="scroll-container">
                      <img src="{{ asset('img/logo-smp-16.png') }}" class="logo logo-scrolled img-responsive" alt="Logo">
                      <span>SMPN 16 Tangerang Selatan</span>
                    </div>
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">

                    <li>
                        <a class="smooth-menu" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Profil Sekolah</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('kata-sambutan')}}">Sambutan Kepala Sekolah</a></li>
                            <li><a href="#">Sejarah</a></li>
                            <li><a href="#">Visi & Misi</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Staff</a>
                                <ul class="dropdown-menu">
                                    <li><a class="smooth-menu" href="#guru">Tenaga Pendidik</a></li>
                                    <li><a href="#">Tenaga Kependidikan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Berita</a>
                        <ul class="dropdown-menu">
                            <li><a class="smooth-menu" href="{{url('berita-terbaru')}}">Berita Terbaru</a></li>
                            <li><a href="#">Info Sekolah</a></li>
                            <li><a href="#">Agenda</a></li>
                            <li><a href="#">Galery</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#ekstrakurikuler">Ekstrakurikuler</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#prestasi">Prestasi</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#alumni">Profil Alumni</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#contact">Kontak</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Bahasa</a>
                        <ul class="dropdown-menu">
                            <li><a href="#"> Indonesia</a></li>
                            <li><a href="#"> English</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->
