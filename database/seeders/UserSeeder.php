<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Account Supervisor
        $supervisor = User::create([
            'username' => 'supervisor',
            'email' => 'supervisor@gmail.com',
            'email_verified_at' => now(),
            'password' => 'supervisor',
            'role_id'=> 1,
        ]);

        // Account Admin
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'role_id'=> 2,
        ]);

        // Account User
        $user = User::create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => 'useruser',
            'role_id'=> 3,
        ]);

        // Mark Verified Email
        $supervisor->markEmailAsVerified();
        $admin->markEmailAsVerified();
        $user->markEmailAsVerified();

        // Profile Supervisor
        Profile::create([
            'name' => 'supervisor',
            'user_id' => $supervisor->id
        ]);

        // Profile Admin
        Profile::create([
            'name' => 'admin',
            'user_id' => $admin->id
        ]);
        
        // Profile User
        Profile::create([
            'name' => 'user',
            'user_id' => $user->id
        ]);
    }
}
