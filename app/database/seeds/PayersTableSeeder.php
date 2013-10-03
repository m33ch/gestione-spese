<?php

class PayersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('payers')->delete();
 
        Payers::create(array(
            'user_id' => '1',
            'outgoings_id' => '1',
            'contribution' => '10,60'
        ));
        Payers::create(array(
            'user_id' => '2',
            'outgoings_id' => '1',
            'contribution' => '5,00'
        ));
        Payers::create(array(
            'user_id' => '3',
            'outgoings_id' => '1',
            'contribution' => '15,00'
        ));
        Payers::create(array(
            'user_id' => '1',
            'outgoings_id' => '2',
            'contribution' => '10,60'
        ));
        Payers::create(array(
            'user_id' => '2',
            'outgoings_id' => '2',
            'contribution' => '5,00'
        ));
        Payers::create(array(
            'user_id' => '3',
            'outgoings_id' => '2',
            'contribution' => '15,00'
        ));
        Payers::create(array(
            'user_id' => '1',
            'outgoings_id' => '3',
            'contribution' => '10,60'
        ));
        Payers::create(array(
            'user_id' => '2',
            'outgoings_id' => '3',
            'contribution' => '5,00'
        ));
        Payers::create(array(
            'user_id' => '3',
            'outgoings_id' => '3',
            'contribution' => '15,00'
        ));
	}

}
