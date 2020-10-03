<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
	        'name' => str_random(10),
	        'email' => 'marlon81785@gmail.com',
	        'password' => bcrypt('Felipe3822'),
	        'profile_id' => 3,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
	       	'r_auth' => 1,
	    ]);
    }
}
