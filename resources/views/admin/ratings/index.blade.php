@extends('layouts.app')

@section('title')
    | Valutazioni
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
                        <h3 class="mt-5 fw-bold">Valutazioni</h3>
                    </div>
                    <div class="right w-100 d-flex justify-content-end">

                        <a href="{{ route('admin.ratings.create') }}" class="bn632-hover bn26 create-message mt-5">Nuova valutazione</a>
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
                                                    <th class="column7">Nome</th>
                                                    <th class="column8">Valutazione</th>

                                                    <th class="column9">Azioni</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($doctor->ratings as $rating)
                                                    <tr class="havemsg">
                                                        <td >
                                                            {{ $rating->name }}
                                                        </td>
                                                        <td class="ellipsis">
                                                            <span>
                                                                {{ $rating->rating }}
                                                            </span>
                                                        </td>

                                                        <td class="del-btn">
                                                            <div class="delete-form">
                                                                @include('admin.ratings.partials.delete-form')
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
                                            @forelse ($doctor->ratings as $rating)
                                                <li class="list-group-item"><strong>Valutazione n°: </strong> {{$loop->iteration}}</li>
                                                <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$rating->name}}</li>
                                                <li class="list-group-item"><strong>Valutazione: </strong>{{ $rating->rating}}</li>


                                                <li class="list-group-item custom-last mb-2 d-flex">
                                                    <div class="delete-form">
                                                        <form class="d-inline"
                                                        onsubmit="return confirm('Confermi l\'eliminazione di {{$rating->name}} ?')"
                                                        action="{{route('admin.ratings.destroy', $rating)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="bn632-hover bn26 delete-sm-btn " title="delete">Elimina</button>
                                                        </form>
                                                    </div>
                                                </li>

                                            @empty
                                                <li class="list-group-item  custom-last">
                                                    <p>
                                                        nessuna valutazione...
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

        @else

        <div class="left-side w-100 mt-5">
            <h3 class="mt-5 fw-bold d-inline dark-blue">Valutazioni del Dott. </h3><h1 class=" mt-5 blue d-inline">{{ $user_logged->surname }}</h1>
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
                                        <th scope="col">Voto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $ratings as $rating)
                                        <tr>
                                            <td>{{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $rating->created_at),0,10))))}}</td>
                                            <td>{{ $rating->name }}</td>
                                            <td><span class="ratings-star"></span></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Nessun valutazione...</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <ul class="list-group">
                                <li class="list-group-item custom-head">Dott. {{ $user_logged->surname }}</li>
                                @forelse  ( $ratings as $rating)
                                    <li class="list-group-item"><strong>Valutazione n°: </strong> {{$loop->iteration}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Nome utente: </strong> {{$rating->name}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Data: </strong> {{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $rating->created_at),0,10))))}}</li>
                                    <li class="list-group-item mb-2">
                                        <strong>Voto: </strong>
                                        <span class="ratings-star-2"></span>
                                    </li>
                                @empty
                                    <li class="list-group-item custom-last">
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
                display: none
            }
        }
    </style>

    <script>
            function starsRating(number){
                let newRating = (Math.ceil(number*2)/2);
                let stars = [];
                const diff=5-newRating;
                console.log(newRating, diff);
                    for(let i=newRating; i>=1; i--){
                        stars.push(`<i class="fa-solid fa-star" style="color:gold;"></i>`);

                };
                if(diff % 1){
                    stars.push(`<i class="fa-solid fa-star-half-stroke" style="color:gold;"></i>`);
                }
                for(let j = (5 - newRating); j >= 1; j--){
                stars.push(`<i class="fa-regular fa-star" style="color:gold"></i>`);
                }
                return stars.join('');
            }

            const docRatings = <?php echo json_encode($user_logged->ratings); ?>;
            for(let i=0; i<docRatings.length; i++){
                let ratingContainer=document.querySelectorAll('.ratings-star')
                ratingContainer[i].innerHTML=starsRating(docRatings[i]['rating'])
            }

            const docRatings2 = <?php echo json_encode($user_logged->ratings); ?>;
            for(let i=0; i<docRatings.length; i++){
                let ratingContainer2=document.querySelectorAll('.ratings-star-2')
                ratingContainer2[i].innerHTML=starsRating(docRatings2[i]['rating'])
            }

    </script>

@endsection
