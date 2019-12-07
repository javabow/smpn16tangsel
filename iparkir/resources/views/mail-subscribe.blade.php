@extends('layouts.mail-layout')
@section('title')
  Terimakasih Sudah Subscribe
@endsection
@section('css')
@endsection
@section('content')
  <p class="hello">Halo {{ $email }}</p>
  <p>Terimakasih sudah berlangganan di iparkir.id. Kami sangat senang kamu bergabung bersama Kami :).</p>
  <br><br><p class="img-container"><img src="https://iparkir.id/img/super_thank_you.svg" alt=""></p><br><br>
  <p>iParkir akan selalu membantu Kamu mencari tempat parkir dengan cara yang mudah dan menyenangkan. Dengan Kamu berlangganan, Kamu akan terus mendapatkan info-info terbaru dari iParkir, jangan sampai ketinggalan berita terbarunya yaa.. Akan selalu ada promo-promo menarik dari iParkir. Terimakasih...</p>
  <br><br><br>
  <p>All the best.</p>
  <p><a href="https://iparkir.id">iParkir.id</a></p>
@endsection
