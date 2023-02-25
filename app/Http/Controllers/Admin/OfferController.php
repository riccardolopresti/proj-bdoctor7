<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Doctor;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Europe/Rome');
        $now=date("Y-m-d H:i:s");
        $doctor=Doctor::where('user_id', Auth::user()->id)->first();
        $active_offers=$doctor->offers()->where('doctor_id', $doctor->id)->where('end_at','>',$now)->get();
        $offers = Offer::all();


        return view('admin.offers.index', compact('offers', 'now', 'doctor','active_offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $form_data = $request->all();
        $new_offer = new Offer();
        $new_offer->fill($form_data);
        $new_offer->save();

        return redirect()->route('admin.offers.index')->with('message', "Nuova promo $new_offer->offer_type creata correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('admin.payment.create', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        $form_data = $request->all();

        $offer->update($form_data);

        return redirect()->route('admin.offers.index')->with('edited', "L'offerta $offer->offer_type è stata modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('admin.offers.index')->with('deleted', "L'offerta $offer->offer_type è stata eliminata correttamente");
    }
}
