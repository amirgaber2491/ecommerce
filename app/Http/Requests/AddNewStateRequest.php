<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewStateRequest extends FormRequest
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
            'stateName_ar'=>'required',
            'stateName_en'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'required'=>trans('admin.validation.required'),

        ];
    }
}
