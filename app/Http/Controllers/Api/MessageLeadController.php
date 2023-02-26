<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageLeadController extends Controller
{
    public function store(Request $request){

        //dd($request->all());

        $data = $request->all();

        $success= true;

        $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|max:255',
                'object' => 'max:255',
                'text' => 'required|min:3'

            ],
            [
                'name.required' => 'Il Nome è un campo obbligatorio',
                'name.min' => 'Il Nome deve essere lungo almeno :min caratteri',
                'name.max' => 'Il Nome deve essere lungo al massimo :max caratteri',
                'email.required' => 'L\'email è un campo obbligatorio',
                'email.email' => 'L\'email è formattata in modo errato',
                'email.max' => 'L\'email deve essere lungo massimo :max caratteri',
                'object.min' => 'L\'oggetto deve essere lungo almeno :min caratteri',
                'object.max' => 'L\'oggetto deve essere lungo al massimo :max caratteri',
                'text.required' => 'Il messaggio è un campo obbligatorio',
                'text.min' => 'Il messaggio deve essere lungo almeno :min caratteri',
            ]
        );

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        $new_msg_lead = new Message();
        $new_msg_lead ->fill($data);
        $new_msg_lead ->save();

        return response()->json(compact('success'));
    }
}
