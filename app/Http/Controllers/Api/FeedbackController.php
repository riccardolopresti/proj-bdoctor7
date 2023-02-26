<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function store(Request $request){

        //dd($request->all());

        $data = $request->all();

        $success= true;

        if($request->text){
            $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:255',
                'text' => 'required|min:3',
            ],
            [
                'name.required' => 'Il Nome è un campo obbligatorio',
                'name.min' => 'Il Nome deve essere lungo almeno :min caratteri',
                'name.max' => 'Il Nome deve essere lungo al massimo :max caratteri',
                'text.required' => 'Il messaggio è un campo obbligatorio',
                'text.min' => 'Il messaggio deve essere lungo almeno :min caratteri',
            ]
        );
        }else if($request->rating){
            $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:255',
                'rating' => 'required'
            ],
            [
                'name.required' => 'Il Nome è un campo obbligatorio',
                'name.min' => 'Il Nome deve essere lungo almeno :min caratteri',
                'name.max' => 'Il Nome deve essere lungo al massimo :max caratteri',
                'rating.required' => 'La valutazione è un campo obbligatorio',
            ]
        );
        }else{
            $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:255',
                'text' => 'required|min:3',
                'rating' => 'required'
            ],
            [
                'name.required' => 'Il Nome è un campo obbligatorio',
                'name.min' => 'Il Nome deve essere lungo almeno :min caratteri',
                'name.max' => 'Il Nome deve essere lungo al massimo :max caratteri',
                'text.required' => 'Il messaggio è un campo obbligatorio',
                'text.min' => 'Il messaggio deve essere lungo almeno :min caratteri',
                'rating.required' => 'La valutazione è un campo obbligatorio'
            ]
        );
        }

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        if($request->text){
            $review = Review::create([
                'name' => $request->name,
                'text' => $request->text,
                'doctor_id' => $request->doctor_id,
            ]);
        }

        if($request->rating){
            $rating = Rating::create([
                'name' => $request->name,
                'rating' => $request->rating,
            ]);

            $rating->doctors()->attach($request->doctor_id);

        }

        return response()->json(compact('success'));
    }
}
