@extends('layouts.app')

@section('content')
    CREATE - NEW DOCTOR

    <h1 class="mb-4">Nuovo profilo dottore</h1>

    <form action="{{route('admin.doctors.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 container-fluid">
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" name="name" value="{{Auth::user()->name}}">
                    @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" aria-describedby="surname" name="surname" value="{{old('surname')}}">
                    @error('surname')
                                <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <select class="form-select form-select my-3" aria-label=".form-select-lg example" name="specs">
                        <option selected value=''>Seleziona una specializzazione</option>
                        @foreach ($specializations as $specialization)
                                    <option value="{{$specialization->id}}">{{$specialization->type}}</option>
                                @endforeach

                              </select>
                              @error('specialization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                </div>

                <div class="col-6 my-2">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" aria-describedby="address" name="address" value="{{old('address')}}">
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
                <div class="col-12">
                        <label for="health_care" class="form-label">Descrizione servizi aggiuntivi</label><br>
                        <textarea name="health_care" id="health_care" rows="5" class="w-100">{{old('health_care')}}</textarea>
                        @error('health_care')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-12">
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
                    <div class="col-12">
                        <label for="image" class="form-label">Aggiungi un cv</label>
                        <input
                         type="file" class="form-control @error('cv') is-invalid @enderror"  id="cv" name="cv" value="{{old('cv')}}">
                        @error('cv')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror

                    </div>


                </div>

                <button type="submit" class="btn btn-success my-5">Aggiungi nuovo</button>
            </div>



        </div>







    </form>

    <script>
        ClassicEditor
                .create( document.querySelector( '#summary' ),{
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                })
                .catch( error => {
                    console.error( error );
                } );
        function showImage(event){
            const tagImage = document.getElementById('project-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
        </script>

@endsection
