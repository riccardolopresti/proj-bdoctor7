@extends('layouts.app')

@section('title')
    | reviews
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="title py-3">
                    <h1>Reviews</h1>
                </div>

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Review</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->text }}</td>
                                <td>
                                    <div class="delete-form">
                                        <form onsubmit="return confirm('Vuoi davvero eliminare questa review?')"
                                            action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
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
            </div>
        </div>
        {{ $reviews->links() }}
    </div>
@endsection
