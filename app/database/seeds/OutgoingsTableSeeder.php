<?php
 
class OutgoingsTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('outgoings')->delete();
 
        Outgoings::create(array(
            'user_id' => 1,
            'title' => 'Spesa 1',
            'description' => 'Descrizione',
            'date' => '2013-09-27',
            'amount' => '30,60',
            'status' => 'open'
        ));
 
        Outgoings::create(array(
            'user_id' => 2,
            'title' => 'Spesa 2',
            'description' => 'Descrizione',
            'date' => '2013-09-27',
            'amount' => '30,60',
            'status' => 'open'
        ));
        Outgoings::create(array(
            'user_id' => 3,
            'title' => 'Spesa 3',
            'description' => 'Descrizione',
            'date' => '2013-09-27',
            'amount' => '30,60',
            'status' => 'open'
        ));
    }
 
}
