<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\EmailOtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        if(hasRental()){
            return view('auth.register_rental');
        }else{
            return view('auth.register');
        }
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'email_otp' => rand(100000, 999999),
            'email_otp_expires_at' => now()->addMinutes(10),
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->validated());
        $role = Role::where('name', 'rider')->first();
        $user->addRole($role);
        
        Mail::to($user->email)->send(new EmailOtpMail($user->email_otp));
        $request->session()->put('register_user_id', $user->id);

        return redirect()->route('register.verify')->with('success', 'Please check your email for verification code.');
    }

    public function verify(Request $request)
    {
        $user = User::find($request->session()->get('register_user_id'));
        if (!$user) {
            return redirect()->route('register')->with('error', 'Please signup first.');
        }
        
        if($request->isMethod('post')){
            $request->validate([
                'email_otp' => 'required',
            ]);

            if ($request->email_otp != $user->email_otp) {
                return redirect()->route('register.verify')->with('error', 'Invalid OTP.');
            }

            $user->email_otp = null;
            $user->email_otp_expires_at = null;
            $user->email_verified_at = now();
            $user->save();

            $request->session()->forget('register_user_id');

            return redirect()->route('login')->with('success', 'Your email has been verified successfully.');
        }
        
        return view('auth.register_verify', compact('user'));
    }

    public function resend(Request $request)
    {
        $user = User::find($request->session()->get('register_user_id'));

        if (!$user) {
            return redirect()->route('register')->with('error', 'Please signup first.');
        }

        $user->email_otp = rand(100000, 999999);
        $user->email_otp_expires_at = now()->addMinutes(10);
        $user->save();
        
        Mail::to($user->email)->send(new EmailOtpMail($user->email_otp));
        return redirect()->route('register.verify')->with('success', 'Please check your email for verification code.');
    }
}