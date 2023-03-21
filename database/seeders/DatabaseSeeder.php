<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Dummy\CartItemSeeder;
use Database\Seeders\Dummy\CartSeeder;
use Database\Seeders\Dummy\CategorySeeder;
use Database\Seeders\Dummy\OrderItemSeeder;
use Database\Seeders\Dummy\OrderSeeder;
use Database\Seeders\Dummy\ProductSeeder;
use Database\Seeders\Dummy\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
        ]);
    }
}
