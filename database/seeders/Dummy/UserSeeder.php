<?php

namespace Database\Seeders\Dummy;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("TRUNCATE TABLE users");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->users() as $user) {
            User::factory()->create($user);
        }
    }

    public function users(): array
    {
        return [
            [
                'name' => 'Admin',
                'role' => 'super_admin',
                'email' => 'admin@yopmail.com',
            ],
            [
                'name' => 'Customer 1',
                'email' => 'customer1@yopmail.com'
            ],
            [
                'name' => 'Customer 2',
                'email' => 'customer2@yopmail.com'
            ],
            [
                'name' => 'Customer 3',
                'email' => 'customer3@yopmail.com'
            ],
        ];
    }
}
