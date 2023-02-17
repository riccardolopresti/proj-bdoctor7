@extends('layouts.app')

@section('title')
    | recensioni
@endsection

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col">

                <div class="title py-3">
                    <h1>Recensioni</h1>
                </div>

        @if (Auth::user()->is_admin)
                <div class="create-msg py-2">
                    <a href="{{ route('admin.reviews.create') }}" class="btn btn-success mt-3">Crea una recensione</a>
                </div>


                @foreach ($doctors as $doctor)
                    <div class="wrapper border rounded-4 my-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 200px" scope="col">
                                        Dott.{{ $doctor->surname }}
                                    </th>
                                    <th scope="col">Nome Utente</th>
                                    <th scope="col">Recensioni</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $doctor->reviews as $review )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->text }}</td>
                                        <td>
                                            <div class="delete-form">
                                                @include('admin.reviews.partials.delete-form')
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Nessuna recensione...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endforeach

            </div>

            {{ $reviews->links() }}
        </div>
        @else
        <div class="wrapper border bbord rounded-4 my-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 200px" scope="col" class="text-capitalize">
                            Dott. {{ $user_logged->surname }}
                        </th>
                        <th scope="col">Nome Utente</th>
                        <th scope="col">Messaggio</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $user_logged->reviews as $review )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->text }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nessuna recensione...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
