@extends('layouts.app')

@section('content')
PAGINA DI PAGAMENTO
<div class="container">
    <h1>Pagamento</h1>
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

    <form id="payment-form" method="post" action="{{ route('admin.payment.store') }}">
        @csrf
        <div id="dropin-container"></div>

        <label for="amount">Importo</label>

        <input type="text" class="form-control" name="amount" id="amount" value="10.00">
        <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>

        <button id="submit-button" class="btn btn-primary">Paga adesso</button>

    </form>
</div>
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
