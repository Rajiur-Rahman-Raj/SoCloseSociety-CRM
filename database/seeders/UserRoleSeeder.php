<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'role' => "Admin",
            'permission' => 1,
        ]);

        UserRole::create([
            'role' => "Agent",
            'permission' => 2,
        ]);

        UserRole::create([
            'role' => "Customer",
            'permission' => 3,
        ]);
    }
}
