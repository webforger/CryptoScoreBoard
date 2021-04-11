<?php

namespace Database\Factories;

use App\Models\tradingGoal;
use Illuminate\Database\Eloquent\Factories\Factory;

class tradingGoalFactory extends Factory
{
    CONST VALUE_MIN = 100;
    CONST VALUE_MAX = 20000;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tradingGoal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween($this::VALUE_MIN, $this::VALUE_MAX)
        ];
    }
}
