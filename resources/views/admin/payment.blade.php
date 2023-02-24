@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="blue">Riepilogo pagamento</h1>
    <div class="row">

    <form id="payment-form" method="post" action="{{ route('admin.payment.store', $offer) }}">
            @csrf
        <div class="col-md-4 my-3 position-relative p-0">
            <div class="price-card">
                <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                <p>Durata <strong style="color:#3782e8">{{$offer->duration}} Ore</strong>  </p>
                <p class="price"><span>&euro; {{$offer->price}}</span></p>

            </div>
        </div>
        <div id="dropin-container"></div>

        {{-- <label for="amount">Importo</label> --}}
        <input type="hidden" class="form-control" name="amount" id="amount" value="{{$offer->price}}">
        <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>

        <button id="submit-button" class="bn632-hover bn26">Paga adesso</button>

    </div>




    </form>
</div>
<style>
    .col-md-4.my-3{
        overflow: hidden;
    }
    .price-card{
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    background: #f5f5f6;
    padding: 40px 35px;
    overflow: hidden;

    }
    h2 {
    padding-bottom: 20px;
    }

    h2:before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 12px;
    width: 110px;
    height: 1px;
    background-color: #d6dbe2;
    }

    h2:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 12px;
    width: 40px;
    height: 1px;
    background-color: #3782e8;
    }

    h2:before {
    left: 50%;
    transform: translateX(-50%);
    }

    h2:after {
    left: 50%;
    transform: translateX(-50%);
    }
    h2:before {
    left: auto;
    right: 0;
    }

    h2:after {
    left: auto;
    right: 0;
    }
    p {
    font-family: "Montserrat", sans-serif;
    color: #8b8e93;
    font-size: 14px;
    font-weight: 300;
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
    p.price span {
    display: inline-block;
    padding: 45px 15px 50px;
    padding-right: 0;
    font-size: 50px;
    font-weight: 600;
    color: #3782e8;
    position: relative;
}


</style>
@endsection

@section('scripts')
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $clientToken }}";
        braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
        }, function (createErr, instance) {
            var submitButton = document.querySelector('#submit-button');
            submitButton.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Aggiungi il nonce alla form e invia il pagamento
                    document.querySelector('#amount').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
