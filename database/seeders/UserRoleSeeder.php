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
            'permission' => json_encode(['1', '2', '3', '4', '5', '6']),
        ]);

        UserRole::create([
            'role' => "Agent",
            'permission' => json_encode(['1']),
        ]);


    }
}
