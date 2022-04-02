<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'applications';

    	$data = [
    		[
    			'id' => '01b6e36a-ad97-4c4c-9853-9fc3a35b30e8',
	        	'application' => 'SIAKAD',
	        	'description' => 'Sistem Informasi Akademik',
	        	'base_url' => 'http://localhost/siakad',
	        	'login_url' => 'http://localhost/siakad/auth',
	        	'logo' => null,
	        	'is_active' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
    		],
    		// [
    		// 	'id' => (string) Str::uuid(),
	     //    	'application' => 'PPDB',
	     //    	'description' => 'Sistem Informasi Penerimaan Mahasiswa Baru',
	     //    	'base_url' => 'http://localhost/pmb',
	     //    	'login_url' => 'http://localhost/pmb/auth',
	     //    	'logo' => null,
	     //    	'is_active' => true,
      //           'created_at' => date('Y-m-d H:i:s'),
      //           'updated_at' => date('Y-m-d H:i:s')
    		// ],
    	];

        DB::table($table)->insert($data);
    }
}
