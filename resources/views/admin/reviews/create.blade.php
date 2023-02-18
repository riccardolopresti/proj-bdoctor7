@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea una nuova recensione</h2>


        <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="doctor_id" class="form-label">ID Dottore *</label>
                <input type="number" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}" placeholder="Seleziona l'id del dottore">

                @error('doctor_id')
                    <p class="text-danger">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Recensione *</label>
                <textarea class="form-control" id="text" name="text" rows="3">{{ old('review') }}</textarea>
                @error('text')
                    <p class="text-danger">
                        {{$message}}
                    </p>
                @enderror

            </div>
            <button type="submit" class="btn btn-success mt-4">Crea</button>
        </form>

    </div>
@endsection
