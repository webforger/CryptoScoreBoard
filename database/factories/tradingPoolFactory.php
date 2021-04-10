<?php

namespace Database\Factories;

use App\Models\tradingPool;
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
            'name' => $this->faker->name
        ];
    }
}
