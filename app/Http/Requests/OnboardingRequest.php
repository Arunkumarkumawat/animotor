<?php

namespace App\Http\Requests;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OnboardingRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('owner');
    }

    public function rules()
    {
        $step = $this->input('step', 1);
        $baseRules = ['step' => 'required|integer|min:1|max:6'];

        switch ($step) {
            case 1:
                return array_merge($baseRules, [
                    'legal_company_name' => [
                        'required',
                        'string',
                        'min:2',
                        'max:100',
                        'regex:/^[a-zA-Z0-9\s\-\.\&\(\)]+$/',
                        Rule::unique('companies', 'name')->ignore($this->user()->company_id ?? null)
                    ],
                    'trading_name' => [
                        'nullable',
                        'string',
                        'min:2',
                        'max:100',
                        'regex:/^[a-zA-Z0-9\s\-\.\&\(\)]+$/',
                        function ($attribute, $value, $fail) {
                            if ($value && Company::where('trading_name', $value)->where('id', '!=', $this->user()->company_id ?? 0)->exists()) {
                                $fail('This trading name is already taken.');
                            }
                        }
                    ],
                    'registration_number' => [
                        'required',
                        'string',
                        'min:6',
                        'max:12',
                        'regex:/^[A-Z0-9]+$/',
                        Rule::unique('companies', 'registration_no')->ignore($this->user()->company_id ?? null)
                    ],
                    'jurisdiction' => 'required|exists:countries,id',
                    'incorporation_date' => [
                        'required',
                        'date',
                        'before:today',
                    ],
                    'company_type' => 'required|in:ltd,llc,plc,sole_trader,franchise,operator_chauffeur,other',
                    'business_email' => [
                        'required',
                        'email:rfc,dns',
                        'max:255',
                        'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                        Rule::unique('companies', 'business_email')->ignore($this->user()->company_id ?? null),
                        function ($attribute, $value, $fail) {
                            if (strpos($value, '..') !== false) {
                                $fail('Email cannot contain consecutive dots.');
                            }
                            $disposableDomains = ['10minutemail.com', 'tempmail.org', 'guerrillamail.com'];
                            $domain = substr(strrchr($value, "@"), 1);
                            if (in_array(strtolower($domain), $disposableDomains)) {
                                $fail('Business email cannot use disposable email services.');
                            }
                        }
                    ]
                ]);

            case 2:
                return array_merge($baseRules, [
                    'primary_contact_name' => [
                        'required',
                        'string',
                        'min:2',
                        'max:150',
                        'regex:/^[a-zA-Z\s]+$/'
                    ],
                    'primary_contact_email' => [
                        'required',
                        'email:rfc,dns',
                        'max:255',
                        'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/'
                    ],
                    'primary_contact_phone' => [
                        'required',
                        'string',
                        'regex:/^\+?[1-9]\d{9,14}$/',
                        function ($attribute, $value, $fail) {
                            $dummyPatterns = ['0000000000', '1234567890', '1111111111'];
                            $cleanPhone = preg_replace('/[^\d]/', '', $value);
                            if (in_array($cleanPhone, $dummyPatterns)) {
                                $fail('Please enter a valid phone number.');
                            }
                        }
                    ],
                    'finance_contact_name' => [
                        'required',
                        'string',
                        'min:2',
                        'max:50',
                        'regex:/^[a-zA-Z\s]+$/'
                    ],
                    'finance_contact_email' => [
                        'required',
                        'email:rfc,dns',
                        'max:255',
                        'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/'
                    ],
                    'finance_contact_phone' => [
                        'required',
                        'string',
                        'regex:/^\+?[1-9]\d{9,14}$/'
                    ],
                    'support_contact_name' => [
                        'nullable',
                        'string',
                        'min:2',
                        'max:50',
                        'regex:/^[a-zA-Z\s]+$/'
                    ],
                    'support_contact_email' => [
                        'nullable',
                        'email:rfc,dns',
                        'max:255'
                    ],
                    'support_contact_phone' => [
                        'nullable',
                        'string',
                        'regex:/^\+?[1-9]\d{9,14}$/'
                    ]
                ]);

            case 3:
                return array_merge($baseRules, [
                    'hq_address' => [
                        'required',
                        'string',
                        'min:10',
                        'max:500'
                    ],
                    'postcode' => [
                        'required',
                        'string',
                        'min:3',
                        'max:10',
                        'regex:/^[A-Z0-9\s\-]+$/i',
                        function ($attribute, $value, $fail) {
                            if (in_array(strtolower($value), ['00000', '12345', 'aaaaa'])) {
                                $fail('Please enter a valid postcode.');
                            }
                        }
                    ],
                    'timezone' => 'required|string|in:GMT,CET,EET,IST,EST,PST',
                    'operating_license' => [
                        'nullable',
                        'string',
                        'min:6',
                        'max:15',
                        'regex:/^[A-Z0-9\-]+$/i'
                    ]
                ]);

            case 4:
                return array_merge($baseRules, [
                    'currency' => 'required|in:GBP,EUR,USD,CAD,AUD',
                    'tax_profile' => 'required|in:VAT,GST,SalesTax,None',
                    'tax_id' => [
                        'nullable',
                        'string',
                        'min:9',
                        'max:15',
                        'regex:/^[A-Z0-9]+$/i'
                    ],
                    'reverse_charge' => 'nullable|in:yes,no,partial',
                    'payout_type' => 'required|in:bank,wallet',
                    'iban' => [
                        'required_if:payout_type,bank',
                        'string',
                        'regex:/^GB\d{2}[A-Z]{4}\d{14}$/i'
                    ],
                    'account_title' => [
                        'required_if:currency,GBP',
                        'nullable',
                        'string',
                        'min:2',
                        'max:50',
                        'regex:/^[a-zA-Z\s]+$/'
                    ],
                    'sort_code' => [
                        'required_if:currency,GBP',
                        'nullable',
                        'string',
                        'min:6',
                        'max:6',
                        'regex:/^[0-9]+$/'
                    ],
                    

                ]);

            case 6:
                return array_merge($baseRules, [
                    'gdpr_consent' => 'required|accepted'
                ]);

            default:
                return $baseRules;
        }
    }

    public function messages()
    {
        return [
            // Step 1 - Legal Details
            'legal_company_name.required' => 'Company name is required.',
            'legal_company_name.unique' => 'This company name is already registered.',
            'legal_company_name.regex' => 'Company name contains invalid characters.',
            'legal_company_name.min' => 'Company name must be at least 2 characters.',
            'legal_company_name.max' => 'Company name cannot exceed 100 characters.',

            'trading_name.min' => 'Trading name must be at least 2 characters.',
            'trading_name.max' => 'Trading name cannot exceed 100 characters.',
            'trading_name.regex' => 'Trading name contains invalid characters.',

            'registration_number.required' => 'Registration number is required.',
            'registration_number.unique' => 'This registration number is already in use.',
            'registration_number.regex' => 'Registration number must contain only letters and numbers.',
            'registration_number.min' => 'Registration number must be at least 6 characters.',
            'registration_number.max' => 'Registration number cannot exceed 12 characters.',

            'jurisdiction.required' => 'Please select a jurisdiction.',
            'jurisdiction.exists' => 'Selected jurisdiction is invalid.',

            'incorporation_date.required' => 'Incorporation date is required.',
            'incorporation_date.date' => 'Please enter a valid date.',
            'incorporation_date.before' => 'Incorporation date cannot be in the future.',
            'incorporation_date.after' => 'Incorporation date must be after 1900.',

            'company_type.required' => 'Please select a company type.',
            'company_type.in' => 'Selected company type is invalid.',

            'business_email.required' => 'Business email is required.',
            'business_email.email' => 'Please enter a valid email address.',
            'business_email.unique' => 'This business email is already registered.',
            'business_email.regex' => 'Please enter a valid email format.',
            'business_email.max' => 'Email address cannot exceed 255 characters.',

            // Step 2 - Contacts
            'primary_contact_name.required' => 'Primary contact name is required.',
            'primary_contact_name.min' => 'Contact name must be at least 2 characters.',
            'primary_contact_name.max' => 'Contact name cannot exceed 50 characters.',
            'primary_contact_name.regex' => 'Contact name can only contain letters and spaces.',

            'primary_contact_email.required' => 'Primary contact email is required.',
            'primary_contact_email.email' => 'Please enter a valid email address.',
            'primary_contact_email.regex' => 'Please enter a valid email format.',
            'primary_contact_email.max' => 'Email address cannot exceed 255 characters.',

            'primary_contact_phone.required' => 'Primary contact phone is required.',
            'primary_contact_phone.regex' => 'Please enter a valid phone number with country code.',

            'finance_contact_name.required' => 'Finance contact name is required.',
            'finance_contact_name.min' => 'Finance contact name must be at least 2 characters.',
            'finance_contact_name.max' => 'Finance contact name cannot exceed 50 characters.',
            'finance_contact_name.regex' => 'Finance contact name can only contain letters and spaces.',

            'finance_contact_email.required' => 'Finance contact email is required.',
            'finance_contact_email.email' => 'Please enter a valid email address.',
            'finance_contact_email.regex' => 'Please enter a valid email format.',
            'finance_contact_email.max' => 'Email address cannot exceed 255 characters.',

            'finance_contact_phone.required' => 'Finance contact phone is required.',
            'finance_contact_phone.regex' => 'Please enter a valid phone number with country code.',

            'support_contact_name.min' => 'Support contact name must be at least 2 characters.',
            'support_contact_name.max' => 'Support contact name cannot exceed 50 characters.',
            'support_contact_name.regex' => 'Support contact name can only contain letters and spaces.',

            'support_contact_email.email' => 'Please enter a valid email address.',
            'support_contact_email.max' => 'Email address cannot exceed 255 characters.',

            'support_contact_phone.regex' => 'Please enter a valid phone number with country code.',

            // Step 3 - Address
            'hq_address.required' => 'Headquarters address is required.',
            'hq_address.min' => 'Address must be at least 10 characters.',
            'hq_address.max' => 'Address cannot exceed 500 characters.',

            'postcode.required' => 'Postcode is required.',
            'postcode.min' => 'Postcode must be at least 3 characters.',
            'postcode.max' => 'Postcode cannot exceed 10 characters.',
            'postcode.regex' => 'Please enter a valid postcode format.',

            'timezone.required' => 'Please select a timezone.',
            'timezone.in' => 'Selected timezone is invalid.',

            'operating_license.min' => 'Operating license must be at least 6 characters.',
            'operating_license.max' => 'Operating license cannot exceed 15 characters.',
            'operating_license.regex' => 'Operating license can only contain letters, numbers, and hyphens.',

            // Step 4 - Finance
            'currency.required' => 'Please select a currency.',
            'currency.in' => 'Selected currency is invalid.',

            'tax_profile.required' => 'Please select a tax profile.',
            'tax_profile.in' => 'Selected tax profile is invalid.',

            'tax_id.min' => 'Tax ID must be at least 9 characters.',
            'tax_id.max' => 'Tax ID cannot exceed 15 characters.',
            'tax_id.regex' => 'Tax ID can only contain letters and numbers.',

            'reverse_charge.in' => 'Selected reverse charge option is invalid.',

            'payout_type.in' => 'Selected payout type is invalid.',

            'iban.regex' => 'Please enter a valid IBAN format.',

            // Step 6 - GDPR
            'gdpr_consent.required' => 'GDPR consent is required.',
            'gdpr_consent.accepted' => 'You must accept the GDPR terms to continue.',
        ];
    }


    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
