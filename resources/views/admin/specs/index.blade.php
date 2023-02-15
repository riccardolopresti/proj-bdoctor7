@extends('layouts.app')

@section('title')
    | Specializzazioni
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                @endif

                <div class="wrapper border rounded-4 p-4 pt-2 mt-5">

                    <div class="title">
                        <h1>
                            Specializzazioni
                        </h1>
                    </div>

                    <div class="add-spec">
                        <form action="{{route('admin.specializations.store')}}" method="POST">
                            @csrf

                            <label for="type" class="form-label">Aggiungi una nuova specializzazione:</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" placeholder="Aggiungi una nuova specializzazione">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    Aggiungi
                                </button>
                            </div>

                            @error('type')
                                <div class="text-danger m-0 p-0">
                                    {{$message}}
                                </div>
                                @enderror

                        </form>
                    </div>

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Specializzazione</th>
                                <th scope="col">N° Medici</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $specs as $spec )
                                <tr>
                                    <td class="d-flex flex-wrap">

                                        <div class="update-form">
                                            <form  action="{{route('admin.specializations.update', $spec)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                    <input class="border-0 w-75" type="text" name="type" value="{{$spec->type}}">
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                            </form>
                                        </div>

                                        <div class="delete-form">
                                            <form  action="{{route('admin.specializations.destroy', $spec)}}" method="POST" class="bg-light w-25">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>

                                    </td>

                                    <td>
                                        <span class="badge text-bg-dark">{{count($spec->doctors)}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
