<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create default test users
        // @TODO Maybe replace this by a test only endpoint that return a random user with role / pool etc
        $user = User::create([
            'name' => 'TEST ADMIN',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('admin');

        // Create default test users
        User::create([
            'name' => 'TEST USER',
            'email' => 'user@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $this->call(tradingPoolSeeder::class);
    }
}
