<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // We use firstOrCreate so if you run the seeder twice by accident,
        // it won't crash trying to create a duplicate username.
        User::firstOrCreate(
            ['username' => 'admin'], // The unique column to check
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}
