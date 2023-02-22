<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Offer;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Spec;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    {   $user=Auth::user();
        $all_users = User::join('doctors','users.id','=','doctors.user_id')->get();
        $users=User::all();
        $doctors=Doctor::all();
        $doctor=Doctor::where('user_id', Auth::user()->id)->first();
        $all_ratings= Rating::join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
        ->get();
        $doc_ratings= Rating::join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
                                    ->where('doctor_id', $doctor->id)
                                    ->groupBy('doctor_id')
                                    ->avg('rating');
        $doc_messages= Message::where('doctor_id', $doctor->id)->get();
        $doc_reviews= Review::where('doctor_id', $doctor->id)->orderBy('created_at', 'desc')->get();

        // dd($doc_reviews);
        return view('admin.doctors.index', compact( 'doctors', 'doctor', 'all_users', 'users', 'user','doc_ratings', 'doc_messages', 'doc_reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $user=Auth::user();
        $specializations=Spec::all();
        // $messages=Message::all();
        // $offers=Offer::all();
        // $ratings=Rating::all();
        // $reviews=Review::all();
        return view('admin.doctors.create', compact('specializations','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $form_data = $request->all();
        // dd($form_data);
        $form_data['slug']=Doctor::generateSlug(Auth::user()->name, $form_data['surname']);
        $form_data['user_id']=Auth::user()->id;

        if(array_key_exists('image',$form_data)){
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('profile-pics', $form_data['image']);
        }else{
            $form_data['image']='https://ui-avatars.com/api/?name='.Auth::user()->name.'+'.$form_data['surname'].'&background=random';
        }
        if(array_key_exists('cv',$form_data)){
            $form_data['cv_original_name'] = $request->file('cv')->getClientOriginalName();
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

        $user=User::where('id', $doctor->user_id)->first();
        $all_ratings= Rating::join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
        ->get();
        $doc_ratings= $all_ratings
                                    ->where('doctor_id', $doctor->id)
                                    ->groupBy('doctor_id')
                                    ->avg('rating');
        $doc_messages= Message::where('doctor_id', $doctor->id)->get();
        $doc_reviews= Review::where('doctor_id', $doctor->id)->get();

        return view('admin.doctors.show', compact('doctor', 'user','doc_ratings', 'doc_messages', 'doc_reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $user=User::where('id', $doctor->user_id)->first();
        $specializations=Spec::all();
        $messages=$doctor->messages()->get();
        $reviews=$doctor->reviews()->get();
        $ratings=$doctor->ratings()->get();
        return view('admin.doctors.edit', compact('doctor','specializations','messages','reviews', 'ratings', 'user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $form_data=$request->all();
        if($form_data['surname'] != $doctor->surname){
            $doctor['slug']=Doctor::generateSlug(Auth::user()->name, $form_data['surname']);
        }else{$form_data['slug']=$doctor->slug ;}
        if(array_key_exists('image',$form_data)){
            if($doctor->image){
                Storage::disk('public')->delete($doctor->image);
            }
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('profile-pics', $form_data['image']);
        }
        if(array_key_exists('cv',$form_data)){
            if($doctor->cv){
                Storage::disk('public')->delete($doctor->cv);
            }
            $form_data['cv_original_name'] = $request->file('cv')->getClientOriginalName();
            $form_data['cv'] = Storage::put('uploads', $form_data['cv']);
        }

        $doctor->update($form_data);
        if(array_key_exists('specs',$form_data)){
            $doctor->specs()->sync($form_data['specs']);
        }else{
            $doctor->specs()->detach();
        }


        // dd($doctor->specs);
        return redirect()->route('admin.doctors.index');
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
        $specializations=Spec::all();
        // $messages=Message::all();
        // $offers=Offer::all();
        // $ratings=Rating::all();
        // $reviews=Review::all();

        return redirect()->route('admin.doctors.create', compact('specializations'));
    }
}
