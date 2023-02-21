@extends('layouts.app')

@section('content')
    <div class="container-fluid doctors-container">
        <h1 class="my-4 ms-3">Crea un nuovo profilo dottore</h1>

        <form action="{{route('admin.doctors.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="row">
                    <div class="col-6 p">
                        <label for="name" class="form-label">Nome <span class="blue">*</span></label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" value="{{$user->name,old('name')}}" readonly>

                    </div>
                    <div class="col-6">
                        <label for="surname" class="form-label">Cognome <span class="blue">*</span></label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" aria-describedby="surname" name="surname" value="{{old('surname')}}" required>
                        @error('surname')
                                    <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-2">
                        <label for="address" class="form-label" >Indirizzo <span class="blue">*</span></label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" aria-describedby="address" name="address" value="{{old('address')}}" required>
                        @error('address')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-2">
                            <label for="phone" class="form-label">Numero di telefono</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phone" name="phone" value="{{old('phone')}}">
                            @error('phone')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                    </div>


                    <div class="col-12 my-2">
                        <label for="specs" class="form-label">Scegli una o più specializzazioni <span class="blue">*</span></label><br>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" multiple="multiple" id="specs" required multiple
                            @foreach ($specializations as $specialization)
                            name="specs[]">
                                        <option value="{{$specialization->id}}"
                                            {{-- @foreach ($doctor->specs as $spec)
                                                @if ($specialization->id==$spec->id)
                                                selected
                                                @endif
                                            @endforeach --}}
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
                        </div>
                        <div class="col-12 mt-2">
                            <label for="cv" class="form-label">Aggiungi un cv</label>
                            <input
                            onchange="showCv(event)"
                            type="file" class="form-control @error('cv') is-invalid @enderror"  id="cv" name="cv" value="">
                            @error('cv')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror

                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <label for="health_care" class="form-label">Descrizione servizi aggiuntivi</label><br>
                        <textarea name="health_care" id="health_care" rows="5" class="w-100 ckeditor">

                        </textarea>
                        @error('health_care')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>



                </div>

            <button type="submit" class="bn632-hover bn26 mt-2 mb-5" style="width:9.5rem" id="create">Aggiungi profilo</button>



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

        $(document).ready(function() {
            $('#specs').select2({tags: true, height: '300px'});
            $('.ckeditor').ckeditor();
        });

        </script>
        @endonce
@endpush


