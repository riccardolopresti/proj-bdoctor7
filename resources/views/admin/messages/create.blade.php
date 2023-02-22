@extends('layouts.app')

@section('content')
    <div class="container mt-5 ms-3">
        <h2 class="mb-4">Crea un nuovo messaggio</h2>


        <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data" class="w-50">
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
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Email">

                    @error('email')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="object" class="form-label">Oggetto</label>
                <input type="text" class="form-control" id="object" name="object" value="{{ old('object') }}"
                    placeholder="Oggetto">

                    @error('object')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Messaggio *</label>
                <textarea class="form-control" id="text" name="text" rows="3" placeholder="Scrivi il tuo messagio">{{ old('message') }}</textarea>

                @error('text')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
            </div>
            <button type="submit" class="bn632-hover bn26 create-message mt-4">Crea</button>
        </form>

    </div>
@endsection
