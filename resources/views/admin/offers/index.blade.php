@extends('layouts.app')

@section('title')
 | Promozioni
@endsection

@section('content')

<div class="container offers">

    @if (session('created'))
    <div>
        <div class="alert alert-success" role="alert">
            {{session('created')}}
        </div>
    </div>
    @endif

    @if (session('edited'))
    <div>
        <div class="alert alert-success" role="alert">
            {{session('edited')}}
        </div>
    </div>
    @endif

    @if (session('deleted'))
    <div>
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    </div>
    @endif

    @if (Auth::user()->is_admin)

     <a class="btn btn-primary text-white mb-5" href="{{route('admin.offers.create')}}">Crea nuova offerta</a>

    @endif
    @if (Auth::user()->is_admin)

      <div class="special-table">
        <div class="limiter m-0">
            <div class="container m-0 p-0">
                <div class="wrap-table100">
                    <div class="table100">
                            <table class="my-5">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column13 text-capitalize">Tipo</th>
                                        <th class="column14">Prezzi</th>
                                        <th class="column15">Durata</th>
                                        <th class="column16">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                        <tr class="havemsg">
                                            <td >
                                                {{ $offer->offer_type }}
                                            </td>
                                            <td>
                                                <span>
                                                    &euro; {{ $offer->price }}
                                                </span>
                                            </td>
                                            <td>
                                                <span>
                                                    {{ $offer->duration }} Ore
                                                </span>
                                            </td>

                                            <td class="del-btn d-flex">
                                                <div class="edit">
                                                    <a class="bn632-hover bn26 edit-btn m-0" href="{{route('admin.offers.edit', $offer)}}" title="edit">Modifica</a>
                                                </div>
                                                <div class="delete-form">
                                                    @include('admin.offers.partials.delete-form')
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <ul class="list-group">
                                <li class="list-group-item custom-head">Offerte disponibili</li>
                                @foreach ($offers as $offer)
                                    <li class="list-group-item"><strong>Offerta n°: </strong> {{$loop->iteration}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Tipo: </strong> {{$offer->offer_type}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Prezzo: </strong> &euro; {{$offer->price}}</li>
                                    <li class="list-group-item text-capitalize"><strong>Durata: </strong> {{$offer->duration}} Ore</li>

                                    <li class="list-group-item custom-last mb-2 d-flex">
                                        <div class="show-msg pe-2">
                                            <a class="bn632-hover bn26 edit-btn" href="{{route('admin.offers.edit', $offer)}}">
                                                Modifica
                                            </a>
                                        </div>
                                        <div class="delete-form">
                                            <form class="d-inline"
                                            onsubmit="return confirm('Confermi l\'eliminazione di {{$offer->offer_type}} ?')"
                                            action="{{route('admin.offers.destroy', $offer)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="bn632-hover bn26 delete-sm-btn" title="delete">Elimina</button>
                                            </form>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

    <section class="pricing-section mt-5 me-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8 mb-5">
                    <div class="section-title title-ex1">
                        @if (Session::has('message'))
                                <div>
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                </div>
                        @endif
                            <h2 class="mt-2">Scegli il tuo piano</h2>
                            <p>Attivando una promo il tuo profilo verrà inserito tra i medici in evidenza per un tempo corrispondente a quello indicato.</p>
                    </div>
                </div>
                 @if (count($active_offers)>0)
                <div class="col-xl-5 col-lg-5 col-md-4 mb-5 offset-1 my-promos mx-0 align-self-end price-card">
                     <h6 class="blue">Le tue promo attive:</h6>
                     <p class="grey">Finchè avrai delle promo in corso non potrai acquistarne altre</p>
                        <ul class="activePromos">
                            @foreach ($active_offers as $offer)
                                <li>
                                <span class="offerName">
                                 {{$offer->offer_type}}
                                 </span>
                                    - Scade il giorno
                                <span class="time">{{implode("/", array_reverse(explode("/", substr(str_replace("-", "/", $offer->pivot->end_at),0,10))))}}</span><br>
                                alle ore <span class="time">{{substr($offer->pivot->end_at,11,-3)}}</span></li>

                            @endforeach
                        </ul>
                </div>
                @endif
            </div>
         </div>
    </div>
                <!-- Pricing Table starts -->
    <div class="row px-3">
     @foreach ($offers as $offer)
        <div class="col-md-4 my-3">
            <div class="price-card">
                <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                <p>Durata <strong style="color:#3782e8">{{$offer->duration}} Ore</strong>  </p>
                <p class="price"><span style="color:#3782e8;font-size:26px;font-weight:600">&euro; {{$offer->price}}</span></p>

                @if (count($active_offers)<= 0)
                <a type="button" href="{{route('admin.payment.create', $offer)}}" class="bn632-hover bn26">Acquista ora</a>
                @endif

                @if (count($active_offers)>0)
                    <button href="{{route('admin.payment.create', $offer)}}" class="bn632-hover bn26 close-btn px-1" disabled>Acquista ora</button>
                @endif
            </div>
        </div>
     @endforeach
    </div>
        </div>
 </section>

 @endif



</div>

</div>

</div>

</div>



</div>


@endsection
{{--
@section('scripts')

    <script>
        function changeDateFormat(date) {
                let new_date = date.substring(0, 10).split("-").reverse().slice().join("/");
                return new_date
            }

            const promoDate = "<?php echo json_encode($offer->pivot->end_at); ?>"
            let putDates = document.querySelectorAll('.time')


            for (let i = 0; i < docReviews.length; i++) {
                let putDates = document.querySelectorAll('.time')
                putDates[i].innerHTML = changeDateFormat(promoDate[i])
            }
    </script>
@endsection --}}
