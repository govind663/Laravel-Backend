<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rule = [
            'name' => [
               'required',
               'string',
               'max:255',
            ],
            'role_id' => [
                'integer',
                'required',
            ],
            'email' => [
                'required',
                'email',
                'regex:/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/i',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'max:16',
                'alpha_dash',
                'no_special_characters',
                'no_sequential_characters',
                'must_contain_lowercase',
                'must_contain_uppercase',
                'must_contain_numeric',
            ],
            'password_confirmation' => [
               'required',
               'same:password',
            ],
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('Username is required'),
            'name.string' => __('Name should be a string'),
            'name.max:255' => __('Name should not exceed 255 characters'),

            'role_id.required' => __('Role is required'),
            'role_id.integer' => __('Role should be an integer'),

            'email.required' => __('Email Id is required'),
            'email.email' => __('Please enter a valid Email address'),
            'email.regex' => __('Invalid Email format'),

            'password.required' => __('Password is required'),
            'password.confirmed' => __('Password and Confirm Password do not match'),
            'password.min:8'  => __('Minimum length of password should be 8 characters'),
            'password.max:16' => __('Maximum length of password should be 16 characters'),
            'password.alpha_dash' => __('Password should only contain alphabets, numbers, underscores, and dashes'),
            'password.no_special_characters' => __('Password should not contain any special characters'),
            'password.no_sequential_characters' => __('Password should not contain any consecutive alphabets, numbers, or special characters'),
            'password.must_contain_lowercase' => __('Password should contain at least one lowercase letter'),
            'password.must_contain_uppercase' => __('Password should contain at least one uppercase letter'),
            'password.must_contain_numeric' => __('Password should contain at least one numeric digit'),

            'password_confirmation.required' => __('Confirm Password is required'),
            'password_confirmation.same' => __('Password and Confirm Password do not match'),
        ];
    }
}
