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
     * @return array
     */
    public function rules()
    {
        return [
            'photo'         => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'firstName_en'  => 'required|max:100|unique:offers,firstName_en',
            'lastName_en'   => 'required|max:100|unique:offers,lastName_en',
            'firstName_ar'  => 'required|max:100|unique:offers,firstName_ar',
            'lastName_ar'   => 'required|max:100|unique:offers,lastName_ar',
            'password'      => 'required|max:100|unique:offers,password',
            'email'         => 'required|max:100|unique:offers,email',
            'address'       => 'required|max:100',
            'city'          => 'required|max:100',
            'country'       => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'firstName_en.required'=> trans('messages.offer firstName_en required'),
            'firstName_en.unique'  => trans('messages.offer firstName_en unique'),
            'firstName_ar.required'=> trans('messages.offer firstName_ar required'),
            'firstName_ar.unique' => trans('messages.offer firstName_ar unique'),
            'lastName.required'   => trans('messages.offer lastName required'),
            'lastName.unique'     => trans('messages.offer lastName unique'),
            'lastName_ar.required'=> trans('messages.offer lastName required'),
            'lastName_ar.unique'  => trans('messages.offer lastName unique'),
            'password.required'   => trans('messages.offer password required'),
            'email.required'      => trans('messages.email required'),
            'email.unique'        => trans('messages.email unique'),
            'address.required'    => trans('messages.address required'),
            'address.unique'      => trans('messages.address unique'),
            'city.required'       => trans('messages.city required'),
            'city.unique'         => trans('messages.city unique'),
            'country.required'    => trans('messages.country required'),
            'country.unique'      => trans('messages.country unique'),
        ];
    }
}
