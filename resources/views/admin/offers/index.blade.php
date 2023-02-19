@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="m-3">OFFERTE DISPONIBILI</h1>

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

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Durata</th>
            @if (Auth::user()->is_admin)
            <th scope="col">Azioni</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                   <th scope="row">{{$offer->id}}</th>
                   <td>{{$offer->offer_type}}</td>
                   <td>&euro; {{$offer->price}}</td>
                   <td>{{$offer->duration}} ore</td>
                    @if (Auth::user()->is_admin)
                   <td>
                    <a class="btn btn-warning " href="{{route('admin.offers.edit', $offer)}}" title="edit">Edit</a>
                    <form class="d-inline"
                    onsubmit="return confirm('Confermi l\'eliminazione di {{$offer->offer_type}} ?')"
                    action="{{route('admin.offers.destroy', $offer)}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button type="submit" class="btn btn-danger " title="delete">Delete</button>
                    </form>
                   </td>
                   @endif
                </tr>

            @endforeach

        </tbody>
      </table>

    {{-- <section class="pricing-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section-title text-center title-ex1">
                            <h1>Scegli il tuo piano</h1>
                            <p>Tutte le offerte comprendo la sponsorizzazione del profilo per le ore indicate nei seguenti piani.</p>
                        </div>
                    </div>
                </div>
                <!-- Pricing Table starts -->
                <div class="row">
                    @foreach ($offers as $offer)
                    <div class="col-md-4">
                        <div class="price-card ">
                            <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                            <p>The standard version</p>
                            <p class="price"><span>&euro; {{$offer->price}}</span>/ {{$offer->duration}} h</p>

                            <a href="#" class="btn btn-primary btn-mid">Buy Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>

</div>

<style>
.section-title {
    position: relative;
}
.section-title h2 {
    color: #1d2025;
    position: relative;
    margin: 0;
    font-size: 24px;
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
    background-color: #0cc652;
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
    background: #0cc652;
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
    background: #0cc652;
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
    color: #0cc652;
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
} --}}
</style>

@endsection
