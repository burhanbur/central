<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ApprovalWorkflowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'approval_workflows';

      	$data = [
      		[
	        	'approval_id' => 'f3e7e378-d593-401c-9f37-c8a4ce69fd09',
	        	'request_code' => 'OVR00001',
	        	'approver_id' => '66ad7975-2b90-490f-9185-091fe27cc983',
	        	'status' => 'SUBMITTED',
            'sequence' => 1,
            'is_delegate' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
      		],
          [
            'approval_id' => 'f3e7e378-d593-401c-9f37-c8a4ce69fd09',
            'request_code' => 'OVR00001',
            'approver_id' => '4a193072-cf17-4962-96e2-c15bbd228df7',
            'status' => 'WAITING',
            'sequence' => 2,
            'is_delegate' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
      	];

        DB::table($table)->insert($data);
    }
}
