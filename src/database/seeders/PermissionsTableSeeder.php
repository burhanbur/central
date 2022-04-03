<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

    	$table = 'permissions';

        $data = [
            // [
            //     'name' => 'get all apps',
            //     'guard_name' => 'web'
            // ],
            [
                'name' => 'get app by user privileges',
                'guard_name' => 'web'
            ],
            // [
            //     'name' => 'get app by id',
            //     'guard_name' => 'web'
            // ],
            // [
            //     'name' => 'register app',
            //     'guard_name' => 'web'
            // ],
            // [
            //     'name' => 'edit app',
            //     'guard_name' => 'web'
            // ],
            // [
            //     'name' => 'update app',
            //     'guard_name' => 'web'
            // ],
            // [
            //     'name' => 'delete app',
            //     'guard_name' => 'web'
            // ],
            // [
            //     'name' => 'get all approvals',
            //     'guard_name' => 'web'
            // ],
            [
                'name' => 'get approval by user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'make approval',
                'guard_name' => 'web'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
