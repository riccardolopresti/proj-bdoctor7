<header>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="logo_doc">
                    <img src="/logo-doc-transp.png" alt="logo">
                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>

            <div class="d-flex">
                <!-- Left Side Of Navbar-->
                {{-- <form class="search-form mt-2 ms-5">
                    <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Cerca...">
                </form> --}}

                <!-- Right Side Of Navbar -->
                <ul class="d-flex header-menu">
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/') }}"><i class="fa-solid fa-house fs-5"></i></a>
                    </li>
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
