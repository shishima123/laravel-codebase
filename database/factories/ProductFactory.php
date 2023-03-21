<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'content' => $this->faker->word(),
            'price' => $this->faker->randomFloat(),
            'rating' => $this->faker->word(),
            'unit' => $this->faker->word(),
        ];
    }
}
