@extends('layouts.app')

@section('content')

<div class="container">

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

    <section class="pricing-section mt-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-6 col-md-8 mb-5">
                    <div class="section-title text-center title-ex1">
                            <h2>Scegli il tuo piano</h2>
                            <p>Tutte le offerte comprendo la sponsorizzazione del profilo per le ore indicate nei seguenti piani.</p>
                        </div>
                    </div>
                </div>
                <!-- Pricing Table starts -->
                <div class="row">
                    @foreach ($offers as $offer)
                    <div class="col-md-4 my-3">
                        <div class="price-card">
                            <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                            <p>Durata <strong style="color:#3782e8">{{$offer->duration}} Ore</strong>  </p>
                            <p class="price"><span>&euro; {{$offer->price}}</span></p>

                            <a href="#" class="bn632-hover bn26">Acquista ora</a>
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

<style>
.pricing-section{
    padding-bottom: 200px
}
.section-title {
    position: relative;
}
.section-title h2 {
    color: #1d2025;
    position: relative;
    margin: 0;
    font-size: 24px;
}

.price-card{
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

@media (min-width: 768px) {
    .section-title h2 {
        font-size: 28px;
    }
}
@media (min-width: 992px) {
    .section-title h2 {
        font-size: 34px;
    }
}
.section-title.title-ex1 h2 {
    padding-bottom: 20px;
}
@media (min-width: 768px) {
    .section-title.title-ex1 h2 {
        padding-bottom: 30px;
    }
}
@media (min-width: 992px) {
    .section-title.title-ex1 h2 {
        padding-bottom: 40px;
    }
}
.section-title.title-ex1 h2:before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 12px;
    width: 110px;
    height: 1px;
    background-color: #d6dbe2;
}
@media (min-width: 768px) {
    .section-title.title-ex1 h2:before {
        bottom: 17px;
    }
}
@media (min-width: 992px) {
    .section-title.title-ex1 h2:before {
        bottom: 25px;
    }
}
.section-title.title-ex1 h2:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 12px;
    width: 40px;
    height: 1px;
    background-color: #3782e8;
}
@media (min-width: 768px) {
    .section-title.title-ex1 h2:after {
        bottom: 17px;
    }
}
@media (min-width: 992px) {
    .section-title.title-ex1 h2:after {
        bottom: 25px;
    }
}
.section-title.title-ex1.text-center h2:before {
    left: 50%;
    transform: translateX(-50%);
}
.section-title.title-ex1.text-center h2:after {
    left: 50%;
    transform: translateX(-50%);
}
.section-title.title-ex1.text-right h2:before {
    left: auto;
    right: 0;
}
.section-title.title-ex1.text-right h2:after {
    left: auto;
    right: 0;
}
.section-title.title-ex1 p {
    font-family: "Montserrat", sans-serif;
    color: #8b8e93;
    font-size: 14px;
    font-weight: 300;
}


.price-card {
    background: #f5f5f6;
    padding: 40px 35px;
    position: relative;
    border-radius: 2px;
    overflow: hidden;
}
.price-card:before {
    position: absolute;
    content: "";
    top: 0;
    right: -35px;
    width: 88px;
    height: 88px;
    background: #98ddfc;
    opacity: 0.2;
    border-radius: 8px;
    transform: rotate(45deg);
}
.price-card:after {
    position: absolute;
    content: "";
    top: 30px;
    right: -35px;
    width: 88px;
    height: 88px;
    background: #46b1e2;
    opacity: 0.2;
    border-radius: 8px;
    transform: rotate(45deg);
}
.price-card h2 {
    font-size: 26px;
    font-weight: 600;
}
.price-card .btn {
    font-size: 11px;
    border-radius: 100px;
    padding: 0 25px;
    border: 0;
    color: #fff;
    float: right;
}
.price-card .btn.btn-primary {
    border: 0 !important;
}
.price-card.featured {
    background: #fff;
    border: 1px solid #ebebeb;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}
.price-card:hover .btn {
    background: #0cc652;
    border-color: #0cc652;
}
p.price span {
    display: inline-block;
    padding: 45px 15px 50px;
    padding-right: 0;
    font-size: 50px;
    font-weight: 600;
    color: #3782e8;
    position: relative;
}
.pricing-offers {
    padding: 0 0 10px;
}
.pricing-offers li {
    padding: 0 0 16px;
    line-height: 18px;
}
ul li {
    list-style-type: none;
}
.btn.btn-mid {
    height: 40px;
    line-height: 40px;
    padding: 0 20px;
}
</style>

@endsection
