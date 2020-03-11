{{-- nav.navbar.bootsnav ul.nav > li > a --}}
<!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-border navbar-sticky bootsnav">

            <!-- Start Top Search -->
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Apa yang ingin anda cari?">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
                <!-- <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"></i></a></li>
                    </ul>
                </div>     -->
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('img/logo.png')}}" class="logo logo-display img-responsive img-fluid" alt="Logo">
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
                            <a href="#" >Profil Sekolah</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('kata-sambutan')}}">Kata Sambutan</a></li>
                                <li><a href="#">Sejarah</a></li>
                                <li><a href="#">Visi & Misi</a></li>
                                <li class="dropdown">
                                    <a href="#" >Staff</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Tenaga Pendidik</a></li>
                                        <li><a href="#">Tenaga Kependidikan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" >Berita</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('berita-terbaru')}}">Berita Terbaru</a></li>
                                <li><a href="#">Info Sekolah</a></li>
                                <li><a href="#">Agenda</a></li>
                            	<li><a href="#">Galery</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{url('/#ekstrakurikuler')}}">Ekstrakurikuler</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{url('/#prestasi')}}">Prestasi</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{url('/#alumni')}}">Profil Alumni</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{url('/#contact')}}">Kontak</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" >Bahasa</a>
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
