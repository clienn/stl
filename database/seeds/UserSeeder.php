<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 1; ++$i) { 
	    	DB::table('users')->insert([
                'username' => "user-$i",
                'email' => "user$i@gmail.com",
                'password' => Hash::make('qqww1122')
	        ]);
    	}
    }
}
