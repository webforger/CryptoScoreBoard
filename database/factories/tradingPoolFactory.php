<?php

namespace Database\Factories;

use App\Models\tradingGoal;
use App\Models\tradingPool;
use App\Models\tradingReward;
use App\Models\tradingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class tradingPoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tradingPool::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'trading_reward_id' => function () {
                return tradingReward::factory()->create()->id;
            },
            'trading_goal_id' => function () {
                return tradingGoal::factory()->create()->id;
            },
            'trading_type_id' => tradingType::all()->random()->id,
        ];
    }
}
