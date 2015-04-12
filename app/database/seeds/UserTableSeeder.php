<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->truncate();

         User::create([
            'username' => 'charlie',
            'email' => 'charlie@bunnywong.com',
            'password' => Hash::make('12342'),
        ]);
        User::create([
            'username' => 'alice',
            'email' => 'alice@bunnywong.com',
            'password' => Hash::make('12342'),
        ]);
        User::create([
            'username' => 'bob',
            'email' => 'bob@bunnywong.com',
            'password' => Hash::make('12342'),
        ]);
        User::create([
            'username' => 'david',
            'email' => 'david@bunnywong.com',
            'password' => Hash::make('12342'),
            'is_admin' => true,
        ]);
        User::create([
            'username' => 'bunnywong',
            'email' => 'me@bunnywong.com',
            'password' => Hash::make('1234'),
            'is_admin' => true,
        ]);
	}

}