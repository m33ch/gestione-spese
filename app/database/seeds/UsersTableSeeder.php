<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();

		User::create(array(
			'email' => 'alessandro@email.com',
			'name' => 'Alessandro',
			'password' => Hash::make('password')
		));
		User::create(array(
			'email' => 'antonio@email.com',
			'name' => 'Antonio',
			'password' => Hash::make('password')
		));
		User::create(array(
			'email' => 'alberto@email.com',
			'name' => 'Alberto',
			'password' => Hash::make('password')
		));
	}

}
