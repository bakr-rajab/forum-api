<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'required',
                'string'
            ],
        ];
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => __('Email is required field'),
            'email.email' => __('Email invalidate'),
            'password.required' => __('Password is required field'),
            'name.required' => __('The first name is required field'),
        ];
    }
}
