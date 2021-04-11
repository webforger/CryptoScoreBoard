<?php

namespace Database\Factories;

use App\Models\Coin;
use App\Models\pnl;
use Illuminate\Database\Eloquent\Factories\Factory;

class pnlFactory extends Factory
{
    CONST VALUE_MIN = -100;
    CONST VALUE_MAX = 2000;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pnl::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween($this::VALUE_MIN, $this::VALUE_MAX),
        ];
    }
}
