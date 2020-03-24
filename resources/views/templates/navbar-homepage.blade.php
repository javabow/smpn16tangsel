<header id="home">
    <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <div class="scroll-container">
                      <img src="{{ asset('img/logo-smp-16.png') }}" class="logo logo-scrolled img-responsive" alt="Logo">
                      <span>SMPN 16 Tangerang Selatan</span>
                    </div>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">

                    <li>
                        <a class="smooth-menu" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Profil Sekolah</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('kata-sambutan')}}">Kata Sambutan</a></li>
                            <li><a href="{{url('sejarah-sekolah')}}">Sejarah</a></li>
                            <li><a href="{{url('visi-misi')}}">Visi & Misi</a></li>
                            <li class="dropdown">
                                <a href="#" >Staff</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('tenaga-pendidik')}}">Tenaga Pendidik</a></li>
                                    <li><a href="{{url('tenaga-kependidikan')}}">Tenaga Kependidikan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Berita</a>
                        <ul class="dropdown-menu">
                          <li><a class="smooth-menu" href="{{url('berita')}}">Berita Terbaru</a></li>
                          @foreach ($categories as $key => $value)
                            <li><a class="smooth-menu" href="{{url('berita/'.$value->id)}}">{{$value->name}}</a></li>
                          @endforeach
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
            </div>
        </div>
    </nav>
</header>
