<?php

class UserController extends BaseController {

	public $currentMenu;

	public function __construct() 
	{
		parent::__construct();
		$this->currentMenu = 'user';
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();

        return View::make('users.index')
        			->with('users', $users)
        			->with('currentMenu',$this->currentMenu)
        			->with('currentUser', $this->currentUser);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = User::find($id);
    	
        return View::make('users.show')
        			->with('user', $user)
        			->with('currentMenu',$this->currentMenu)
        			->with('currentUser', $this->currentUser);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::find($id);
    	
        return View::make('users.edit')
        			->with('user', $user)
        			->with('currentMenu',$this->currentMenu)
        			->with('currentUser', $this->currentUser);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
