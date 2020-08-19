<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCityRequest extends FormRequest
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
            'cityName_ar'=>'required | unique:cities,cityName_ar,' . $this->city,
            'cityName_en'=>'required | unique:cities,cityName_en,' . $this->city,
            'country_id'=>'required'
        ];
    }
    public function messages()
    {
        return [

            'required'=>trans('admin.validation.required'),
            'cityName_ar.unique'=>trans('admin.validation.cityName.unique'),
            'cityName_en.unique'=>trans('admin.validation.cityName.unique'),
        ];
    }
}
