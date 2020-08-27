<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MallRequest extends FormRequest
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
            'name_ar'=>'required',
            'name_en'=>'required',
            'email'=>'sometimes|nullable|email',
            'mobile'=>'sometimes|nullable|numeric',
            'facebook'=>'sometimes|nullable|url',
            'twitter'=>'sometimes|nullable|url',
            'website'=>'sometimes|nullable|url',
            'contact_name'=>'sometimes|nullable',
            'address'=>'sometimes|nullable|string',
            'lat'=>'sometimes|nullable',
            'lang'=>'sometimes|nullable',
            'icon'=>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg | max:2048',
            'country_id'=>'required'




        ];
    }
    public function messages()
    {
        return [
            'required'=>trans('admin.validation.required'),
            'image'=>trans('admin.validation.image'),
            'mimes'=> trans('admin.validation.mimes'),
            'icon.max'=> trans('admin.validation.image.max'),
            'url'=> trans('admin.validation.url'),
            'email'=> trans('admin.validation.email'),



        ];
    }
}
