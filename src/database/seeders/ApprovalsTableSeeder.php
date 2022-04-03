<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ApprovalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'approvals';

      	$data = [
      		[
      			'id' => 'f3e7e378-d593-401c-9f37-c8a4ce69fd09',
	        	'approval_code' => 'PAID_LEAVE_HARIS',
	        	'application_id' => '01b6e36a-ad97-4c4c-9853-9fc3a35b30e8',
	        	'approval' => 'Paid Leave',
	        	'level' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
      		],
          [
            'id' => 'f3154929-4f39-4e2f-95a1-a6ea28a2eb23',
            'approval_code' => 'OVERTIME_HARIS',
            'application_id' => '01b6e36a-ad97-4c4c-9853-9fc3a35b30e8',
            'approval' => 'Overtime',
            'level' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
      	];

        DB::table($table)->insert($data);
    }
}
