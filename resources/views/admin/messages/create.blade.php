@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea un nuovo messaggio</h2>


        <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="object" class="form-label">Oggetto</label>
                <input type="text" class="form-control" id="object" name="object" value="{{ old('object') }}"
                    placeholder="Oggetto">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Messaggio</label>
                <textarea class="form-control" id="text" name="text" rows="3">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>

    </div>
@endsection
