<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
            'name'=>'required | string | min:3 | max:255',
            'email'=>'required | string | max:255 | email | unique:admins,email,' . $this->admin,
            'password'=>'nullable | string | min:6 |max:255 | confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> trans('admin.validation.admin.name.required'),
            'name.string'=>trans('admin.validation.admin.name.string'),
            'name.min'=>trans('admin.validation.admin.name.min'),
            'name.max'=>trans('admin.validation.admin.name.max'),

            'email.required'=> trans('admin.validation.email.required'),
            'email.string'=>trans('admin.validation.email.string'),
            'email.max'=>trans('admin.validation.email.max'),
            'email.email'=>trans('admin.validation.email.email'),
            'email.unique'=>trans('admin.validation.email.unique'),

            'password.required'=> trans('admin.validation.password.required'),
            'password.string'=>trans('admin.validation.password.string'),
            'password.min'=>trans('admin.validation.password.min'),
            'password.max'=>trans('admin.validation.password.max'),
            'password.confirmed'=>trans('admin.validation.password.confirmed'),


        ];
    }
}
