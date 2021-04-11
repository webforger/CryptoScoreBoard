<?php

namespace Database\Seeders;

use App\Models\pnl;
use App\Models\trade;
use App\Models\tradingPeriod;
use App\Models\tradingReward;
use App\Models\tradingType;
use Database\Factories\tradeFactory;
use Illuminate\Database\Seeder;
use App\Models\tradingPool;
use App\Models\User;
use App\Models\tradingGoal;

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

        $tradingPool = tradingPool::factory()
            ->has(User::factory()->count(rand($this::USERS_PER_POOL_MIN, $this::USERS_PER_POOL_MAX)), 'users')
            ->create();

        /**trade::factory(100)
            ->count(100)
            ->create();
         * */

    }
}
