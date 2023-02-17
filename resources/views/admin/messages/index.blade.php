@extends('layouts.app')

@section('title')
    | messages
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="title py-3">
                    <h1>Messaggi</h1>
                </div>


                <div class="create-msg py-2">
                    <a href="{{ route('admin.messages.create') }}" class="btn btn-success mt-3">Crea un nuovo messaggio</a>
                </div>

                {{-- @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif --}}

                {{-- @foreach ($doctors as $doctor ) --}}
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
                        @foreach ($doctor->messages as $message)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->object }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->text }}</td>
                                <td>
                                    <div class="delete-form">
                                        <form onsubmit="return confirm('Vuoi davvero eliminare questo messaggio?')"
                                            action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @endforeach --}}

            </div>
        </div>
        {{-- {{ $messages->links() }} --}}
    </div>
@endsection
