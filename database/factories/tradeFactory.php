<?php

namespace Database\Factories;

use App\Models\trade;
use App\Models\tradingPool;
use App\Models\tradingPoolUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class tradeFactory extends Factory
{
    CONST VALUE_MIN = -100;
    CONST VALUE_MAX = 100;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = trade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween($this::VALUE_MIN, $this::VALUE_MAX),
            'trading_pool_user_id' => tradingPoolUser::all()->random()->id,
        ];
    }
}
