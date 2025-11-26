<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        if (hasRental()) {
            return view('auth.login_rental');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    protected function authenticated($request, $user)
    {
        // Check if user needs to complete onboarding
        if ($user->hasRole(['owner']) && ($user->onboarding_step < 7 || $user->onboarding_step === null)) {
            return redirect('/admin/onboarding');
        }
        
        if ($user->hasRole(['admin']) || $user->hasRole(['superadmin']) || $user->hasRole(['owner']) || $user->hasRole(['manager'])) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Check your condition here
        if (Auth::check()) {
            if (isAdmin() || isOwner()) {
                $this->redirectTo = '/admin/dashboard';
            } else {
                $this->redirectTo = '/dashboard';
            }
        } else {
            $this->redirectTo = RouteServiceProvider::HOME;
        }

        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email not found',
            ]);
        }

        if($user->email_verified_at == null){
            return back()->withErrors([
                'email' => 'Email not verified',
            ]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->authenticated($request, $user);
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect',
        ]);
    }
}