<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompanyRegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }




    public function signup()
    {
        $countries = Country::where('is_active', true)->get();
        return view('auth.company.register', compact('countries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name'   => 'required|unique:companies,name',
            'email'          => 'required|email|unique:users,email',
            'phone'          => 'required|string|max:20|unique:users,phone',
            'name'           => 'required|string|max:150',
            'country'        => 'required|string|max:100',
            'address'        => 'required|string|max:255',
            'postal_code'    => 'required|string|max:20',
            'password'       => 'required|string|min:8|confirmed',
        ]);

        try {
            DB::beginTransaction();


            $company = Company::create([
                'name'          => $data['company_name'],
                'address'       => $data['address'],
                'postal_code'   => $data['postal_code'],
                'country'       => $data['country'],
                'contact_name'  => $data['name'],
                'contact_phone' => $data['phone'],
                'contact_email' => $data['email'],
            ]);


            $user = User::create([
                'first_name'  => $data['name'],
                'email'       => $data['email'],
                'phone'       => $data['phone'],
                'password'    => Hash::make($data['password']),
                'company_id'  => $company->id,
                'email_verified_at' => now(),
            ]);

            // ✅ Assign Role
            $user->addRole('owner');
            Mail::send('emails.company_welcome_register', ['user' => $user, 'company' => $company], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Welcome to '.settings('site_name') . '! Complete Your Partner Profile');
            });

            DB::commit();

            Auth::login($user);
            return redirect('admin/dashboard')->with('success', 'Company account created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Signup failed: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
