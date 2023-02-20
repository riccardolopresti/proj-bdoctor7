@extends('layouts.app')

@section('title')
    | messages show
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col custom-messages-col-show">

                <ul class="list-group">
                    <li id="primo-li" class="list-group-item custom-group text-capitalize">
                        Dettaglio del messaggio di {{$message->name}}
                    </li>
                    <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$message->name}}</li>
                    <li class="list-group-item"><strong>Oggetto: </strong>{{ $message->object ? '$message->object' : 'nessun oggetto'}}</li>
                    <li class="list-group-item"><strong>Email: </strong>{{$message->email}}</li>
                    <li class="list-group-item p-3">{{$message->text}}</li>
                </ul>

                <a href="{{route('admin.messages.index')}}" class="btn btn-primary mt-5">Torna a tutti i messaggi</a>

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
            #primo-li{
                line-height: 74px
            }
        </style>
@endsection


