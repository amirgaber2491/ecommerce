<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'siteName_ar'=>'required',
            'siteName_en'=>'required',
            'email'=>'required | email',
            'logo'=>'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
            'icon'=>'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
            'main_lang'=>'required | in:ar,en',
            'status'=>'required | in:open,close',
        ];
    }
    public function messages()
    {
        return [
            'required'=> trans('admin.validation.setting.siteName.required'),
            'email.required'=> trans('admin.validation.email.required'),
            'email.email'=> trans('admin.validation.email.email'),
            'logo.required'=> trans('admin.validation.setting.logo.required'),
            'icon.required'=>trans('admin.validation.setting.icon.required'),
            'main_lang.required'=> trans('admin.validation.setting.main_lang.required'),
            'desc.required'=> trans('admin.validation.setting.desc.required'),
            'keywords.required'=> trans('admin.validation.setting.keywords.required'),
            'status.required'=> trans('admin.validation.status.keywords.required'),
            'message_siteSetting.required'=> trans('admin.validation.status.message_siteSetting.required'),
            'image'=>trans('admin.validation.image'),
            'mimes'=> trans('admin.validation.mimes'),
            'logo.max'=> trans('admin.validation.image.max'),
            'icon.max'=> trans('admin.validation.image.max')
        ];
    }


}
