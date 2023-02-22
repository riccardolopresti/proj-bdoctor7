@extends('layouts.app')

@section('title')
    | messages show
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col custom-messages-col-show">

                <ul class="list-group d-block">
                    <li id="primo-li" class="list-group-item custom-group text-capitalize">
                        Messaggio di  {{$message->name}}
                    </li>
                    <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$message->name}}</li>
                    <li class="list-group-item"><strong>Oggetto: </strong>{{ $message->object ? $message->object : 'nessun oggetto'}}</li>
                    <li class="list-group-item"><strong>Data: </strong>{{ $message->created_at }}</li>
                    <li class="list-group-item"><strong>Email: </strong>{{$message->email}}</li>
                    <li class="list-group-item">
                        <p>
                            {{$message->text}}
                        </p>
                    </li>
                </ul>

                <a href="{{route('admin.messages.index')}}" class="bn632-hover bn26 mt-5" style="width: 11rem">Torna a tutti i messaggi</a>

            </div>
        </div>

        <style>
            .col.custom-messages-col-show{
                margin-top: 69px;
                padding-bottom: 200px;
                padding-left: 40px;
                padding-right: 40px;
            }
            .list-group-item.custom-group{
                height: 100px;
                background: rgb(55,130,232);
                color: white;
                font-size:1.7rem;
            }

        </style>
@endsection


