<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'       => 'required|max:100|unique:profiles,name',
            'price'         => 'required|max:100|numeric|',
            'details'       => 'required|max:100',

        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'    => trans('messages.offer name_ar required'),
            'name_ar.unique'      => trans('messages.offer name_ar unique'),
            'name_en.required'    => trans('messages.offer name_en required'),
            'name_en.unique'      => trans('messages.offer name_en unique'),
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
