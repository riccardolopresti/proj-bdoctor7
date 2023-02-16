<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            "offer_type" => "required|min:3|max:30",
            "price" => "required|numeric|min:0.01|max:99.99",
            "duration" => "required|integer|min:1|max:400",
        ];
    }
}
