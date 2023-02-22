@extends('layouts.app')

@section('title')
    | messages
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col custom-messages-col">

                @if (Auth::user()->is_admin)
                    <div class="create-msg d-flex justify-between w-100">
                        <div class="left-side w-100">
                            <h3 class="mt-3">Messaggi</h3>
                        </div>
                        <div class="rigght w-100 text-end">

                            <a href="{{ route('admin.messages.create') }}" class="btn btn-outline-success mt-3">Nuovo messaggio</a>
                        </div>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="special-table">
                        <div class="limiter m-0">
                            <div class="container m-0 p-0">
                                <div class="wrap-table100">
                                    <div class="table100">
                                        @foreach ($doctors as $doctor )
                                            <table class="my-5">
                                                <thead>
                                                    <tr class="table100-head">
                                                        <th colspan="6">Dott. {{ $doctor->surname }}</th>
                                                    </tr>
                                                    <tr class="table100-head">
                                                        <th class="column1">Nome</th>
                                                        <th class="column2">Oggetto</th>
                                                        <th class="column3">Email</th>
                                                        <th class="column4 text-start">Messaggio</th>
                                                        <th class="column5">Azioni</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($doctor->messages as $message)
                                                    <tr class="havemsg">
                                                        <td >
                                                            <a href="{{route('admin.messages.show', $message->id)}}">
                                                            {{ $message->name }}
                                                            </a>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->object }}
                                                            </span>
                                                            </td>
                                                        <td class="ellipsis" >
                                                            <span>
                                                                {{ $message->email }}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->text }}
                                                            </span>
                                                        </td>
                                                        <td class="del-btn">
                                                            <div class="delete-form">
                                                                @include('admin.messages.partials.delete-form')
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6">Nessun messaggio...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                            <ul class="list-group">
                                                <li class="list-group-item custom-head" aria-current="true">Dott. {{ $doctor->surname }}</li>
                                                @forelse ($doctor->messages as $message)
                                                    <li class="list-group-item"><strong>Messagio n°: </strong> {{$loop->iteration}}</li>
                                                    <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$message->name}}</li>
                                                    <li class="list-group-item"><strong>Oggetto: </strong>{{ $message->object}}</li>
                                                    <li class="list-group-item"><strong>Email: </strong>{{$message->email}}</li>
                                                    <li class="list-group-item custom-last">
                                                        <p>
                                                            {{$message->text}}
                                                        </p>
                                                    </li>
                                                    <li class="list-group-item custom-last mb-2 d-flex">
                                                        <div class="show-msg pe-2">
                                                            <a class="btn btn-info" href="{{route('admin.messages.show', $message->id)}}">
                                                                Visualizza
                                                            </a>
                                                        </div>
                                                        <div class="delete-form">
                                                            <form class="d-inline"
                                                            onsubmit="return confirm('Confermi l\'eliminazione di {{$message->name}} ?')"
                                                            action="{{route('admin.messages.destroy', $message)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="btn btn-danger " title="delete">Delete</button>
                                                            </form>
                                                        </div>
                                                    </li>

                                                @empty
                                                    <li class="list-group-item  custom-last">
                                                        <p>
                                                            nessun messagggio..
                                                        </p>
                                                    </li>
                                                @endforelse
                                            </ul>

                                        @endforeach
                                            @if (Auth::user()->is_admin)
                                                <div class="mobile-pagination">
                                                    {{ $doctors->links() }}
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                {{-- PARTE NON ADMIN --}}
                    <div class="special-table auth-special">
                        <div class="limiter m-0">
                            <div class="container m-0 p-0">
                                <div class="wrap-table100">
                                    <div class="table100">
                                        <table class="my-5">
                                            <thead>
                                                <tr class="table100-head">
                                                    <th colspan="6">Dott. {{ $user_logged->surname }}</th>
                                                </tr>
                                                <tr class="table100-head">
                                                    <th class="column1">Nome Utente</th>
                                                    <th class="column2">Oggetto</th>
                                                    <th class="column3">Email</th>
                                                    <th class="column6">Messaggio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ( $user_logged->messages as $message)
                                                    <tr class="havemsg">
                                                        <td>
                                                            <a href="{{route('admin.messages.show', $message->id)}}">
                                                            {{ $message->name }}
                                                            </a>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->object }}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->email }}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->text }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">Nessun messaggio...</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>


                                        <ul class="list-group">
                                            <li class="list-group-item custom-head">Dott. {{ $user_logged->surname }}</li>
                                            @forelse ( $user_logged->messages as $message)
                                                <li class="list-group-item"><strong>Messagio n°: </strong> {{$loop->iteration}}</li>
                                                <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$message->name}}</li>
                                                <li class="list-group-item"><strong>Oggetto: </strong>{{ $message->object}}</li>
                                                <li class="list-group-item"><strong>Email: </strong>{{$message->email}}</li>
                                                <li class="list-group-item custom-last mb-2">
                                                    <p>
                                                        {{$message->text}}
                                                    </p>
                                                </li>
                                            @empty
                                                <li class="list-group-item  custom-last">
                                                    <p>
                                                        nessun messagggio..
                                                    </p>
                                                </li>
                                            @endforelse
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @if (Auth::user()->is_admin)
                {{ $doctors->links() }}
            @endif

            </div>
        </div>

        <style>
            .col.custom-messages-col{
                padding-bottom: 200px;
                padding-left: 40px;
                padding-right:40px
            }
            .special-table.auth-special{
                padding-top: 20px
            }

            .list-group{
                padding-top: 30px;
                display: none;
            }

            .mobile-pagination{
                display: none;
            }

            .list-group:last-child{
                padding-bottom: 200px;
            }

            .list-group-item.custom-head{
                height: 100px;
                background: rgb(55,130,232);
                color: white;
                font-size:1.7rem;
                font-weight: bold;
            }

            @media screen and (max-width: 990px){
                .col.custom-messages-col{
                    margin: 5px;
                    padding: 5px;
                }

                .list-group{
                    padding-top: 50px;
                    display: block;
                    padding-bottom: 40px
                }

                .mobile-pagination{
                    display: block;
                    padding-bottom: 80px
                }
            }
        </style>

        <script>
            $('.havemsg:not(:last-child)').click( function() {
                window.location = $(this).find('a').attr('href');
            }).hover( function() {
                $(this).toggleClass('hover');
            });

            $('.del-btn').click(function(e) {
                e.stopPropagation();
            });

            function cutText(text){
                if(text.length > 80){
                    text=text.slice(0, 100)+'...'  }
                return text
            }
        </script>
@endsection
