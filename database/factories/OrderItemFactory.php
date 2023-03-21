<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->randomNumber(),
            'product_id' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),
            'total' => $this->faker->randomFloat(),
        ];
    }
}
