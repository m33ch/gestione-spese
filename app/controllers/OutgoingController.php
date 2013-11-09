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
        $outgoings = Outgoings::with('user')->paginate(10);
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
        $outgoingData = array(
                'title' 		=> Input::get('title'),
                'description' 	=> Input::get('description'),
                'date' 			=> Input::get('date_submit'),
                'amount' 		=> Input::get('amount'),
                'user_id' 		=> $this->currentUser->id
        );

        $payersData = array(
        		'payers' 		=> Input::get('payers'),
                'contributions'	=> Input::get('contributions')
        );

        // Declare the rules for the form validation.
        $rules = array(
           'title'  		=> 'required',
           'description'  	=> 'required',
           'date'  			=> 'required',
           'amount'  		=> 'required',
           'payers'  		=> 'required',
           'contributions'	=> 'required',
        );

        $data = array_merge($outgoingData, $payersData);

        // Validate the inputs.
        $validator = Validator::make($data, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $outgoing = Outgoings::create($outgoingData);

			$users = User::find($payersData['payers']);

			foreach ($users as $user) { 
				$user->outgoings()->attach($outgoing->id, array('contribution' => $payersData['contributions'][$user->id]));
			}

            return Redirect::to('/')->with('success', 'Spesa creata');
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
		$outgoing = Outgoings::find($id);

        return View::make('outgoing.show')
        			->with('currentUser',$this->currentUser)
        			->with('currentMenu',$this->currentMenu)
        			->with('outgoing',$outgoing);
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