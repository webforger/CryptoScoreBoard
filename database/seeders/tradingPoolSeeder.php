<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tradingPool;
use App\Models\User;

class tradingPoolSeeder extends Seeder
{
    CONST USERS_PER_POOL_MIN = 2;
    CONST USERS_PER_POOL_MAX = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tradingPool::factory(10)
        ->has(User::factory()->count(rand($this::USERS_PER_POOL_MIN, $this::USERS_PER_POOL_MAX)), 'users')
        ->create();
    }
}
