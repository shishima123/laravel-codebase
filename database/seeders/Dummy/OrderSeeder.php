<?php

namespace Database\Seeders\Dummy;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE orders");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = User::customer()->get();

        foreach ($users as $user) {
            Order::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
