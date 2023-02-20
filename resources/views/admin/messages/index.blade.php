@extends('layouts.app')

@section('title')
    | messages
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col p-0">

                <div class="title py-3">
                    <h1>Messaggi</h1>
                </div>

                @if (Auth::user()->is_admin)
                    <div class="create-msg py-2">
                        <a href="{{ route('admin.messages.create') }}" class="btn btn-success mt-3">Crea un nuovo messaggio</a>
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
                                                        <th class="column1">Dott.{{ $doctor->surname }}</th>
                                                        <th class="column2">Nome Utente</th>
                                                        <th class="column3">Oggetto</th>
                                                        <th class="column4">Email</th>
                                                        <th class="column5">Messaggio</th>
                                                        <th class="column6">Azioni</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($doctor->messages as $message)
                                                    <tr>
                                                        <td>{{ $doctor->surname }}</td>
                                                        <td>{{ $message->name }}</td>
                                                        <td>{{ $message->object }}</td>
                                                        <td>{{ $message->email }}</td>
                                                        <td>{{ $message->text }}</td>
                                                        <td>
                                                            <div class="delete-form">
                                                                @include('admin.messages.partials.delete-form')
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">Nessun messaggio...</td>
                                                    </tr>
                                                @endforelse
                                            </table>
                                            </div>
                                            @endforeach
                                        </div>

                                </div>
                            </div>
                    </div>

                    {{-- @foreach ($doctors as $doctor )
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 200px" scope="col">
                                        Dott.{{ $doctor->surname }}
                                    </th>
                                    <th scope="col">Nome Utente</th>
                                    <th scope="col">Oggetto</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Messaggio</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctor->messages as $message)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->object }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->text }}</td>
                                        <td>
                                            <div class="delete-form">
                                                @include('admin.messages.partials.delete-form')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Nessun messaggio...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @endforeach
                    {{ $doctors->links() }} --}}
                @else
                    {{-- <div class="wrapper border bbord rounded-4 my-3">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 200px" scope="col" class="text-capitalize">
                                        Dott. {{ $user_logged->surname }}
                                    </th>
                                    <th scope="col">Nome Utente</th>
                                    <th scope="col">Oggetto</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Messaggio</th>
                            </thead>
                            <tbody>
                                @forelse ( $user_logged->messages as $message)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->object }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->text }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Nessun messaggio...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> --}}

                    <div class="special-table">
                        <div class="limiter m-0">
                            <div class="container m-0 p-0">
                                <div class="wrap-table100">
                                    <div class="table100">
                                        <table class="my-5">
                                            <thead>
                                                <tr class="table100-head">
                                                    <th class="column1">Dott.{{ $user_logged->surname }}</th>
                                                    <th class="column2">Nome Utente</th>
                                                    <th class="column3">Oggetto</th>
                                                    <th class="column4">Email</th>
                                                    <th class="column5">Messaggio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ( $user_logged->messages as $message)
                                                    <tr>
                                                        <td>{{ $user_logged->surname }}</td>
                                                        <td>{{ $message->name }}</td>
                                                        <td>{{ $message->object }}</td>
                                                        <td>{{ $message->email }}</td>
                                                        <td>{{ $message->text }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">Nessun messaggio...</td>
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
            </div>
        </div>
@endsection
