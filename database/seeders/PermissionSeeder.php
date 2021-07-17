<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
            [
                'group'=>'users',
                'title'=>'users_management_access',
            ],
            [
                'group'=>'users',
                'title'=>'users_access',
            ],
            [
                'group'=>'users',
                'title'=>'users_create',
            ],
            [
                'group'=>'users',
                'title'=>'users_read',
            ],
            [
                'group'=>'users',
                'title'=>'users_update',
            ],
            [
                'group'=>'users',
                'title'=>'users_delete',
            ],
            [
                'group'=>'users',
                'title'=>'roles_access',
            ],
            [
                'group'=>'users',
                'title'=>'roles_create',
            ],
            [
                'group'=>'users',
                'title'=>'roles_read',
            ],
            [
                'group'=>'users',
                'title'=>'roles_update',
            ],
            [
                'group'=>'users',
                'title'=>'roles_delete',
            ],
            [
                'group'=>'users',
                'title'=>'permissions_access',
            ],
            [
                'group'=>'users',
                'title'=>'permissions_create',
            ],
            [
                'group'=>'users',
                'title'=>'permissions_read',
            ],
            [
                'group'=>'users',
                'title'=>'permissions_update',
            ],
            [
                'group'=>'users',
                'title'=>'permissions_delete',
            ],
        ]);

    }
}
