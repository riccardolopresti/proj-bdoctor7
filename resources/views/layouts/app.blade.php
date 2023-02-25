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

    <!-- Fontawesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css' integrity='sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==' crossorigin='anonymous'/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    {{-- scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><!-- jQuery base library needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    {{-- Braintree --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.js"></script>

    {{-- validatore --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_it.min.js" integrity="sha512-UQ9TMYbQBi6Tg7TKdIF1uEiDjRtcD4F1oVdQz/Rb1e9nhImFrvL1VWNhh/+6Q2dCG8NxH4at0B5pNWu4xaQGoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

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
                        <div @auth class="aside-container col-2 m-0 p-0"@endauth>
                            @include('admin.partials.aside')
                        </div>
                    @endauth

                    <div class="col main-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>

        {{-- @include('admin.partials.footer') --}}
    </div>

    @stack('body-scripts')
</body>

</html>
