<?php

class Outgoings extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outgoings';
	
	protected $guarded = array();

	public static $rules = array();

	public function user() {
		return $this->belongsTo('User');
	}
}