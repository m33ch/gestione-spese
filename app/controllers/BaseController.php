<?php

class BaseController extends Controller {

	public $currentUser;

	public function __construct()
	{
		$this->currentUser = (Auth::user()) ? Auth::user() : 0;
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}