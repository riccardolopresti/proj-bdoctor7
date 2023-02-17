<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors= Doctor::Orderby('id','desc')->paginate(3);
        $ratings = Rating::all();

        $user_logged =  Auth()->user()->doctors;

        return view('admin.ratings.index',compact('doctors','ratings','user_logged'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        //$form_data = $request->all();

        $form_data = $request->validate(
            [
                'name' => 'required|min:2|max:255',
            ]
        );

        $rating = Rating::create($form_data);

        $rating->doctors()->attach($form_data['doctor_id']);

        return redirect()->route('admin.ratings.index')->with('message', "Valutazione $request->rating creata correttamente!");;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect()->route('admin.ratings.index')->with('message', 'Messaggio eliminato correttamente');
    }
}
