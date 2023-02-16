@extends('layouts.app')

@section('content')
   @if (Auth::user()->is_admin)
    <table class="table">
       <thead>
           <tr>
               <th scope="col">ID</th>
               <th scope="col">Last</th>
               <th scope="col">Specs</th>
               <th scope="col">Address</th>
               <th scope="col">Phone</th>

            </tr>
        </thead>
        <tbody>

        @foreach ($doctors as $doctor)

        <tr>
            <th scope="row">{{$doctor->user_id}}</th>

            <td>{{$doctor->surname}}</td>
            <td>
                <ul>
                    @foreach ($doctor->specs as $spec)
                    <li>{{$spec->type}}</li>
                    @endforeach


                </ul>
            </td>

            <td>{{$doctor->address}}</td>
            <td>{{$doctor->phone}}</td>
        </tr>
        @endforeach




        </tbody>

    </table>
    @else
        @if (!$doctors->contains('user_id', Auth::user()->id))

            <a href="{{route('admin.doctors.create')}}" class=" mt-4 btn btn-warning btn-big" type="button">Crea un nuovo profilo</a>
        @else
        <a href="{{route('admin.doctors.show', $doctor)}}" class=" mt-4 btn btn-info btn-big" type="button">Modifica il tuo profilo</a>
        @endif
   @endif
@endsection
