<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                function ($attribute, $value, $fail) {
                    if (strpos($value, '..') !== false) {
                        $fail('Email cannot contain consecutive dots.');
                    }
                    if (preg_match('/\.[a-zA-Z]{2,6}\.[a-zA-Z]{2,6}/', $value)) {
                        $fail('Email cannot have multiple domain extensions.');
                    }
                    if (str_starts_with($value, '.') || str_ends_with($value, '.')) {
                        $fail('Email cannot start or end with a dot.');
                    }
                    $disposableDomains = ['10minutemail.com', 'tempmail.org', 'guerrillamail.com'];
                    $domain = substr(strrchr($value, "@"), 1);
                    if (in_array(strtolower($domain), $disposableDomains)) {
                        $fail('Disposable email addresses are not allowed.');
                    }
                }
            ],
            'password' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.'
        ];
    }
}