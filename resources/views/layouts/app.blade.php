<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        @include('admin.partials.header')

        <main>
            <div class="container-fluid">
                <div class="row">
                    @auth
                        <div @auth class="col-1 m-0 p-0"@endauth>
                            @include('admin.partials.aside')
                        </div>
                    @endauth

                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>

        {{-- @include('admin.partials.footer') --}}
    </div>
</body>

</html>
