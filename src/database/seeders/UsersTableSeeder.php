<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => '4af9199c-919e-4293-a215-d8bef567a0ae',
            'username' => 'bwicaksono',
            'email' => 'bayu@central.com',
            'password' => Hash::make('admin123'),
            'salt' => null,
            'is_active' => true
        ]);

        $admin->assignRole('admin');
        $admin->assignRole('user');

        $user = User::create([
            'id' => 'e8a7c8c9-7636-4e4d-99c3-dbbbda942b37',
            'username' => 'bmafazi',
            'email' => 'burhan@central.com',
            'password' => Hash::make('user123'),
            'salt' => null,
            'is_active' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $user->assignRole('user');

    	// $table = 'users';

    	// $data = [
    	// 	[
    	// 		'id' => '4af9199c-919e-4293-a215-d8bef567a0ae',
	    //     	'username' => 'admin',
	    //     	'email' => 'admin@central.com',
	    //     	'password' => Hash::make('admin123'),
	    //     	'salt' => null,
	    //     	'is_active' => true,
	    //     	'created_at' => date('Y-m-d H:i:s'),
     //            'updated_at' => date('Y-m-d H:i:s')
    	// 	],
    	// 	[
    	// 		'id' => 'e8a7c8c9-7636-4e4d-99c3-dbbbda942b37',
	    //     	'username' => 'bmafazi',
	    //     	'email' => 'burhanburdev@gmail.com',
	    //     	'password' => Hash::make('user123'),
	    //     	'salt' => null,
	    //     	'is_active' => true,
	    //     	'created_at' => date('Y-m-d H:i:s'),
     //            'updated_at' => date('Y-m-d H:i:s')
    	// 	],
    	// ];

     //    DB::table($table)->insert($data);
    }
}
