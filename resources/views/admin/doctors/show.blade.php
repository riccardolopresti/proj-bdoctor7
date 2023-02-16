@extends('layouts.app')

@section('content')
    DOCTOR: PROFILE SHOW
    {{$doctor->surname}}

    <div class="container-fluid">
                <div class="row">
                    <div class="col-2 profile-picture">
                        @if (str_contains($doctor->image,'http'))
                        <img src="{{$doctor->image}}"
                        class="card-img-top dc-proj-image"
                        alt="{{$doctor->slug}}"
                        title="Anteprima progetto">
                        @else
                        <img src="{{ asset('storage/app/'. $doctor->image)}}"
                        class="card-img-top dc-proj-image"
                        alt="{{$doctor->image_original_name}}"
                        title="Anteprima dottore">
                        @endif</div>
                </div>
    </div>
@endsection
