<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index() 
    {
        $id = auth()->user()->id;
        $genders = ['male', 'female'];

        $profile = Profile::where('user_id', $id)->first();

        $data = [
            'title' => 'Profile | FAMS',
            'profile' => $profile,
            'genders' => $genders
        ];

        return view('dashboard.profile.index', $data);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'nullable',
            'phone' => 'nullable|max:15',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'occupation' => 'nullable|max:255',
            'about' => 'nullable',
            'photo' => 'required'
        ]);

        $validated['phone'] = rtrim($validated['phone'], '_');    

        $id = auth()->user()->id;
        $profile = Profile::findOrFail($id);
        
        $profile->update($validated);

        return redirect()->route('profile.index')->with('success', 'Your profile has been successfully updated.');
    }

    public function password(Request $request)
    {
        $validated = $request->validate([
            'oldPassword' => 'required', 
            'newPassword' => 'required|min:6|confirmed', 
        ]);

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        if(!Hash::check($validated['oldPassword'], $user->password)){
            throw ValidationException::withMessages([
                'oldPassword' => ['The provided password does not match our records.']
            ]);
        }

        $user->update([
            'password' => $validated['newPassword']
        ]);

        return redirect()->route('profile.index')->with('success', 'Password Successfully updated.');
    }
}
