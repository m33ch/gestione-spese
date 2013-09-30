<?php

class OutgoingsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('outgoings')->truncate();

		Outgoings::create(array(
			'user_id' => 1,
			'title' => 'spesa',
			'description' => 'descrizione',
			'amount' => '18,23'
		));

	}

}
