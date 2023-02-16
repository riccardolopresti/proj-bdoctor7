@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Modifica offerta</h1>

    <form action="{{route('admin.offers.update',$offer)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="offer_type" class="form-label">Tipo di offerta</label>
            <input type="text" class="form-control @error('offer_type') is-invalid @enderror"
            name="offer_type" id="offer_type" value="{{old('offer_type', $offer->offer_type)}}">
            @error('offer_type')
                <p class="invalid-feedback">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
            name="price" id="price" value="{{old('price', $offer->price)}}">
            @error('price')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Durata</label>
            <input type="number" class="form-control @error('duration') is-invalid @enderror"
            name="duration" id="duration" value="{{old('duration', $offer->duration)}}">
            @error('duration')
            <p  class="invalid-feedback">
                {{$message}}
            </p>
           @enderror
        </div>

        <button type="submit" class="btn btn-success mb-5">Invia</button>

    </form>
</div>

@endsection
