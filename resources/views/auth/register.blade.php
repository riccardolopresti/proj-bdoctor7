@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header custom-register">
                        {{ __('Unisciti a noi') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="regForm">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome *') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Inserisci il tuo nome"  ddv-minlength=”5”>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome *') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Inserisci il tuo cognome">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Inserisci il tuo indirizzo">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="specs"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Specializzazione *') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                        @foreach ($specs as $spec)
                                            <option
                                            @if ($spec->id == old('type')) selected @endif value="{{ $spec->id }}">{{ $spec->type }}</option>
                                        @endforeach
                                    </select>
                                    <span style="font-size: 0.8rem" class="blue" id="specsInfo">Una volta registrato potrai aggiungere ulteriori specializzazioni.</span>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail *') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Inserisci la tua email">


                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label align-self-center text-md-right">{{ __('Password *') }}</label>

                                <div class="col-md-6">

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Inserisci una password sicura" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup='check();'>
                                        <div style="font-size: 0.8rem;" class="blue" id="psw-check">La password deve contenere almeno
                                            <span class="pw-invalid" id="chars">8 caratteri</span>
                                            tra cui almeno
                                            <span class="pw-invalid" id="low-letters">una lettera minuscola</span>, <span class="pw-invalid" id="cap-letters">una maiuscola</span> e <span class="pw-invalid" id="numbers">un numero.</span>
                                        </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                                <div class="col-md-6">

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Conferma la tua password" onkeyup='check();'>
                                        <div style="font-size: 0.8rem;" class="blue" id="psw-double-check">Le password
                                            <span class="pw-invalid" id="identical">devono coincidere.</span></div>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="bn632-hover bn26">
                                        {{ __('Registrati ora') }}
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
        .card.custom-card{
            margin-bottom: 200px;
        }

        .card-header.custom-register{
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

        #specsInfo{
            display: none;
        }

        #psw-check{
            display: none;
        }
        #psw-double-check{
            display: none;
        }

        .pw-invalid{
            color:red;
        }

        .pw-valid{
            color:green;
        }

        label.error {
         color: #dc3545;
         font-size: 14px;
        }

        @media screen and (max-width: 550px) {
            .card-header.custom-register{
            font-size: 1.85rem;
            }
        }
    </style>
    <script>

            const selectSpec = document.getElementById('type');
            const password = document.getElementById('password');
            const confirmPassword = document.querySelector('#password-confirm');
            const identical = document.getElementById('identical');
            const lowLetters=document.getElementById('low-letters')
            const capLetters=document.getElementById('cap-letters')
            const numbers=document.getElementById('numbers')
            const chars=document.getElementById('chars')

            selectSpec.onchange = function() {
                document.getElementById("specsInfo").style.display = "block";
            }

            // When the user clicks on the password field, show the message box
            password.onfocus = function() {
                document.getElementById("psw-check").style.display = "block";
            }

            confirmPassword.onfocus = function() {
                document.getElementById("psw-double-check").style.display = "block";
            }

            // When the user starts to type something inside the password field
            password.onkeyup = function() {
            // Validate lowercase letters
            const lowerCaseLetters = /[a-z]/g;
            if(password.value.match(lowerCaseLetters)) {
                lowLetters.classList.remove("pw-invalid");
                lowLetters.classList.add("pw-valid");
            } else {
                lowLetters.classList.remove("pw-valid");
                lowLetters.classList.add("pw-invalid");
            }

            // Validate capital letters
            const upperCaseLetters = /[A-Z]/g;
            if(password.value.match(upperCaseLetters)) {
                capLetters.classList.remove("pw-invalid");
                capLetters.classList.add("pw-valid");
            } else {
                capLetters.classList.remove("pw-valid");
                capLetters.classList.add("pw-invalid");
            }

            // Validate numbers
            const numeri = /[0-9]/g;
            if(password.value.match(numeri)) {
                numbers.classList.remove("pw-invalid");
                numbers.classList.add("pw-valid");
            } else {
                numbers.classList.remove("pw-valid");
                numbers.classList.add("pw-invalid");
            }

            // Validate length
            if(password.value.length >= 8) {
                chars.classList.remove("pw-invalid");
                chars.classList.add("pw-valid");
            } else {
                chars.classList.remove("pw-valid");
                chars.classList.add("invalid");
            }
        }

        confirmPassword.onkeyup = function() {
            // Validate vales
            if(password.value === confirmPassword.value) {
                console.log(true);
                identical.classList.remove("pw-invalid");
                identical.classList.add("pw-valid");
            } else {
                identical.classList.add("pw-invalid");
                identical.classList.remove("pw-valid");
            }
        }

        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255,
                        minlength: 2,
                    },
                    surname: {
                        required: true,
                        maxlength: 80,
                        minlength: 2,
                    },
                    address: {
                        required: true,
                        maxlength: 255,
                        minlength: 5,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50,
                        minlength: 8
                    },
                }
            });
        });
    </script>


@endsection

