<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Approval;

class LoginController extends Controller
{
    // Login Form
    public function loginForm()
    {
        $data = ["title" => "Login | DPM"];
        return view('auth/login', $data);
    }

    // Login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'credentials' => 'required',
            'password' => 'required',
        ]);

        $type = filter_var($validated['credentials'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember = $request->filled('remember');

        $credentials = [
            $type => $validated['credentials'],
            'password' => $validated['password']
        ];

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            // $user = Auth::user();
            // $massage = 'Testing 123';
            // $user->notify(new Approval($massage));
            return redirect()->route('dashboard')->with('success', 'Welcome to dashboard');
        }

        return back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ])->onlyInput('credentials');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('You have been successfully logged out.');
    }
}
