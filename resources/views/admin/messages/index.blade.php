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

                            <a href="{{ route('admin.messages.create') }}" class="btn btn-outline-success mt-3">Crea un nuovo messaggio</a>
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
                                                    <tr  class="havemsg">
                                                        <td class="column1 ">
                                                            <a href="{{route('admin.messages.show', $message->id)}}">
                                                            {{ $message->name }}
                                                            </a>
                                                        </td>
                                                        <td class="column2 ellipsis">
                                                            <span>
                                                                {{ $message->object }}
                                                            </span>
                                                            </td>
                                                        <td class="column3 ellipsis" >
                                                            <span>
                                                                {{ $message->email }}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis column4">
                                                            <span>
                                                                {{ $message->text }}
                                                            </span>
                                                        </td>
                                                        <td class="column5">
                                                            <div class="delete-form">
                                                                @include('admin.messages.partials.delete-form')
                                                                </form>
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else

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
                                                    <th class="column4">Messaggio</th>
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
                                                        <td>{{ $message->object }}</td>
                                                        <td>{{ $message->email }}</td>
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
            .create-msg{
                margin-bottom: -37px
            }
            .col.custom-messages-col{
                padding-bottom: 200px;
                padding-left: 40px;
                padding-right:40px
            }
            .special-table.auth-special{
                padding-top: 20px
            }
        </style>

        <script>
            $('.havemsg').click( function() {
                window.location = $(this).find('a').attr('href');
                console.log('saasas');
            }).hover( function() {
                $(this).toggleClass('hover');
            });
        </script>
@endsection
