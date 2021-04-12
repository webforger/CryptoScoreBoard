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
    CONST USERS_PER_POOL_MIN = 0;
    CONST USERS_PER_POOL_MAX = 10;
    CONST TRADING_POOLS = 45;
    CONST TRADES_PER_POOL = 20;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < $this::TRADING_POOLS; $i++) {
            $tradingPool = tradingPool::factory()
                ->has(User::factory(rand($this::USERS_PER_POOL_MIN, $this::USERS_PER_POOL_MAX)), 'users')
                ->create();
        }

        trade::factory($this::TRADES_PER_POOL * $this::TRADING_POOLS)->create();

    }
}
