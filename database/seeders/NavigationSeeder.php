<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Navigation;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Dashboard',
            'icon' => '<i class="fa-solid fa-house"></i>',
            'route' => 'dashboard',
        ]);
    }
}
