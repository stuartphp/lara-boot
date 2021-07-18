<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->roles()->sync(1);
        User::findOrFail(2)->roles()->sync(2);
        User::findOrFail(3)->roles()->sync(3);
        DB::table('company_user')->insert([
            [
                'company_id'=>1,
                'user_id'=>1
            ],
            [
                'company_id'=>1,
                'user_id'=>2
            ],
            [
                'company_id'=>1,
                'user_id'=>3
            ],
        ]);
    }
}
