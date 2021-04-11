<?php

namespace Database\Factories;

use App\Models\Coin;
use App\Models\Pair;
use Illuminate\Database\Eloquent\Factories\Factory;

class PairFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pair::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coin1' => Coin::all()->random()->id,
            'coin2' => Coin::all()->random()->id,
            'value' => $this->faker->numberBetween(1, 100)
        ];
    }
}
