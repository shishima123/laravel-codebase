<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'code' => $this->faker->word(),
            'total' => $this->faker->randomFloat(),
            'status' => $this->faker->boolean(),
            'order_name' => $this->faker->name(),
            'order_address' => $this->faker->address(),
            'order_phone' => $this->faker->phoneNumber(),
        ];
    }
}
