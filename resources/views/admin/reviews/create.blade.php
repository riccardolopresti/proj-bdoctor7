@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea una nuova review</h2>


        <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="doctor_id" class="form-label">ID</label>
                <input type="number" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Review</label>
                <textarea class="form-control" id="text" name="text" rows="3">{{ old('review') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>

    </div>
@endsection
