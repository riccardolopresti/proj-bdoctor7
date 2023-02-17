@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Pagina di riepilogo profilo: Dr. {{$user->name}} {{$doctor->surname}}</h1>


    <div class="container-fluid">


                    <div class="card" style="width: 30rem;">
                        @if (str_contains($doctor->image,'http'))
                        <img src="{{$doctor->image}}"
                        class="card-img-top"
                        alt="{{$doctor->slug}}"
                        title="Anteprima progetto">
                        @else
                        <img src="{{ asset('storage/'. $doctor->image)}}"
                        class="card-img-top"
                        alt="{{$doctor->image_original_name}}"
                        title="Anteprima dottore">
                        @endif

                        <div class="card-body">
                          <h2 class="card-title text-primary">{{$user->name}} {{$doctor->surname}}</h2>
                          <h5 class="card-text">
                              Specializzazioni:
                              <ul class="list-unstyled list-inline mb-3">
                                @foreach ($doctor->specs as $spec)
                                    <li class="my-2"><span class="badge text-bg-info">{{$spec->type}}</span>
                                    </li>
                                @endforeach
                                </ul>
                            </h5>
                            <h4 class="d-inline mb-5">Indirizzo:</h4><p class="my-3 ms-3 mb-5 d-inline ">{{$doctor->address}}</p><br>
                            <h4 class="d-inline mb-5">Telefono:</h4><p class="my-3 ms-3 mb-5 d-inline">{{$doctor->phone}}</p><br>
                            <h4 class="d-inline mb-5">Servizi:</h4><p class="my-3 ms-3 mb-5 d-inline">{{$doctor->health_care}}</p><br>

                          <a href="{{route('admin.doctors.edit', $doctor)}}" class="btn btn-primary">Modifica profilo</a>
                        </div>
                      </div>



    </div>
@endsection
