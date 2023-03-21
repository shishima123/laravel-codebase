<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cart_id' => $this->faker->randomNumber(),
            'product_id' => $this->faker->randomNumber(),
            'qty' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(),
        ];
    }
}
