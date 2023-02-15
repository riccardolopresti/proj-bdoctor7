@extends('layouts.app')

@section('title')
    | Specializzazioni
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="wrapper border rounded-4 p-4 pt-2 mt-5">

                    <div class="title">
                        <h1>
                            Specializzazioni
                        </h1>
                    </div>

                    <div class="add-spec">
                        <form action="{{route('admin.specializations.store')}}" method="POST">
                            @csrf
                            @method('CREATE')

                            <label for="type" class="form-label">Aggiungi una nuova specializzazione:</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="type" placeholder="Aggiungi una nuova specializzazione">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    Aggiungi
                                </button>
                            </div>
                        </form>
                    </div>

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Specializzazione</th>
                                <th scope="col">N° Medici</th>
                            </tr>
                        </thead>
                        @foreach ( $specs as $spec )
                            <tbody>
                                <tr>
                                    <td class="d-flex flex-wrap">
                                        <div class="form-wrapper d-flex">

                                            <div class="update-form">
                                                <form  action="{{route('admin.specializations.update', $spec->id)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input class="border-0 w-75" type="text" name="type" value="{{$spec->type}}">
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </form>
                                            </div>

                                            <div class="delete-form">
                                                <form  action="{{route('admin.specializations.destroy', $spec->id)}}" method="POST" class="bg-light w-25">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>

                                    <td><span class="badge text-bg-dark">{{count($spec->doctors)}}</span></td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
