<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
      body {
        margin: 0;
        background-color: #f3f3f3;
        font-family: sans-serif;
        font-size: .9rem;
        color: #404040;
      }
      .content {
        width: 50rem;
        margin: auto;
        padding: 2rem;
        background-color: #fff;
      }
      .content .hello {
        font-size: 1.5rem;
      }
      .img-container {
        text-align: center;
      }
      .img-container img {
        display: inline-block;
        width: 50%;
        height: auto;
      }
      header {
        height: 4rem;
        background-color: #466cb6;
        display: flex;
      }
      header a {
        margin: auto;
      }
      header a img {
        height: 3rem;
      }
      footer {
        padding: 1rem;
        display: flex;
        padding: .5rem 1rem;
        background-color: #081b41;
        color: #fff;
      }
      footer p.ml-auto {
        margin-left: auto;
      }
      footer img {
        height: 1rem;
      }
    </style>
    @yield('css')
</head>
<body>
  <div class="container">
    <header>
      <a class="navbar-brand font-logo" href="{{ url('/') }}"><img class="img-fluid" src="{{ asset('img/Asset 4.png') }}" alt=""></a>
    </header>
    <div class="content">
      @yield('content')
    </div>
    <footer>
      <p>&copy; 2019 iparkir.com - Jakarta, Indonesia</p>
      <p class="ml-auto">Follow Us in : <a href="#"><img src="{{ asset('img/instagram.svg') }}" alt=""></a> <a href="#"><img src="{{ asset('img/facebook-square.svg') }}" alt=""></a> <a href="#"><img src="{{ asset('img/linkedin.svg') }}" alt=""></a> </p>
    </footer>
  </div>

</body>
</html>
