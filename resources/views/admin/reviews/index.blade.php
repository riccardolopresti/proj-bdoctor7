@extends('layouts.app')

@section('title')
    | Recensioni
@endsection

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col">

            @if (Auth::user()->is_admin)
                <div class="create-msg d-flex justify-between w-100">
                    <div class="left-side w-100">
                        <h3 class="mt-5 fw-bold">Recensioni</h3>
                    </div>
                    <div class="right w-100 d-flex justify-content-end">

                        <a href="{{ route('admin.reviews.create') }}" class="bn632-hover bn26 create-message mt-5">Nuova recensione</a>
                    </div>
                </div>


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
                                                    <th class="column10">Nome</th>
                                                    <th class="column11">Recensione</th>

                                                    <th class="column12">Azioni</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($doctor->reviews as $review)
                                                    <tr class="havemsg">
                                                        <td >
                                                            {{ $review->name }}
                                                        </td>
                                                        <td>
                                                            <span>
                                                                {{ $review->text }}
                                                            </span>
                                                        </td>

                                                        <td class="del-btn">
                                                            <div class="delete-form">
                                                                @include('admin.reviews.partials.delete-form')
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
                                            @forelse ($doctor->reviews as $review)
                                                <li class="list-group-item"><strong>Recensione n°: </strong> {{$loop->iteration}}</li>
                                                <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$review->name}}</li>
                                                <li class="list-group-item"><strong>Recensione: </strong> <br>{{ $review->text}}</li>


                                                <li class="list-group-item custom-last mb-2 d-flex">
                                                    <div class="delete-form">
                                                        <form class="d-inline"
                                                        onsubmit="return confirm('Confermi l\'eliminazione di {{$review->name}} ?')"
                                                        action="{{route('admin.reviews.destroy', $review)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="bn632-hover bn26 delete-sm-btn" title="delete">Elimina</button>
                                                        </form>
                                                    </div>
                                                </li>

                                            @empty
                                                <li class="list-group-item  custom-last">
                                                    <p>
                                                        Nessuna valutazione...
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
                                    @if (Auth::user()->is_admin)
                                    <div class="desk">
                                        {{ $doctors->links() }}
                                    </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

            </div>

        </div>
        @else
        <div class="left-side w-100 mt-5">

            <h3 class="mt-5 fw-bold d-inline dark-blue">Recensioni del Dott. </h3><h1 class=" mt-5 blue d-inline">{{ $user_logged->surname }}</h1>
        </div>
        <div class="special-table">
            <div class="limiter m-0">
                <div class="container m-0 p-0">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table class="my-5">
                                <thead>
                                    <tr class="table100-head">
                                        <th scope="col" class="text-capitalize">
                                            Data
                                        </th>
                                        <th scope="col">Nome Utente</th>
                                        <th scope="col">Recensione</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $reviews as $review )
                                        <tr>
                                            <td>{{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $review->created_at),0,10))))}}</td>
                                            <td>{{ $review->name }}</td>
                                            <td>{{ $review->text }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Nessuna recensione...</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <ul class="list-group me-2">
                                <li class="list-group-item custom-head">Dott. {{ $user_logged->surname }}</li>
                                @forelse  ( $reviews as $review)
                                    <li class="list-group-item"><strong>Valutazione n°: </strong> {{$loop->iteration}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$review->name}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Data: </strong> {{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $review->created_at),0,10))))}}</li>
                                    <li class="list-group-item mb-2"><strong>Recensione: <br> </strong>{{ $review->text}}</li>
                                @empty
                                    <li class="list-group-item custom-last">
                                        <p>
                                            nessuna recensione...
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
    </div>

    <style>
        .col.custom-messages-col{
            padding-bottom: 200px;
            padding-left: 40px;
            padding-right:40px
        }
        .special-table.auth-special{
            padding-top: 20px
        }

        .list-group{
            padding-top: 30px;
            display: none;
        }

        .mobile-pagination{
            display: none;
        }

        .list-group:last-child{
            padding-bottom: 200px;
        }

        .list-group-item.custom-head{
            height: 100px;
            background: rgb(55,130,232);
            color: white;
            font-size:1.7rem;
            font-weight: bold;
        }

        .wrap-table100{
            padding-bottom: 200px;s
        }

        @media screen and (max-width: 990px){
            .container{
                margin-left:0;
            }
            .col.custom-messages-col{
                margin: 5px;
                padding: 5px;
            }

            .list-group{
                padding-top: 50px;
                display: block;
                padding-bottom: 40px
            }

            .mobile-pagination{
                display: block;
                padding-bottom: 80px
            }

            .desk{
                display: none;
            }
        }
    </style>

    <script>
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
