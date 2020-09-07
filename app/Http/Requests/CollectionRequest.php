<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
            'user_id' => 'required|max:30|min:3',
            'weight' => 'required|numeric|max:30|min:3',
            'bin_id' => 'required|max:30|min:3',

            'date' => 'required|date',


        ];
    }
}