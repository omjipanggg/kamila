<nav class="sb-topnav position-relative navbar navbar-expand navbar-light bg-light shadow">
    <button class="btn btn-sm btn-link px-3 btn-nav" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand" href="{{ URL::to('/') }}">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
    </a>
    <ul class="navbar-nav ms-auto me-3">
        @guest
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                </li>
            @endif 
            <p class="navbar-text d-none d-md-inline-block">/</p>
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" v-pre=""><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>
<div id="progress"></div>