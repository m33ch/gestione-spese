<?php

class OutgoingsController extends BaseController {
		

	public function __construct() 
	{
		parent::__construct();
		$this->currentMenu = 'outgoings';
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $outgoings = Outgoings::with('user')->get();
        return View::make('outgoings.index')
        			->with('currentUser',$this->currentUser)
        			->with('currentMenu',$this->currentMenu)
        			->with('outgoings',$outgoings);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
        return View::make('outgoings.create')
        			->with('currentUser',$this->currentUser)
        			->with('currentMenu',$this->currentMenu);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'date' => Input::get('date--submit'),
                'amount' => Input::get('amount'),
                'user_id' => /*Input::get('user_id')*/ 1,
        );
        // Declare the rules for the form validation.
        $rules = array(
           'title'  => 'required',
           'description'  => 'required',
           'date'  => 'required',
           'amount'  => 'required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
        	var_dump(Input::get('date')) ;die();
            $outgoing = Outgoings::create($userdata);

            return Redirect::to('/')->with('success', 'Spesa create');
        }

        // Something went wrong.
        return Redirect::to('outgoings/create')->withErrors($validator)->withInput(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('outgoings.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('outgoings.edit');
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
