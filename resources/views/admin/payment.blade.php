@extends('layouts.app')

@section('title')
 | Pagamento
@endsection

@section('content')

<div class="container payment">
    <h2 class="mt-5">Riepilogo pagamento</h2>

    <form id="payment-form" method="post" action="{{ route('admin.payment.store', $offer) }}" class="row">
        @csrf
        <div class="col-md-6 position-relative p-0">
            <div class="price-card">
                <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;">{{$offer->duration}} Ore</strong>  </h6>
                <p class="price" ><span>&euro; {{$offer->price}}</span></p>

                <div id="dropin-container"></div>
            </div>
        </div>
        <div class="col-md-6">
            <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"
             data-braintree-dropin-authorization="{{ $clientToken }}"
             {{-- data-paypal.flow="checkout"
             data-paypal.currency="EUR"
             data-paypal-credit.flow="vault" --}}
            ></script>
            <div id="checkout-message"></div>

            <button id="submit-button" class="bn632-hover bn26">Paga adesso</button>
        </div>

        <input type="hidden" class="form-control" name="amount" id="amount" value="{{$offer->price}}">
        <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>


    </form>

</div>
<style>
    .price-card{
        top: 33px;
        height:300px;
    }

    .price-card h2{
        color:#061761;
    }
</style>

@endsection

@section('scripts')
    <script>
        const form = document.querySelector('#payment-form');
        const container = document.getElementById('dropin-container');
        let client_token = "{{ $clientToken }}";
        const submitButton = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: client_token,
            selector: '#dropin-container',
            venmo: {}, paypal: {flow: 'vault'}, paypalCredit: {flow: 'vault'},
            }, function (err, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                });
            })
            });
    </script>
@endsection
