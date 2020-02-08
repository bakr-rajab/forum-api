<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'string'
            ],
        ];
    }

    /**
     * Custom message for validation
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => __('Email is required field'),
            'email.email' => __('Email invalidate'),
            'password.required' => __('Password is required field'),
        ];
    }
}
