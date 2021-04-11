<?php

namespace Database\Factories;

use App\Models\Pair;
use App\Models\tradingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class tradingTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tradingType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'pair_id' => Pair::all()->random()->id
        ];
    }
}
