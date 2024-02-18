<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $roles = [
            ['slug' => 'admin', 'name' => 'Administrator'],
            ['slug' => 'bk', 'name' => 'Bimbingan Konseling'],
            ['slug' => 'wali', 'name' => 'Wali Kelas'],
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }

        // Create users and assign roles
        $users = [
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'roles' => ['admin']],
            ['name' => 'BK User', 'email' => 'bk@example.com', 'password' => Hash::make('password'), 'roles' => ['bk']],
            ['name' => 'Wali User', 'email' => 'wali@example.com', 'password' => Hash::make('password'), 'roles' => ['wali']],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            foreach ($userData['roles'] as $roleSlug) {
                $role = Role::where('slug', $roleSlug)->first();
                if ($role) {
                    $user->roles()->attach($role->id);
                }
            }
        }
    }
}
