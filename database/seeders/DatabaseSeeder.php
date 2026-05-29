<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call your admin login seeder here
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}
