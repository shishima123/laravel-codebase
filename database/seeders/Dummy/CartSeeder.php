<?php

namespace Database\Seeders\Dummy;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE carts");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = User::customer()->get();

        foreach ($users as $user) {
            $user->carts()->create();
        }
    }
}
