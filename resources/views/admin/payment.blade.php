@extends('layouts.app')

@section('content')

<div class="container payment">
    <h2 class="mt-5">Riepilogo pagamento</h2>
    <div class="row">

    <form id="payment-form" method="post" action="{{ route('admin.payment.store', $offer) }}">
            @csrf
        <div class="col-md-4 my-3 position-relative p-0">
            <div class="price-card">
                <h2 class="text-capitalize">{{$offer->offer_type}}</h2>
                <p>Durata <strong style="color:#3782e8">{{$offer->duration}} Ore</strong>  </p>
                <p class="price" ><span>&euro; {{$offer->price}}</span></p>

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

@endsection

@section('scripts')
    <script>
        const form = document.querySelector('#payment-form');
        let client_token = "{{ $clientToken }}";
        braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
        }, function (createErr, instance) {
        const submitButton = document.querySelector('#submit-button');
            submitButton.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    document.querySelector('#amount').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
