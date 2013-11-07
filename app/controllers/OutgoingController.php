<?php

class OutgoingController extends BaseController {
		

	public function __construct() 
	{
		parent::__construct();
		$this->currentMenu = 'outgoing';
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $outgoings = Outgoings::with('user')->get();
        return View::make('outgoing.index')
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
		$users = User::All();

        return View::make('outgoing.create')
        			->with('users',$users)
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
                'title' 		=> Input::get('title'),
                'description' 	=> Input::get('description'),
                'date' 			=> Input::get('date_submit'),
                'amount' 		=> Input::get('amount'),
                'payers' 		=> Input::get('payers'),
                'user_id' 		=> $this->currentUser->id,
        );
        // Declare the rules for the form validation.
        $rules = array(
           'title'  		=> 'required',
           'description'  	=> 'required',
           'date'  			=> 'required',
           'amount'  		=> 'required',
           'payers'  		=> 'required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $outgoing = new Outgoings($userdata);

			$payers = Payers::find($userdata['payers']);
				
			$outgoing->payers()->attach($userdata['payers']);

			//$outgoing->payers()->associate($payers);

			$outgoing->save();

			//$outgoing = $payers->outgoings()->save($outgoing);

            return Redirect::to('/')->with('success', 'Spesa create');
        }

        // Something went wrong.
        return Redirect::to('outgoing/create')->withErrors($validator)->withInput(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('outgoing.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('outgoing.edit');
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
