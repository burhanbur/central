<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'persons';

    	$data = [
    		[
    			'id' => '66ad7975-2b90-490f-9185-091fe27cc983',
    			'user_id' => '4af9199c-919e-4293-a215-d8bef567a0ae',
	        	'sid' => '3276022310960005',
	        	'name' => 'Bayu Wicaksono',
	        	'phone_number' => '081387807580',
	        	'birthday' => '1996-10-23',
	        	'religion' => 'ISLAM',
	        	'photo' => null,
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'id' => '4a193072-cf17-4962-96e2-c15bbd228df7',
    			'user_id' => 'e8a7c8c9-7636-4e4d-99c3-dbbbda942b37',
	        	'sid' => '3276021605950001',
	        	'name' => 'Burhan Mafazi',
	        	'phone_number' => '085695682973',
	        	'birthday' => '1995-05-16',
	        	'religion' => 'ISLAM',
	        	'photo' => null,
	        	'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    	];

        DB::table($table)->insert($data);
    }
}
