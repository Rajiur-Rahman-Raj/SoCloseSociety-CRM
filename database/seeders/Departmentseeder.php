<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class Departmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Department',
        ]);
    }
}
