<header>
    <nav class="navbar fixed-top">
        <div class="container-fluid">

            <div class="logo_doc">
                <a href="{{ url('/') }}"><img src="/logo-doc-transp.png" alt="logo"></a>
            </div>

            <button id="offcanvas-btn" class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="d-flex">
                <ul class="d-flex header-menu m-0">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                    @endif

                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctors.index') }}">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                             <i class="fa-solid fa-right-to-bracket"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
