<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' =>['required'],
            'password' => ['required', 'min:8'],
            'cpassword' => ['required' ,'same:password'],
        ];

        //unique:users Sauf un email pas de redondance
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A Name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'phone is required',
            'password.required' => 'Password is required',
            'cpassword.required' => 'CPassword is required',
        ];
    }
}
