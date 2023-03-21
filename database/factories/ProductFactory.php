<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->randomNumber(),
            'name' => $this->faker->company(),
            'description' => $this->faker->realText(),
            'content' => $this->faker->realText(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = null, $min = 10, $max = 20),
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'unit' => $this->faker->randomElement(['dv']),
        ];
    }
}
