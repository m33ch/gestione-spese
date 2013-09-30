<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		 User::create(array(
			'email' => 'alessandro.rovito@gmail.com',
			'name' => 'Alessandro',
			'password' => Hash::make('password')
		));

	}

}
