@extends('layouts.app')

@section('title')
    | Messaggi
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col custom-messages-col">

                @if (Auth::user()->is_admin)
                    <div class="create-msg d-flex justify-between w-100">
                        <div class="left-side w-100">
                            <h3 class="mt-5 fw-bold">Messaggi</h3>
                        </div>
                        <div class="right w-100 d-flex justify-content-end">

                            <a href="{{ route('admin.messages.create') }}" class="bn632-hover bn26 create-message mt-5">Nuovo messaggio</a>
                        </div>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="special-table">
                        <div class="limiter m-0">
                            <div class="container m-0 p-0">
                                <div class="wrap-table100">
                                    <div class="table100">
                                        @foreach ($doctors as $doctor )
                                            <table class="my-5">
                                                <thead>
                                                    <tr class="table100-head">
                                                        <th colspan="6">Dott. {{ $doctor->surname }}</th>
                                                    </tr>
                                                    <tr class="table100-head">
                                                        <th class="column1">Nome</th>
                                                        <th class="column2">Oggetto</th>
                                                        <th class="column3">Email</th>
                                                        <th class="column4 text-start">Messaggio</th>
                                                        <th class="column5">Azioni</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($doctor->messages as $message)
                                                    <tr class="havemsg">
                                                        <td >
                                                            <a href="{{route('admin.messages.show', $message->id)}}">
                                                            {{ $message->name }}
                                                            </a>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->object }}
                                                            </span>
                                                            </td>
                                                        <td class="ellipsis" >
                                                            <span>
                                                                {{ $message->email }}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->text }}
                                                            </span>
                                                        </td>
                                                        <td class="del-btn">
                                                            <div class="delete-form">
                                                                @include('admin.messages.partials.delete-form')
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6">Nessun messaggio...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                            <ul class="list-group">
                                                <li class="list-group-item custom-head" aria-current="true">Dott. {{ $doctor->surname }}</li>
                                                @forelse ($doctor->messages as $message)
                                                    <li class="list-group-item"><strong>Messagio n°: </strong> {{$loop->iteration}}</li>
                                                    <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$message->name}}</li>
                                                    <li class="list-group-item"><strong>Oggetto: </strong>{{ $message->object ? $message->object : 'Nessun oggetto'}}</li>
                                                    <li class="list-group-item"><strong>Email: </strong>{{$message->email}}</li>
                                                    <li class="list-group-item custom-last">
                                                        <p>
                                                            {{$message->text}}
                                                        </p>
                                                    </li>
                                                    <li class="list-group-item custom-last mb-2 d-flex">
                                                        <div class="show-msg pe-2">
                                                            <a class="bn632-hover bn26 create-profile" href="{{route('admin.messages.show', $message->id)}}">
                                                                Visualizza
                                                            </a>
                                                        </div>
                                                        <div class="delete-form">
                                                            <form class="d-inline"
                                                            onsubmit="return confirm('Confermi l\'eliminazione di {{$message->name}} ?')"
                                                            action="{{route('admin.messages.destroy', $message)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="bn632-hover bn26 delete-sm-btn" title="delete">Elimina</button>
                                                            </form>
                                                        </div>
                                                    </li>

                                                @empty
                                                    <li class="list-group-item  custom-last">
                                                        <p>
                                                            nessun messagggio..
                                                        </p>
                                                    </li>
                                                @endforelse
                                            </ul>

                                        @endforeach
                                            @if (Auth::user()->is_admin)
                                                <div class="mobile-pagination">
                                                    {{ $doctors->links() }}
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                {{-- PARTE NON ADMIN --}}
                <div class="left-side w-100 mt-5">
                    <h1 class=" mt-5 dark-blue d-inline">I tuoi messaggi</h1>
                </div>
                    <div class="special-table auth-special">
                        <div class="limiter m-0">
                            <div class="container m-0 p-0">
                                <div class="wrap-table100">
                                    <div class="table100">
                                        <table class="my-5">
                                            <thead>
                                                <tr class="table100-head">
                                                    <th colspan="6">Dott. {{ $user_logged->surname }}</th>
                                                </tr>
                                                <tr class="table100-head">
                                                    <th class="column1">Nome Utente</th>
                                                    <th class="column1">Oggetto</th>
                                                    <th class="column1">Data</th>
                                                    <th class="column3">Email</th>
                                                    <th class="column4">Messaggio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ( $messages as $message)
                                                    <tr class="havemsg">
                                                        <td>
                                                            <a href="{{route('admin.messages.show', $message->id)}}">
                                                            {{ $message->name }}
                                                            </a>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->object ? $message->object : 'Nessun oggetto'}}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis data-msg">
                                                            <span>
                                                                {{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $message->created_at),0,10))))}}
                                                            </span>

                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->email }}
                                                            </span>
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $message->text }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">Nessun messaggio...</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>


                                        <ul class="list-group">
                                            <li class="list-group-item custom-head">Dott. {{ $user_logged->surname }}</li>
                                            @forelse ( $messages as $message)
                                                <li class="list-group-item"><strong>Messagio n°: </strong> {{$loop->iteration}}</li>
                                                <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$message->name}}</li>
                                                <li class="list-group-item"><strong>Oggetto: </strong>{{ $message->object ? $message->object : 'Nessun oggetto'}}</li>
                                                <li class="list-group-item "><strong>Data: </strong> {{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $message->created_at),0,10))))}}</li>
                                                <li class="list-group-item"><strong>Email: </strong>{{$message->email}}</li>
                                                <li class="list-group-item custom-last">
                                                    <p class="text-truncate-custom">

                                                    </p>
                                                </li>
                                                <li class="list-group-item custom-last mb-2">
                                                    <div class="show-msg pe-2">
                                                        <a class="bn632-hover bn26 create-profile" href="{{route('admin.messages.show', $message->id)}}">
                                                            Visualizza
                                                        </a>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="list-group-item  custom-last">
                                                    <p>
                                                        nessun messagggio..
                                                    </p>
                                                </li>
                                            @endforelse
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @if (Auth::user()->is_admin)
                {{ $doctors->links() }}
            @endif

            </div>
        </div>

        <script>
            $('.havemsg').click( function() {
                window.location = $(this).find('a').attr('href');
            }).hover( function() {
                $(this).toggleClass('hover');
            });

            $('.del-btn').click(function(e) {
                e.stopPropagation();
            });

            function cutText(text){
                if(text.length > 80){
                    text=text.slice(0, 100)+'...'  }
                return text
            }

            const docMsg = <?php echo json_encode($user_logged->messages); ?>;
            for(let i=0; i<docMsg.length; i++){
                let msgContainer=document.querySelectorAll('.text-truncate-custom')
                msgContainer[i].innerHTML=cutText(docMsg[i]['text'])
            }


            function changeDateFormat(date){
                let new_date=date.substring(0,10).split("-").reverse().slice().join("/");
                return new_date
            }

            const msgDate = <?php echo json_encode($user_logged->messages); ?>;
            for(let i=0; i<msgDate.length; i++){
                let dateContainer=document.querySelectorAll('.data-it')
                dateContainer[i].innerHTML=changeDateFormat(msgDate[i]['created_at'])
            }

            const msgDate2 = <?php echo json_encode($user_logged->messages); ?>;
            for(let i=0; i<msgDate2.length; i++){
                let dateContainer2=document.querySelectorAll('.data-it-2')
                dateContainer2[i].innerHTML=changeDateFormat(msgDate2[i]['created_at'])
            }

        </script>
@endsection
