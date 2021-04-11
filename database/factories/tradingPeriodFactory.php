<?php

namespace Database\Factories;

use App\Models\tradingPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class tradingPeriodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tradingPeriod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'period_start' => $this->faker->dateTimeBetween('+0 days', '+1 months'),
            'period_end' => $this->faker->dateTimeBetween('+1 days', '+2 months'),
        ];
    }
}
