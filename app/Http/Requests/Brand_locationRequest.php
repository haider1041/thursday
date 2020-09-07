<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Brand_locationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [


            'longitude' => 'required|numeric|min:5',
            'latitude' => 'required|numeric|min:3',


        ];
    }
}
