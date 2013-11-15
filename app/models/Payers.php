<?php

class Payers extends Eloquent {
	
	protected $table = 'payers';

	protected $guarded = array();

	protected $softDelete = true;
	
	public static $rules = array();

	public function outgoings() {
		return $this->hasMany('Outgoings');
	}
	public function user() {
		return $this->hasMany('User');
	}
}
