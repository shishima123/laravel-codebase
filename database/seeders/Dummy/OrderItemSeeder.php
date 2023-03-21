<?php

namespace Database\Seeders\Dummy;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE order_items");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = Product::all(['id', 'price']);
        $orders = Order::all();
        foreach ($orders as $order) {
            for ($i = 0; $i < 2; $i++) {
                $quantity = random_int(1, 5);
                $product = $products->random();
                $order->orderItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total' => $quantity * $product->price,
                ]);
            }
        }
    }
}
