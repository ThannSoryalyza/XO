<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'xounited@gmail.com'], // Checks if this email already exists
            [
                'name' => 'Xounited Admin',
                'password' => Hash::make('xounited@2026'), // Always hash passwords!
                'email_verified_at' => now(),
            ]
        );
    }
}
