<header id="home">
    <nav class="navbar navbar-default bootsnav @yield('nav-css')">
        <div class="container-fluid navbar-container">
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
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">{{ $sText->{'profilSekolah'.Session::get('lang')} }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('kata-sambutan')}}">{{ $sText->{'kataSambutan'.Session::get('lang')} }}</a></li>
                            <li><a href="{{url('sejarah-sekolah')}}">{{ $sText->{'sejarah'.Session::get('lang')} }}</a></li>
                            <li><a href="{{url('visi-misi')}}">{{ $sText->{'visimisi'.Session::get('lang')} }}</a></li>
                            <li class="dropdown">
                                <a href="#" >{{ $sText->{'staf'.Session::get('lang')} }}</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('tenaga-pendidik')}}">{{ $sText->{'tenagaPendidik'.Session::get('lang')} }}</a></li>
                                    <li><a href="{{url('tenaga-kependidikan')}}">{{ $sText->{'tenagaKependidikan'.Session::get('lang')} }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">{{ $sText->{'berita'.Session::get('lang')} }}</a>
                        <ul class="dropdown-menu">
                          <li><a class="smooth-menu" href="{{url('berita')}}">{{ $sText->{'beritaTerbaru'.Session::get('lang')} }}</a></li>
                          @foreach ($categories as $key => $value)
                            <li><a class="smooth-menu" href="{{url('berita/'.$value->id)}}">{{ $value->{'name'.Session::get('lang')} }}</a></li>
                          @endforeach
                        </ul>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{url('/#ekstrakurikuler')}}">{{ $sText->{'ekstrakurikuler'.Session::get('lang')} }}</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{url('/#prestasi')}}">{{ $sText->{'prestasi'.Session::get('lang')} }}</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{url('/#alumni')}}">{{ $sText->{'profilAlumni'.Session::get('lang')} }}</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{url('/#contact')}}">{{ $sText->{'kontak'.Session::get('lang')} }}</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">{{ $sText->{'bahasa'.Session::get('lang')} }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('set-lang')}}"> Indonesia @if (!Session::get('lang'))
                              <i class="fa fa-check"></i>
                            @endif</a></li>
                            <li><a href="{{url('set-lang/en')}}"> English @if (Session::get('lang') == '_en')
                              <i class="fa fa-check"></i>
                            @endif</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
