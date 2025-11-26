<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'last_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:users,email',
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
            'phone' => [
                'required',
                'string',
                'unique:users,phone',
                'regex:/^\+?[1-9]\d{9,14}$/',
                function ($attribute, $value, $fail) {
                    $dummyPatterns = ['0000000000', '1234567890', '1111111111', '9999999999'];
                    $cleanPhone = preg_replace('/[^\d]/', '', $value);
                    if (in_array($cleanPhone, $dummyPatterns)) {
                        $fail('Please enter a valid phone number.');
                    }
                    if (preg_match('/(\d)\1{6,}/', $cleanPhone)) {
                        $fail('Please enter a valid phone number.');
                    }
                }
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                function ($attribute, $value, $fail) {
                    $commonPasswords = ['password', '12345678', 'qwerty123', 'admin123'];
                    if (in_array(strtolower($value), $commonPasswords)) {
                        $fail('Please choose a stronger password.');
                    }
                    if (preg_match('/123456|abcdef|qwerty/i', $value)) {
                        $fail('Password cannot contain sequential characters.');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.regex' => 'First name can only contain letters and spaces.',
            'last_name.required' => 'Last name is required.',
            'last_name.regex' => 'Last name can only contain letters and spaces.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Please enter a valid phone number with country code.',
            'phone.unique' => 'This phone number is already registered.',
            'password.required' => 'Password is required.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
        ];
    }
}