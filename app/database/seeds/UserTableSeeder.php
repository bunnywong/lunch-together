<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->truncate();

        User::create([
            'username' => 'bunnywong',
            'email' => 'me@bunnywong.com',
            'password' => Hash::make('1234'),
        ]);
	}

}