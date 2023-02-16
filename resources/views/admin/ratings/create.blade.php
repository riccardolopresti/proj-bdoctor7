@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un nuovo messaggio</h1>

        <form action="{{ route('admin.ratings.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nome">
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Id Dottore</label>
                <input type="number" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}"
                    placeholder="id dottore">
            </div>

            <div class="mb-3 w-25">
                <label for="rating" class="form-label">rating</label>
                <input type="range" class="form-range" min="0" max="5" step="0.5" id="rating" name="rating"
                value="@if (old('rating'))
                    {{ old('rating') }}
                @else
                    3
                @endif" placeholder="Inserisci un voto" oninput="this.nextElementSibling.value = this.value">
                <output>
                    @if (old('rating'))
                        {{ old('rating') }}
                    @else
                        3
                    @endif
                </output>
            </div>
            <button type="submit" class="btn btn-success mt-4">Submit</button>
        </form>

    </div>
@endsection
