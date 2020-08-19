<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCountryRequest extends FormRequest
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
            'countryName_ar'=>'required | unique:countries,countryName_ar,' . $this->country,
            'countryName_en'=>'required | unique:countries,countryName_ar,' . $this->country,
            'mob'=>'required | unique:countries,mob,' . $this->country,
            'code'=>'required | unique:countries,code,' . $this->country,
            'logo'=>'image | mimes:jpeg,png,jpg,gif,svg | max:2048'
        ];
    }
    public function messages()
    {
        return [

            'required'=>trans('admin.validation.required'),
            'countryName_ar.unique'=>trans('admin.validation.countryName.unique'),
            'countryName_en.unique'=>trans('admin.validation.countryName.unique'),
            'code.unique'=>trans('admin.validation.code.unique'),
            'mob.unique'=>trans('admin.validation.mob.unique'),
            'image'=>trans('admin.validation.image'),
            'mimes'=> trans('admin.validation.mimes'),
            'logo.max'=> trans('admin.validation.image.max'),
        ];
    }
}
