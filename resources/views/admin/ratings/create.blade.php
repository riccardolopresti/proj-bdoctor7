@extends('layouts.app')

@section('content')
    <div class="container mt-5 ms-3">
        <h1>Crea una nuova valutazione</h1>

        <form action="{{ route('admin.ratings.store') }}" method="POST" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nome">

                    @error('name')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Id Dottore *</label>
                <input type="number" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}"
                    placeholder="id dottore">

                    @error('doctor_id')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
            </div>

            <div class="mb-3 w-25">
                <label for="rating" class="form-label">Valutazione *</label>
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

            <button type="submit" class="bn632-hover bn26 create-message mt-5">Crea</button>
        </form>

    </div>
@endsection
