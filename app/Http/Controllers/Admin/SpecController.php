<?php

namespace App\Http\Controllers\Admin;

use App\Models\Spec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specs = Spec::all();
        return view('admin.specs.index', compact('specs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->validate(
            [
                'type' => 'required|min:2|max:255|unique:specs'
            ]
        );

        Spec::create($form_data);

        return redirect()->back()->with('message', "Specializzazione $request->type aggiunta correttamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function show(Spec $spec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function edit(Spec $spec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spec $spec)
    {
        $form_data = $request->validate(
            [
                'type' => 'required|min:2|max:255|unique:specs'
            ]
        );

        $spec->update($form_data);

        return redirect()->back()->with('message', "Specializzazione $request->type aggiornata correttamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spec $spec)
    {
        $spec->delete();

        return redirect()->back()->with('message', "Specializzazione $spec->type eliminata correttamente!");

    }
}
