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
            'type'  => 'required|exists:services,id',
            'other' => 'required_if:type,Other',
            'address' => 'min:5',
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email',
            'date' => 'required|date|after:today',


        ];
    }

    public function messages()
    {
        return [
            'email.required_without' => 'Either e-mail address or phone number is required.',
            'phone.required_without' => 'Either e-mail address or phone number is required.',
        ];
    }
}
