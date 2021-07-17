<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'company_id' =>1,
                'name'=>'Super Admin'
            ],
            [
                'company_id' =>1,
                'name' => 'Admin'
            ],
            [
                'company_id' =>1,
                'name' => 'User'
            ]
        ]);
    }
}
