@extends('layouts.public')
@section('title')
iParkir
@endsection
@section('content')

    <section class="products" id="produk">
      <div class="row">
        <div class="col-md-6 products-1 anim-ltr">
          <p class="title">{{ $websiteText[1]->{'content'.session('lang')} }}</p>
          {!! $websiteText[2]->{'content'.session('lang')} !!}
          {{-- <p>iParkir adalah software untuk menyewa lahan parkir berbasis internet. iParkir bersifat real time dan multiplatform, tersedia di berbagai perangkat elektronik.</p> --}}
          <img class="img-fluid" src="{{ asset('img/section2-1.png') }}" alt="">
        </div>
        <div class="col-md-6 products-2  anim-rtl">
          <div class="products-2-title">
            Sangat mudah memakai iParkir
          </div>
          <ul>
            <li><span><i class="fas fa-search"></i></span> 1. Cari lokasi parkir yang Anda inginkan</li>
            <li><span><i class="fab fa-android"></i></span>2. Sewa tempat parkir melalui iParkir</li>
            <li><span><i class="fas fa-car"></i></span>3. Parkir kendaraan Anda</li>
          </ul>
          <hr class="my-5">
          <div class="products-2-title">
            Dapatkan dan gunakan iParkir sekarang juga
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
        <p class="display-4">
          <strong>Mengapa menggunakan iParkir ?</strong>
        </p>
        <p class="display-4">
          <small>Berikut beberapa alasan mengapa menggunakan iParkir</small>
        </p>
        <p class="text-center"><a class="b-addition-l" href="#b-addition-l" id="b-addition-l"><i class="fas fa-chevron-circle-down icon icon-down"></i></a></p>
        <p class="text-center"><a class="b-addition-l" href="#b-addition-l"><i class="fas fa-chevron-circle-up icon icon-up"></i></a></p>
      </section>

      <section class="addition row">
        <div class="col-md-4 addition1" style="background-image: url('{{ asset('img/section2-4.png') }}');">
          <div><p>Parkir di mana saja, kapan saja jadi mudah dengan iParkir</p></div>
        </div>
        <div class="col-md-4 addition2" style="background-image: url('{{ asset('img/section2-5.png') }}');">
          <div><p>Terpercaya, iParkir menjamin kualitas pelayanan dengan sebaik-baiknya</p></div>
        </div>
        <div class="col-md-4 addition3" style="background-image: url('{{ asset('img/section2-3.png') }}');">
          <div><p>Hanya dengan menggunakan smartphone, dapatkan akses parkir di berbagai wilayah Indonesia</p></div>
        </div>
      </section>
    </div>

    <section class="fitur anim-rotate" id="fitur">
      <div class="row">
        <div class="col-md-6">
          <p class="title">iParkir memiliki fitur-fitur sebagai berikut :</p>
          <div class="detail-fitur">
            <table>
              <tr>
                <td><span class="circle-number">1</span></td>
                <td>Mencari tempat parkir hanya dengan 1 kali klik</td>
              </tr>
              <tr>
                <td><span class="circle-number">2</span></td>
                <td>Memiliki berbagai promo diskon harga</td>
              </tr>
              <tr>
                <td><span class="circle-number">3</span></td>
                <td>Memiliki fitur chat langsung dengan pemilik lahan parkir</td>
              </tr>
              <tr>
                <td><span class="circle-number">4</span></td>
                <td>Keamanan transaksi dijamin oleh iParkir</td>
              </tr>
              <tr>
                <td><span class="circle-number">5</span></td>
                <td>Fitur saran & kritik, untuk pengguna mengadukan keluhan</td>
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
      <div>
        <div>
          <p class="display-4"><strong>Tertarik dengan iParkir ?</strong></p>
          <p class="display-4">Ayo berlangganan dan dapatkan berita serta berbagai promo terbaru dari <strong>iParkir</strong></p>
        </div>
        <form action="#" method="post">
          <div class="form-group d-flex">
              <input class="form-control" type="email" name="email" placeholder="emailmu@gmail.com">
              <button class="btn btn-success ml-2" type="submit" name="subscribe">Berlangganan</button>
          </div>
        </form>
      </div>
    </section>

    <section class="contact" id="kontak">
      <div class="row">
        <div class="col-md-4">
          <p class="title">iParkir Kontak</p>
          <br>
          <p>Alamat : Jln. Doktor Sucipto - Jakarta, Indonesia</p>
          <p>Telepon : +62 123 8742 3921</p>
          <p>Email : support.iparkir.com</p>
          <br>
        </div>
        <div class="col-md-2">
          <p class="title">Navigasi</p>
          <p><a href="#">Home</a></p>
          <p><a href="#">Produk</a></p>
          <p><a href="#">Fitur</a></p>
          <p><a href="#">Kontak</a></p>
        </div>
        <div class="col-md-2">
          <p class="title">Dokumentasi</p>
          <p><a href="#">Cara download iParkir</a></p>
          <p><a href="#">Cara daftar iParkir</a></p>
          <p><a href="#">Menjadi penyewa tempat parkir</a></p>
          <p><a href="#">Cara menyewa parkir</a></p>
        </div>
        <div class="col-md-2">
          <p class="title">FAQ</p>
          <p><a href="#">Lupa Password</a></p>
          <p><a href="#">Lupa Username</a></p>
          <p><a href="#">Lupa Email</a></p>
        </div>
        <div class="col-md-2">
          <p class="title">Hukum</p>
          <p><a href="#">Kebijakan Privasi</a></p>
          <p><a href="#">Ketentuan Pemakaian</a></p>
        </div>
      </div>
      {{-- <img class="img-fluid w-100" src="{{ asset('img/maps.png') }}" alt=""> --}}
    </section>



    <footer>
      <p>&copy; 2019 iparkir.com - Jakarta, Indonesia</p>
      <p class="ml-auto">Follow Us in : <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> </p>
    </footer>

    <div class="loader-container">
      <div class="loader">
        <div class="one"></div>
        <div class="two"></div>
      </div>
    </div>
@endsection
