<?php

class Outgoings extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outgoings';
	
	protected $guarded = array();

	protected $softDelete = true;
	
	protected static $_payersGroup = false;

	public static $rules = array();

	public static function boot()
    {
        parent::boot();

        //SOFT DELETE FOR RELATIONSHIP TABLE
        Outgoings::deleting(function($model) {
        	DB::table('payers')
			->where('outgoings_id', $model->id)
			->update(array('deleted_at' => DB::raw('NOW()')));
        });
    }

	public function author() 
	{
		return $this->belongsTo('User','user_id');
	}

	public function payers() 
	{
		return $this->belongsToMany('User', 'payers')
		            ->whereNull('payers.deleted_at')
					->withPivot(array('contribution','created_at','updated_at'));
	}
}