@extends('layouts.app')

@section('title')
    | ratings
@endsection

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif


        <div class="title py-3">
            <h1>Valutazioni</h1>
        </div>



        @if (Auth::user()->is_admin)
        <div class="row">
            <div class="col">

                <div class="create-msg py-2">
                    <a href="{{ route('admin.ratings.create') }}" class="btn btn-success mt-3">Crea una valutazione</a>
                </div>

                @foreach ($doctors as $doctor)
                    <div class="wrapper border rounded-4 my-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 200px" scope="col" class="text-capitalize">
                                        Dott.  {{$doctor->user->name}} {{ $doctor->surname }}
                                    </th>
                                    <th scope="col">Nome Utente</th>
                                    <th scope="col">Voto</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctor->ratings as $rating)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rating->name }}</td>
                                        <td>{{ $rating->rating }}</td>
                                        <td>
                                            <div class="delete-form">
                                                @include('admin.ratings.partials.delete-form')
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>

            {{ $doctors->links() }}
        </div>

        @else
        <div class="wrapper border bbord rounded-4 my-3">
            {{$user_logged}}
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 200px" scope="col" class="text-capitalize">
                            Dott. {{ $user_logged->surname }}
                        </th>
                        <th scope="col">Nome Utente</th>
                        <th scope="col">Voto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user_logged->ratings as $rating )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rating->name }}</td>
                            <td>{{ $rating->rating }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
