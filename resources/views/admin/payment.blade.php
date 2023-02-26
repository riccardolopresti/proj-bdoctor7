@extends('layouts.app')

@section('content')

<div class="container payment">
    <h2 class="mt-5">Riepilogo pagamento</h2>
    <div class="row">




    <form id="payment-form" method="post" action="{{ route('admin.payment.store', $offer) }}">
        @csrf
        <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"
             data-braintree-dropin-authorization="{{ $clientToken }}"
             data-paypal.flow="checkout"
             data-paypal.currency="EUR"
             data-paypal-credit.flow="vault"
            ></script>

        <div class="col-md-4 my-3 position-relative p-0">
            <div class="price-card">
                <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                <p>Durata <strong style="color:#3782e8">{{$offer->duration}} Ore</strong>  </p>
                <p class="price" ><span>&euro; {{$offer->price}}</span></p>

                <div id="dropin-container"></div>
            </div>
        </div>
        {{-- <div class="form-group col-md-4" id="dropin-container">
            <label for="card-number">Card Number</label>
            <input type="" class="form-control" id="card-number" placeholder="Card Number">

            <label for="security-code-field">CVV</label>
            <input type="" class="form-control" id="security-code-field" placeholder="CVV">

            <label for="expiration-date">Expiration Date</label>
            <input type="" class="form-control" id="expiration-date" placeholder="Expiration Date">

        </div> --}}

            <div id="checkout-message"></div>

            <button id="submit-button" class="bn632-hover bn26">Paga adesso</button>



        {{-- <label for="amount">Importo</label> --}}
        <input type="hidden" class="form-control" name="amount" id="amount" value="{{$offer->price}}">
        <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>


    </form>

    </div>





</div>


@endsection

@section('scripts')
    <script>
    <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.js"></script>


        const form = document.querySelector('#payment-form');
        const container = document.getElementById('dropin-container');
        let client_token = "{{ $clientToken }}";
        const submitButton = document.querySelector('#submit-button');

        // braintree.dropin.create({
        //         authorization: client_token,
        //         selector: '#dropin-container'
        //     }, function (createErr, instance) {
        //         submitButton.addEventListener('click', function () {
        //             instance.requestPaymentMethod(function (err, payload) {
        //                 if (err) {
        //                     console.log('Request Payment Method Error', err);
        //                     return;
        //                 }
        //                 document.querySelector('#amount').value = payload.nonce;
        //                 form.submit();
        //             });
        //             });
                    // });

        braintree.dropin.create({
            authorization: client_token,
            selector: '#dropin-container',
            venmo: {}, paypal: {flow: 'vault'}, paypalCredit: {flow: 'vault'},
            }, function (err, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                // Submit payload.nonce to your server
                });
            })
            });

        // $(document).ready(function() {
        //     braintree.dropin
        //         .create({
        //         // Step three: get client token from your server, such as via
        //         //    templates or async http request
        //         authorization: client_token,
        //         container: container,
        //         venmo: {}, paypal: {flow: 'vault'}, paypalCredit: {flow: 'vault'},

        //         })
        //         .then((dropinInstance) => {
        //             console.log("entrati in dropinstance");
        //         form.addEventListener("submit", (event) => {
        //             event.preventDefault();
        //             console.log("cliccato dentro drop instance");

        //             dropinInstance
        //             .requestPaymentMethod()
        //             .then((payload) => {
        //                 console.log("DENTRO METODO PAYMENT");

        //                 document.querySelector('#amount').value = payload.nonce;
        //                 form.submit();
        //             })
        //             .catch((error) => {
        //                 console.log(error);;
        //             });
        //         });
        //         // Use dropinInstance here
        //         // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        //         })
        //         .catch((error) => {
        //         console.log(error);
        //         });
        // });

    </script>
@endsection
