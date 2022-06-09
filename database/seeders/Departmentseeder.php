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
            'name' => 'Web Design',
            'user_id' => json_encode(['2']),
            'role_id' => 2,
        ]);

    }
}
