<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand font-logo" href="{{ url('/') }}"><img class="img-fluid" src="{{ asset('img/Asset 4.png') }}" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars text-light"></i></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100">
      <li class="nav-item active ml-auto">
        <a class="nav-link" href="{{ url($data['menus'][0]->href) }}">{{ strtoupper($data['menus'][0]->{'name'.session('lang')}) }} <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url($data['menus'][1]->href) }}">{{ strtoupper($data['menus'][1]->{'name'.session('lang')}) }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url($data['menus'][2]->href) }}">{{ strtoupper($data['menus'][2]->{'name'.session('lang')}) }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url($data['menus'][3]->href) }}">{{ strtoupper($data['menus'][3]->{'name'.session('lang')}) }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url($data['menus'][4]->href) }}">{{ strtoupper($data['menus'][4]->{'name'.session('lang')}) }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-ellipsis-v"></i></a>
      </li>
      <li class="nav-item dropdown change-lang">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-language"></i>
          @if (session('lang') == '_en')
            CHANGE LANGUAGE
          @else
            PILIH BAHASA
          @endif
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('set-lang/in') }}"><i class="fas fa-check icon icon-in @if (session('lang') == '_en') invisible @endif"></i> Indonesia</a>
          <a class="dropdown-item" href="{{ url('set-lang/en') }}"><i class="fas fa-check icon icon-en @if (session('lang') == '') invisible @endif"></i> English</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
