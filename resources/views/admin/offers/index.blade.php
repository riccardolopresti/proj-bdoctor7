@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="m-3">OFFERTE DISPONIBILI</h1>

    <a class="btn btn-primary text-white mb-5" href="{{route('admin.offers.create')}}">Crea nuova offerta</a>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Durata</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                   <th scope="row">{{$offer->id}}</th>
                   <td>{{$offer->offer_type}}</td>
                   <td>&euro; {{$offer->price}}</td>
                   <td>{{$offer->duration}} ore</td>
                   <td>
                    <a class="btn btn-warning " href="{{route('admin.offers.edit', $offer)}}" title="edit">Edit</a>
                    <form class="d-inline"
                    onsubmit="return confirm('Confermi l\'eliminazione?')"
                    action="{{route('admin.offers.destroy', $offer)}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button type="submit" class="btn btn-danger " title="delete">Delete</button>
                    </form>
                   </td>
                </tr>

            @endforeach

        </tbody>
      </table>
</div>


@endsection
