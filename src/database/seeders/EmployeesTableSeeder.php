<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'employees';

    	$data = [
    		[
    			'person_id' => '4a193072-cf17-4962-96e2-c15bbd228df7',
	        	'nip' => '216105',
	        	'join_date' => '2017-10-25',
	        	'is_active' => 1,
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
            [
                'person_id' => '66ad7975-2b90-490f-9185-091fe27cc983',
                'nip' => '219055',
                'join_date' => '2019-05-16',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
    	];

        DB::table($table)->insert($data);
    }
}
