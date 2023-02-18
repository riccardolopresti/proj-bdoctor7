<header>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="logo_doc mb-3">
                    <img src="/logo-doc-transp.png" alt="logo">
                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/') }}"><i class="fa-solid fa-house fs-5 mb-2 ps-2"></i></a>
                    </li>
                    {{-- <li>
                        <form class="search-form mt-2 ms-5">
                            <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input type="text" placeholder="Cerca...">
                        </form>
                    </li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif

                    @else
                    <li class="nav-item me-2 mb-2">
                        <a class="nav-link" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                    </li>
                    <li class="nav-item me-2 mb-2">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item me-2 mb-2">
                        <a class="nav-link" href="{{ route('admin.doctors.index') }}">{{ Auth::user()->name }}</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
