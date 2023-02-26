<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Offer;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Offer $offer){

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
            $clientToken = $gateway->clientToken()->generate();
            return view ('admin.payment', compact('clientToken', 'offer'));
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Offer $offer)

    {

        $doctor=Doctor::where('user_id', Auth::user()->id)->first();

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        date_default_timezone_set('Europe/Rome');
        $nowDate=date("Y-m-d H:i:s");
        $start_str = strtotime($nowDate);
        $end_str = $start_str + (($offer->duration) * 3600);
        date_default_timezone_set('Europe/Rome');
        $end_at = date("Y-m-d H:i:s", $end_str);

        $offer->doctors()->attach($doctor->id,
        ['start_at' => $nowDate,
        'end_at'=> $end_at]);


        //$nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $offer->price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // pagamento completato
            $transaction = $result->transaction;
            $transaction->status;
            return redirect()->route('admin.doctors.index')->with('message', 'Nuova sponsorizzazione creata correttamente');;

            //dd('completato');
        } else {
            // errore nel pagamento
            dd('errore');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    // public function show(Payment $payment)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    // public function edit(Payment $payment)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Payment $payment)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Payment $payment)
    // {
    //     //
    // }
}
