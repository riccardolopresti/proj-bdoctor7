@extends('layouts.app')

@section('content')

    <div class="container-fluid mt-3">
        <div class="px-3 d-flex d-flex align-items-center justify-content-between">
            <h1 class="my-3"><span class="title">
                Modifica profilo:
            </span><br>
                 {{$user->name}} {{$doctor->surname}}
                 <form action="{{route('admin.doctors.destroy',$doctor)}}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="delete">Elimina profilo</button>
                </form>
            </h1>
            <div class="image-and-delete text-center">
                <div class="profile mt-2" >
                    <img id="profile-img"
                    @if (str_contains($doctor->image,'http')) src="{{$doctor->image}}"
                    @else src="{{ asset('storage/'. $doctor->image)}}"
                   @endif alt="{{$doctor->image_original_name}}" >
                </div>


            </div>

        </div>


    </div>

    <div class="container-fluid">
        <form action="{{route('admin.doctors.update', $doctor)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 p">
                        <label for="name" class="form-label">Nome *</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" value="{{$user->name, old('name')}}" readonly>

                    </div>
                    <div class="col-6">
                        <label for="surname" class="form-label">Cognome *</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" aria-describedby="surname" name="surname" value="{{$doctor->surname, old('surname')}}" required>
                        @error('surname')
                                    <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-2">
                        <label for="address" class="form-label" >Indirizzo *</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" aria-describedby="address" name="address" value="{{$doctor->address, old('address')}}" required>
                        @error('address')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-2">
                            <label for="phone" class="form-label">Numero di telefono</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phone" name="phone" value="{{$doctor->phone, old('phone')}}">
                            @error('phone')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                    </div>


                    <div class="col-12 my-2">
                        <label for="specs" class="form-label">Scegli una o più specializzazioni *</label><br>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" multiple="multiple" id="specs" required
                            @foreach ($specializations as $specialization)
                            name="specs[]">
                                        <option value="{{$specialization->id}}"
                                            {{-- @foreach ($doctor->specs as $spec)
                                                @if ($spec->pivot->doctor_id==$doctor->id)
                                                    selected
                                                @endif
                                            @endforeach --}}
                                            >{{$specialization->type}}</option>
                            @endforeach
                        </select>
                                  @error('specialization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </div>

                    <div class="col-7 upload-documents my-2">
                        <div class="col-12 m-0">
                            <label for="image" class="form-label">Immagine del profilo</label>
                            <input
                            onchange="showImage(event)"
                             type="file" class="form-control @error('image') is-invalid @enderror"  id="image" name="image" value="{{old('image')}}">
                            @error('image')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                            <div class="profile-image" >
                                <img id="profile-img" width="150" src="" alt="">
                            </div>
                        </div>
                        <div class="col-12 m-0">
                            <label for="cv" class="form-label">Aggiungi un cv</label>
                            <input
                            onchange="showCv(event)"
                             type="file" class="form-control @error('cv') is-invalid @enderror"  id="cv" name="cv" value="{{$doctor->cv, old('cv')}}">
                            @error('cv')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="col-5 preview my-2">
                        @if ($doctor->cv)
                        <embed src="storage/'{{$doctor->cv}}" type="application/pdf" width="100%" height="100%" id="cv-preview">
                        @endif
                    </div>

                    <div class="col-12 my-2">
                            <label for="health_care" class="form-label">Descrizione servizi aggiuntivi</label><br>
                            <textarea name="health_care" id="health_care" rows="5" class="w-100">{{$doctor->health_care, old('health_care')}}</textarea>
                            @error('health_care')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>



                    </div>

                    <button type="submit" class="btn btn-success my-5">Conferma modifiche</button>

                </div>



            </div>







        </form>


    </div>






@endsection

@push('body-scripts')
        @once
        <script>
            function showImage(event){
            const tagImage = document.getElementById('profile-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
            function showCv(event){
            const tagCV = document.getElementById('cv-preview');
            tagCV.src = URL.createObjectURL(event.target.files[0]);
        }
            // ClassicEditor
            //         .create( document.querySelector( '#summary' ),{
            //             toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            //         })
            //         .catch( error => {
            //             console.error( error );
            //         } );
            // function showImage(event){
            //     const tagImage = document.getElementById('project-img');
            //     tagImage.src = URL.createObjectURL(event.target.files[0]);
            // }

            $(document).ready(function(){
                    $('#specs').select2({tags: true, height: '300px'});
                })
        </script>
        @endonce
@endpush



