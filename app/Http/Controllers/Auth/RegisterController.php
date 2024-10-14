<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Register Form
    public function registerForm()
    {
        abort(404);
    }

    // Register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_.-]{4,20}$/|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'departement' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'departement' => 'required|max:255',
            'password' => $validated['password']
        ]);

        Profile::create([
            'name' => $validated['name'],
            'user_id' => $user->id
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('verification.notice')->with('success', 'You have successfully registered.');
    }
}