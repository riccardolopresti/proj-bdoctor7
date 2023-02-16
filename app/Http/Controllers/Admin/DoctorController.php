<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Offer;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Spec;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $currentDoctor=Doctor::where('user_id', Auth::user()->id)->first();
        // $users=User::with('doctors')->get();
        $users=User::with('doctors')->get();
        $doctors=Doctor::all();

        // dd($users);
        return view('admin.doctors.index', compact( 'users', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations=Spec::all();
        // $messages=Message::all();
        // $offers=Offer::all();
        // $ratings=Rating::all();
        // $reviews=Review::all();
        return view('admin.doctors.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $form_data['slug']=Doctor::generateSlug(Auth::user()->name, $form_data['surname'], $form_data['specs']);
        $form_data['user_id']=Auth::user()->id;

        if(array_key_exists('image',$form_data)){

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            $form_data['image'] = Storage::put('profile-pics', $form_data['image']);
        }else{
            $form_data['image']='https://ui-avatars.com/api/?name='.Auth::user()->name.'+'.$form_data['surname'].'&background=random&rounded=true';
        }
        if(array_key_exists('cv',$form_data)){

            $form_data['cv'] = $request->file('cv')->getClientOriginalName();

            $form_data['cv'] = Storage::put('uploads', $form_data['cv']);
        }
        $new_doctor = Doctor::create($form_data);

        $new_doctor->specs()->attach($form_data['specs']);
        return redirect()->route('admin.doctors.show', $new_doctor)->with('message', 'Nuovo profilo dottore creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specializations=Spec::all();
        $messages=$doctor->messages()->get();
        $reviews=$doctor->reviews()->get();
        $ratings=$doctor->ratings()->get();
        return view('admin.doctors.edit', compact('doctor','specializations','messages','reviews', 'ratings'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $form_data=$request->all();
        if($form_data['surname'] != $doctor->surname || $form_data['specs'] != $doctor->specs){
            $doctor['slug']=Doctor::generateSlug(Auth::user()->name, $form_data['surname'], $form_data['specs']);
        }else{$form_data['slug']=$doctor->slug ;}
        $doctor->update($form_data);

        return redirect()->route('admin.doctors.show', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index');
    }
}
