@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-login">
                    {{ __('Accedi') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Inserisci la tua email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Inserisci la tua password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricorda i miei dati') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="bn632-hover bn26">
                                    {{ __('Accedi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-header.custom-login{
            height: 90px;
            font-size: 3.5rem;
            display:flex;
            align-items:center;
            margin:0;
            padding:0 30px;
            font-weight: bold;
            color: white;
            background: rgb(55,130,232);
            background: -moz-linear-gradient(90deg, rgba(55,130,232,1) 60%, rgba(156,225,253,1) 100%);
            background: -webkit-linear-gradient(90deg, rgba(55,130,232,1) 60%, rgba(156,225,253,1) 100%);
            background: linear-gradient(90deg, rgba(55,130,232,1) 60%, rgba(156,225,253,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#3782e8",endColorstr="#9ce1fd",GradientType=1);
            height:80px;
        }

        .bn632-hover {
        width: 160px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        margin: 20px;
        height: 55px;
        text-align:center;
        border: none;
        background-size: 300% 100%;
        border-radius: 50px;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
        }

        .bn632-hover:hover {
        background-position: 100% 0;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
        }

        .bn632-hover:focus {
        outline: none;
        }

        .bn632-hover.bn26 {
        background-image: linear-gradient(
            to right,
            #25aae1,
            #4481eb,
            #04befe,
            #3f86ed
        );
        box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
        }

        @media screen and (max-width: 550px) {
            .card-header.custom-login{
            font-size: 2.5rem;
        }
        }
</style>
@endsection
