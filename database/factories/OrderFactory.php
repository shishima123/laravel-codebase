<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => $this->faker->uuid(),
            'total' => $this->faker->randomFloat(),
            'status' => $this->faker->randomFloat(0, 1, 3),
            'order_name' => $this->faker->name(),
            'order_address' => $this->faker->address(),
            'order_phone' => $this->faker->phoneNumber(),
        ];
    }
}
