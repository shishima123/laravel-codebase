<?php

namespace Database\Seeders\Dummy;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE products");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = Category::where('parent_id', '!=', 0)->get();
        foreach ($categories as $category) {
            $products = Product::factory(5)->create([
                'category_id' => $category->id,
            ]);

            $categoryImageName = $this->getCategoryName($category->id);
            foreach ($products as $product) {
                for ($i = 1; $i < 4; $i++) {
                    $product->images()->create([
                        'name' => $categoryImageName . $i . '.jpg',
                        'original_name' => $categoryImageName . $i . '.jpg',
                        'path' => '/dummy/img_product/' . $categoryImageName . $i . '.jpg',
                    ]);
                }
            }
        }
    }

    public function getCategoryName($categoryId): string
    {
        return match ($categoryId) {
            4 => 'asus',
            5 => 'dell',
            6 => 'hp',
            7 => 'lenovo',
            8 => 'iphone',
            9 => 'samsung',
            10 => 'zenphone',
            11 => 'nikon',
            12 => 'beat',
            default => ''
        };
    }
}
