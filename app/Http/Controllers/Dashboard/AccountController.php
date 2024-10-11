<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function index()
    {
        // List Account
        $id = Auth::user()->id;
        $accounts = User::with(['profile'])->where('id', '!=', $id)->get();
        $data = [
            'title' => 'Account | DPM',
            'accounts' => $accounts
        ];

        return view('dashboard.account.index', $data);
    }

    public function create()
    {
        $roles = Role::all();
        $data = [
            'title' => 'Account | DPM',
            'roles' => $roles
        ]; 
        return view('dashboard.account.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_.-]{4,20}$/|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'departement' => 'required|max:255',
            'role_id' => 'required|in:1,2,3,4',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
            'departement' => $validated['departement'],
            'password' => $validated['password']
        ]);
        
        Profile::create([
            'name' => $validated['name'],
            'user_id' => $user->id
        ]);

        $user->markEmailAsVerified();

        return redirect()->route('account.index')->with('Account successfully created.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $account = User::with(['profile'])->where('id', $id)->first();
        $roles = Role::all();

        $data = [
            'title' => 'Account | DPM',
            'account' => $account,
            'roles' => $roles
        ];

        return view('dashboard.account.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $account = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_.-]{4,20}$/|unique:users,username,' . $account->username . ',username',
            'email' => 'required|email|unique:users,email,' . $account->email . ',email',
            'departement' => 'required|max:255',
            'role_id' => 'required|in:1,2,3,4',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $profile = Profile::where('user_id', $id)->first();

        if($request->filled('password')) {
            $account->update([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'departement' => $validated['departement'],
                'role_id' => $validated['role_id'],
                'password' => $validated['password'],
            ]);
        } else {
            $account->update([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'departement' => $validated['departement'],
                'role_id' => $validated['role_id'],
            ]);
        }

        $profile->update([
            'name' => $validated['name']
        ]);

        return redirect()->route('account.index')->with('Account successfully updated.');
    }

    public function destroy(string $id)
    {
        $account = User::findOrFail($id);
        $account->delete();

        return redirect()->route('account.index')->with('success', 'Account successfully deleted.');
    }
}
