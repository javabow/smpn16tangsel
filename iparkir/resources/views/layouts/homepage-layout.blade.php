<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/Asset 2.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    @yield('css')
</head>
<body>
  @include('layouts.navbar')
  @php
    $x = 0;
  @endphp
  <header id="home" style="background-image: url('{{ asset('img/header.png') }}')">
    <div class="text-header font-header">
      {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
      {{-- <p class="text-center"><span class="title">iParkir</span> adalah software untuk menyewa tempat parkir berbasis internet. <br> iParkir bersifat real time dan multiplatform, tersedia di berbagai perangkat elektronik.</p> --}}
      {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
    </div>
  </header>
  <section class="products" id="produk">
    <div class="row">
      <div class="col-md-6 products-1 anim-ltr">
        <p class="title">{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</p>
        {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
        <img class="img-fluid" src="{{ asset('img/section2-1.png') }}" alt="">
      </div>
      <div class="col-md-6 products-2  anim-rtl">
        <div class="products-2-title">
          {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
        </div>
        {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}

        {{-- <ul>
          <li><span><i class="fas fa-search"></i></span> 1. Cari lokasi parkir yang Anda inginkan</li>
          <li><span><i class="fab fa-android"></i></span>2. Sewa tempat parkir melalui iParkir</li>
          <li><span><i class="fas fa-car"></i></span>3. Parkir kendaraan Anda</li>
        </ul> --}}
        <br>
        <div class="products-2-title">
          {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
        </div>
        {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}

        <hr class="my-5">
        <div class="products-2-title">
          {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
        </div>
        <div class="downloads">
          <div class="link-container">
            <a href="#"><img class="img-fluid" src="{{ asset('img/get-on-playstore.png') }}" alt="get-it-on-playstore"></a>
          </div>
          <div class="link-container">
            <a href="#"><img class="img-fluid" src="{{ asset('img/get-on-appstore.png') }}" alt="get-it-on-playstore"></a>
          </div>
          <div class="link-container">
            <a href="#"><img class="img-fluid" src="{{ asset('img/get-apk.png') }}" alt="get-it-on-playstore"></a>
          </div>
        </div>
      </div>
    </div>

    <hr>
  </section>

  <div class="anim-height">
    <section class="b-addition">
      {{-- <p class="display-4">
        <strong>Mengapa menggunakan iParkir ?</strong>
      </p>
      <p class="display-4">
        <small>Berikut beberapa alasan mengapa menggunakan iParkir</small>
      </p> --}}
      {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
      <p class="text-center"><a class="b-addition-l" href="#b-addition-l" id="b-addition-l"><i class="fas fa-chevron-circle-down icon icon-down"></i></a></p>
      <p class="text-center"><a class="b-addition-l" href="#b-addition-l"><i class="fas fa-chevron-circle-up icon icon-up"></i></a></p>
    </section>

    <section class="addition row">
      <div class="col-md-4 addition1" style="background-image: url('{{ asset('img/section2-4.png') }}');">
        <div>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</div>
      </div>
      <div class="col-md-4 addition2" style="background-image: url('{{ asset('img/section2-5.png') }}');">
        <div>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</div>
      </div>
      <div class="col-md-4 addition3" style="background-image: url('{{ asset('img/section2-3.png') }}');">
        <div>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</div>
      </div>
    </section>
  </div>
  <p id="fitur"></p>
  <section class="fitur anim-rotate">
    <div class="row">
      <div class="col-md-6">
        {{-- <p class="title">iParkir memiliki fitur-fitur sebagai berikut :</p> --}}
        {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
        <div class="detail-fitur">
          <table>
            <tr>
              <td><span class="circle-number">1</span></td>
              <td>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</td>
            </tr>
            <tr>
              <td><span class="circle-number">2</span></td>
              <td>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</td>
            </tr>
            <tr>
              <td><span class="circle-number">3</span></td>
              <td>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</td>
            </tr>
            <tr>
              <td><span class="circle-number">4</span></td>
              <td>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</td>
            </tr>
            <tr>
              <td><span class="circle-number">5</span></td>
              <td>{!! $data['website_text'][$x++]->{'content'.session('lang')} !!}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <img class="img-fluid" src="{{ asset('img/one-click.png') }}" alt="">
      </div>
    </div>
  </section>

  <section class="subscribe">
    <hr>
    <div class="row">
      <div class="col-md-6">
        {{-- <p class="display-4"><strong>Tertarik dengan iParkir ?</strong></p>
        <p class="display-4">Ayo berlangganan dan dapatkan berita serta berbagai promo terbaru dari <strong>iParkir</strong></p> --}}
        {!! $data['website_text'][$x++]->{'content'.session('lang')} !!}
      </div>
      <form id="subs-form" class="col-md-6" method="post" action="{{ url('mail/subscribe') }}">
        <div class="form-group d-flex">
          @csrf
            <input id="subs-email" class="form-control" type="email" name="email" placeholder="emailmu@gmail.com" required>
            <button class="btn btn-primary ml-2" type="submit" name="subscribe" value="subscribe">Berlangganan</button>
        </div>
      </form>
    </div>
  </section>

  <section class="founder">
    <p class="founder-title">iParkir Founder</p>
    @php
      $i = 0;
      $len = count($data['contacts']);
    @endphp
      @foreach ($data['contacts'] as $key => $contact)
        @if (!($i%3))
          <div class="row">
        @endif
        <div class="col-md-4 founder-cont">
          <div class="img-cont">
            <img class="img-fluid" src="{{ asset($contact->foto) }}" alt="">
          </div>
          <p class="name"><strong>{{ $contact->name }}</strong></p>
          <p class="posisi">{{ $contact->position }}</p>
          <p class="email">{{ $contact->email }}</p>
          <p class="phone">{{ $contact->phone }}</p>
        </div>
        @php($i++)
        @if ((!($i%3) && $i) || $i == $len)
        </div>
        @endif
      @endforeach
    </div>
  </section>
  <section class="contact" id="kontak">
    <div class="row">
      <div class="col-md-4">
        <p class="title">iParkir Kontak</p>
        <p><a href="#">Alamat : Bakrie tower 3rd floor epicentrum</a></p>
        <p><a href="#">Telepon: +62 857-7222-2979</a></p>
        <p><a href="#">Email: ihcholy@gmail.com</a></p>
      </div>
        <div class="col-md-2">
          <p class="title">Dokumentasi</p>
          <p><a href="#">Cara download iParkir</a></p>
          <p><a href="#">Cara daftar iParkir</a></p>
          <p><a href="#">Menjadi penyewa tempat parkir</a></p>
          <p><a href="#">Cara menyewa parkir</a></p>
        </div>
      <div class="col-md-2">
        <p class="title">Navigasi</p>
        @foreach ($data['menus'] as $key => $value)
          <p><a href="{{ $value->href }}">{{ ucwords($value->{'name'.session('lang')}) }}</a></p>
        @endforeach
      </div>
      <div class="col-md-2">
        <p class="title">Hukum</p>
        <p><a href="#">Kebijakan Privasi</a></p>
        <p><a href="#">Ketentuan Pemakaian</a></p>
      </div>
      <div class="col-md-2">
        <p class="title">FAQ</p>
        <p><a href="#">Lupa Password</a></p>
        <p><a href="#">Lupa Username</a></p>
        <p><a href="#">Lupa Email</a></p>
      </div>
    </div>
    {{-- <img class="img-fluid w-100" src="{{ asset('img/maps.png') }}" alt=""> --}}
  </section>


  @include('layouts.footer')
  @include('layouts.loader')
  @yield('content')
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/fontawesome-all.min.js') }}"></script>
  <script src="{{ asset('js/public.js') }}"></script>
  <script src="{{ asset('js/homepage.js') }}"></script>
  <script src="{{ asset('js/loader.js') }}"></script>
  <script src="{{ asset('js/anime.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $('#subs-form button').on('click', function(e) {
      e.preventDefault();
      subsemail = $('#subs-email').val();
      Swal.fire(
        'Thanks!',
        'Terimakasih telah berlangganan..',
        'success'
      );
      setTimeout(function() {
        $('#subs-form').submit();
      }, 500)
    });
  </script>
  @yield('js')

</body>
</html>
