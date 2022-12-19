<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light shadow" id="navigator">
  <div class="container-fluid flex-wrap">
    <button class="btn btn-sm btn-link" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="{{ route('dashboard.index') }}">
      <img src="{{ asset('img/logo.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">

            <p class="navbar-text" id="clock"></p>
        </div>
      <ul class="navbar-nav ms-auto">
        @guest
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">Daftar</a>
            </li>
            <p class="navbar-text d-none d-lg-inline-block">/</p>
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">Masuk</a>
            </li>
        @else
            <li class="nav-item">
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user d-none d-lg-inline-block"></i>
                <span class="d-inline-block d-lg-none">{{ Auth::user()->email }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('employee.profile') }}">Profil</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </ul>
            </li>
        @endguest
      </ul>
{{--
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
--}}
    </div>
  </div>
</nav>