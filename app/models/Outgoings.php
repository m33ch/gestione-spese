<?php

class Outgoings extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	protected $guarded = array();

	public static $rules = array();
}
