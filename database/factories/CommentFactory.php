<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cause_by_id' => $this->faker->randomNumber(),
            'cause_by_type' => $this->faker->word(),
            'commentable_id' => $this->faker->randomNumber(),
            'commentable_type' => $this->faker->word(),
            'content' => $this->faker->word(),
            'rating' => $this->faker->randomFloat(),
        ];
    }
}
