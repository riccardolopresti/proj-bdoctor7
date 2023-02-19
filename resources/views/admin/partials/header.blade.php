<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="logo_doc">

                    <picture>
                        <source srcset="/logo-doc-transp.png" media="(min-width: 991px)">
                        <source srcset="/logo-doc-mobile.png" media="(max-width: 991px)">
                        <img src="/logo-doc-transp.png">
                    </picture>

                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-content">



            <div class="d-flex">
                <!-- Left Side Of Navbar-->
                {{-- <form class="search-form mt-2 ms-5">
                    <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Cerca...">
                </form> --}}

                <!-- Right Side Of Navbar -->
                <ul class="d-flex header-menu m-0 navbar-nav">
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
                        <a class="nav-link" href="{{url('/') }}"><i class="fa-solid fa-house fs-5"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                    </li>

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
        </div>
    </nav>
</header>
