<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewCityRequest extends FormRequest
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
            'cityName_ar'=>'required | unique:cities',
            'cityName_en'=>'required | unique:cities',
            'country_id'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'required'=>trans('admin.validation.required'),
            'countryName_ar.unique'=>trans('admin.validation.CityName.unique'),
            'countryName_en.unique'=>trans('admin.validation.CityName.unique'),


        ];
    }
}
