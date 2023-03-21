<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'original_name' => $this->faker->name(),
            'path' => $this->faker->word(),
            'imageable_id' => $this->faker->randomNumber(),
            'imageable_type' => $this->faker->word(),
        ];
    }
}
