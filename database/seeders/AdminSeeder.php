<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'phone' => '01868752464',
            'role_id' => 1,
            'permission' => json_encode(['1', '2', '3', '4', '5', '6']),
            'email' => 'admin@admin.com',
            'password' => bcrypt('@@Bladepro@123@@'),
            'created_at' => Carbon::now(),
        ]);
    }
}
