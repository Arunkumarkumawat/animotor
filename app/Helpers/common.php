<?php

use App\Models\Company;

function getCompany()
{
    if(auth()->user()->hasRole('superadmin|admin')){
        $ani_motor = Company::where('contact_name', 'animotor')->first();
        
        if (!$ani_motor) {
            $admin = auth()->user();
            
            $ani_motor = Company::create([
                'name' => 'Animotor',
                'contact_name' => 'animotor',
                'contact_email' => $admin->email,
                'contact_phone' => '0' . rand(100000000, 999999999), // Random 10-digit number starting with 0
                'address' => null,
                'postal_code' => null,
                'city' => null,
                'state' => null,
                'country' => null,
                'tin' => null,
                'logo' => null,
            ]);
        }

        return $ani_motor;
    } else if(isOwner()) {
        return companyId();
    }
}