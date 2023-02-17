<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'surname'=>'required|min:2|max:80',
            'address'=>'required|min:5',
            'specs'=>'required',
            'phone'=>'required|min:10|max:15',
            'health_care'=>'min:5',

        ];
    }

    public function messages()
    {
        return [
            'surname.required'=>'Il cognome è un campo obbligatorio',
            'surname.min'=>'Il cognome deve contenere almeno :min caratteri',
            'surname.max'=>'Il cognome può contenere al massimo :max caratteri',
            'address.required'=>'L\'indirizzo è un campo obbligatorio',
            'specs.required'=>'La specializzazione è un campo obbligatorio',
            'address.min'=>'L\'indirizzo deve contenere almeno :min caratteri',
            'phone.required'=>'Il telefono è un campo obbligatorio',
            'phone.min'=>'Il cognome deve contenere almeno :min caratteri',
            'phone.max'=>'Il cognome può contenere al massimo :max caratteri',
            'health_care'=>'Il campo dei servizi deve contenere almeno :min caratteri',

        ];
    }
}
