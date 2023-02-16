@extends('layouts.app')

@section('title')
    | ratings
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="title py-3">
                    <h1>Rating</h1>
                </div>

                <div class="create-msg py-2">
                    <a href="{{ route('admin.ratings.create') }}" class="btn btn-success mt-3">Crea un nuovo messaggio</a>
                </div>

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cognome dottore</th>
                            <th scope="col">nome</th>
                            <th scope="col">rating</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            @foreach ($doctor->ratings as $rating )
                                <tr>
                                    <td>{{ $doctor->surname }}</td>
                                    <td>{{ $rating->name }}</td>
                                    <td>{{ $rating->rating }}</td>
                                    <td>
                                        <div class="delete-form">
                                            <form onsubmit="return confirm('Vuoi davvero eliminare questa valutazione?')"
                                                action="{{ route('admin.ratings.destroy', $rating->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
