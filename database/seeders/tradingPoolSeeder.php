<?php

namespace Database\Seeders;

use App\Models\pnl;
use App\Models\tradingPeriod;
use App\Models\tradingReward;
use App\Models\tradingType;
use Illuminate\Database\Seeder;
use App\Models\tradingPool;
use App\Models\User;
use App\Models\TradingGoal;

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
        ->has(TradingGoal::factory()->has(TradingPeriod::factory()->count(1), 'period')->count(1), 'goal')
        ->has(TradingReward::factory()->count(1), 'reward')
        ->has(TradingType::factory()->count(1), 'type')
        ->create();
    }
}
