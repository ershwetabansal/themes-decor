<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class PartyStoreRequest extends FormRequest
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
            'name'  => 'required',
            'type'  => 'required|exists:services,name',
            'other' => 'required_if:type,Other',
            'address' => '',
            'email' => '',
            'phone' => '',
            'date' => 'required|date',


        ];
    }
}
