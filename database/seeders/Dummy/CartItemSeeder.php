<?php

namespace Database\Seeders\Dummy;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE cart_items");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = Product::all(['id', 'price']);
        $carts = Cart::all();
        foreach ($carts as $cart) {
            for ($i = 0; $i < 2; $i++) {
                $quantity = random_int(1, 5);
                $product = $products->random();
                $cart->cartItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total' => $quantity * $product->price,
                ]);
            }
        }
    }
}
