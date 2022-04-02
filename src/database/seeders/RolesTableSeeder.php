<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$table = 'roles';

    	$data = [
    		[    			
	        	'id' => 'ffcd7267-ae75-422e-ab0d-9b5e4d8a576e',
	        	'role' => 'admin',
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    		[    			
	        	'id' => 'dbd3dad4-b405-41d3-9788-f4378984889b',
	        	'role' => 'user',
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    	];

        DB::table($table)->insert($data);
    }
}
