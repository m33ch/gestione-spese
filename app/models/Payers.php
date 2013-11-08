<?php

class Payers extends Eloquent {
	
	protected $table = 'payers';

	protected $guarded = array();

	public static $rules = array();

	public function outgoings() {
		return $this->belongsToMany('outgoings');
	}
	public function user() {
		return $this->belongsToMany('User');
	}
}
