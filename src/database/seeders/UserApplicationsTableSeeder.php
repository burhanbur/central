<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'user_applications';

        $data = [
        	[
        		'user_id' => '4af9199c-919e-4293-a215-d8bef567a0ae',
        		'application_id' => '01b6e36a-ad97-4c4c-9853-9fc3a35b30e8',
        		'is_active' => true,
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')        		
        	],
        	[
        		'user_id' => 'e8a7c8c9-7636-4e4d-99c3-dbbbda942b37',
        		'application_id' => '01b6e36a-ad97-4c4c-9853-9fc3a35b30e8',
        		'is_active' => true,
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')        		
        	],
        ];

        DB::table($table)->insert($data);
    }
}
