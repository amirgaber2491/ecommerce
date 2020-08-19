<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TriadRequest extends FormRequest
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
            'triadName_ar'=>'required',
            'triadName_en'=>'required',
            'icon'=>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg | max:2048',





        ];
    }
    public function messages()
    {
        return [
            'required'=>trans('admin.validation.required'),
            'image'=>trans('admin.validation.image'),
            'mimes'=> trans('admin.validation.mimes'),
            'icon.max'=> trans('admin.validation.image.max'),


        ];
    }
}
