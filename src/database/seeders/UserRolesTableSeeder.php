<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'user_roles';

    	$data = [
    		[
    			// admin
    			'user_id' => '4af9199c-919e-4293-a215-d8bef567a0ae',
	        	'role_id' => 'ffcd7267-ae75-422e-ab0d-9b5e4d8a576e',
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    		[
    			// user
    			'user_id' => 'e8a7c8c9-7636-4e4d-99c3-dbbbda942b37',
	        	'role_id' => 'dbd3dad4-b405-41d3-9788-f4378984889b',
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    	];

        DB::table($table)->insert($data);
    }
}
