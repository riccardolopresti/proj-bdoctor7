@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="main-wrapper-doctors row">
            <div class="col-12 d-flex justify-content-end buttons mb-3 me-3">
                <a href="{{route('admin.doctors.edit', $doctor)}}" class="btn btn-info btn-sm me-2"><i class="fa-solid fa-pen-to-square"></i> Modifica profilo</a>
                <a href="{{route('admin.messages.index')}}" class="btn btn-primary btn-sm me-2"><i class="fa-solid fa-envelope"></i> Messages</a>
                <a href="{{route('admin.offers.index')}}" class="btn btn-primary btn-sm me-2"><i class="fa-solid fa-award"></i> Promo</a>
                <button type="button" class="btn btn-primary btn-sm" disabled><i class="fa-solid fa-file-invoice"></i> CV</button>
            </div>
            <div class="col-7 left row">

                <div class="col-5 profile-photo p-0">
                    @if (str_contains($doctor->image,'http'))
                    <img src="{{$doctor->image}}"
                    class="card-img-top"
                    alt="{{$doctor->slug}}"
                    title="Anteprima dottore">
                    @else
                    <img src="{{ asset('storage/'.$doctor->image)}}"
                    class="card-img-top"
                    alt="{{$doctor->image_original_name}}"
                    title="Anteprima dottore">
                    @endif
                </div>
                <div class="col-7 details">
                    <h4 class="text-primary">{{$user->name}} {{$doctor->surname}}</h4>
                  <h6 class="profile-section mt-3">
                      Specializzazioni: </h6>
                      <ul class="list-unstyled list-inline mb-3">
                        @foreach ($doctor->specs as $spec)
                            <li class="my-2 d-inline me-2 mt-4"><span class="badge">{{$spec->type}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                    <p class="m-0">
                            <i class="fa-solid blue fa-location-dot"></i></i>&nbsp;{{$doctor->address}}</p>

                        <p class="mt-1"><i class="fa-solid blue fa-phone"></i>&nbsp;
                            @if ($doctor->phone)
                            {{$doctor->phone}}
                            @else
                            <span class="grey">Nessun telefono inserito</span>
                            @endif</p>

                    </div>

                </div>
                <div class="col-12 doctor-services d-flex align-items-end mt-3">
                    <div class="bordered-container w-100 me-3 ">

                        <h6 class="light-blue"><i class="fa-solid fa-notes-medical"></i> I tuoi servizi</h6>

                        @if ($doctor->health_care)
                        {!! $doctor->health_care !!}
                        @else
                        <span class="grey">Nessun servizio inserito</span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col-5 right d-flex flex-column justify-content-end align-items-end">

                <div class="sections-blue mt-5">
                    <div class="section-blue">

                        <h6>Le tue valutazioni</h6>

                        <div class="bg-container">
                            @if ($doc_ratings)
                            {{$doc_ratings}}
                            @else
                            <span class="grey">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>&nbsp;
                                Non hai ancora ricevuto valutazioni</span>
                            @endif
                        </div>
                    </div>
                    <div class="section-blue mt-3">

                        <h6>Le tue recensioni</h6>
                        <div class="bg-container mt-3">

                            <div class="text-container">
                                <span class="doc_reviews">
                                    @if (!empty($doc_reviews)==0)
                                        @foreach ($doc_reviews as $doc_review)
                                        {{$doc_review->text}}
                                        @endforeach
                                    @else
                                    <span class="grey">Non hai ancora ricevuto recensioni</span>
                                    @endif
                                </span>
                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div>

@endsection
