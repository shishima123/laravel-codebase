<?php

namespace Database\Seeders\Dummy;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE categories");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // factory(Category::class, 10)->create();

        foreach ($this->categories() as $i => $category) {
            $categoryInstance = Category::create(
                [
                    'name' => $category['name'],
                    'parent_id' => $category['parent_id'],
                    'sort' => ++$i,
                ]
            );

            $categoryInstance->images()->create([
                'name' => $category['image']['name'],
                'original_name' => $category['image']['original_name'],
                'path' => $category['image']['path'],
            ]);
        }
    }

    public function categories(): array
    {
        return [
            [
                'name' => 'Laptops',
                'parent_id' => 0,
                'image' => [
                    'name' => 'laptop.jpg',
                    'original_name' => 'laptop.jpg',
                    'path' => '/dummy/img_category/laptop.jpg',
                ],
            ],
            [
                'name' => 'Smart phones',
                'parent_id' => 0,
                'image' => [
                    'name' => 'smartphone.jpg',
                    'original_name' => 'smartphone.jpg',
                    'path' => '/dummy/img_category/smartphone.jpg',
                ],
            ],
            [
                'name' => 'Accessories',
                'parent_id' => 0,
                'image' => [
                    'name' => 'accessory.jpg',
                    'original_name' => 'accessory.jpg',
                    'path' => '/dummy/img_category/accessory.jpg',
                ],
            ],
            [
                'name' => 'Laptop ASUS',
                'parent_id' => 1,
                'image' => [
                    'name' => 'laptop-asus.jpg',
                    'original_name' => 'laptop-asus.jpg',
                    'path' => '/dummy/img_category/laptop-asus.jpg',
                ],
            ],
            [
                'name' => 'Laptop DELL',
                'parent_id' => 1,
                'image' => [
                    'name' => 'laptop-dell.jpg',
                    'original_name' => 'laptop-dell.jpg',
                    'path' => '/dummy/img_category/laptop-dell.jpg',
                ],
            ],
            [
                'name' => 'Laptop HP',
                'parent_id' => 1,
                'image' => [
                    'name' => 'laptop-hp.jpg',
                    'original_name' => 'laptop-hp.jpg',
                    'path' => '/dummy/img_category/laptop-hp.jpg',
                ],
            ],
            [
                'name' => 'Laptop LENOVO',
                'parent_id' => 1,
                'image' => [
                    'name' => 'laptop-lenovo.jpg',
                    'original_name' => 'laptop-lenovo.jpg',
                    'path' => '/dummy/img_category/laptop-lenovo.jpg',
                ],
            ],
            [
                'name' => 'Smart Phone IPHONE',
                'parent_id' => 2,
                'image' => [
                    'name' => 'smartphone-iphone.png',
                    'original_name' => 'smartphone-iphone.png',
                    'path' => '/dummy/img_category/smartphone-iphone.png',
                ],
            ],
            [
                'name' => 'Smart Phone SAMSUNG',
                'parent_id' => 2,
                'image' => [
                    'name' => 'smartphone-samsung.png',
                    'original_name' => 'smartphone-samsung.png',
                    'path' => '/dummy/img_category/smartphone-samsung.png',
                ],
            ],
            [
                'name' => 'Smart Phone ASUS',
                'parent_id' => 2,
                'image' => [
                    'name' => 'smartphone-asus.png',
                    'original_name' => 'smartphone-asus.png',
                    'path' => '/dummy/img_category/smartphone-asus.png',
                ],
            ],
            [
                'name' => 'CAMERA',
                'parent_id' => 3,
                'image' => [
                    'name' => 'camera.png',
                    'original_name' => 'camera.png',
                    'path' => '/dummy/img_category/camera.png',
                ],
            ],
            [
                'name' => 'HEADPHONE',
                'parent_id' => 3,
                'image' => [
                    'name' => 'headphone.png',
                    'original_name' => 'headphone.png',
                    'path' => '/dummy/img_category/headphone.png',
                ],
            ],
        ];
    }
}
