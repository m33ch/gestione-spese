<?php

class OutgoingController extends BaseController {
		

	public function __construct(Outgoings $outgoing) 
	{
		parent::__construct();
		$this->currentMenu = 'outgoing';
		$this->outgoing = $outgoing;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $outgoings = $this->outgoing->with('user')->paginate(5);
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
                'contributions'	=> Input::get('contributions')
        );

        // Declare the rules for the form validation.
        $rules = array(
           'title'  		=> 'required',
           'description'  	=> 'required',
           'date'  			=> 'required',
           'amount'  		=> 'required',
           'contributions'	=> 'required'
        );

        $data = array_merge($outgoingData, $payersData);

        // Validate the inputs.
        $validator = Validator::make($data, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $outgoing = $this->outgoing->create($outgoingData);

			$users = User::all();

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
		$outgoing = $this->outgoing->find($id);
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
		$outgoing = $this->outgoing->find($id);

        return View::make('outgoing.edit')
        			->with('currentUser',$this->currentUser)
        			//->with('users',$users)
        			->with('currentMenu',$this->currentMenu)
        			->with('outgoing',$outgoing);
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
		$outgoingData = array(
                'title' 		=> Input::get('title'),
                'description' 	=> Input::get('description'),
                'date' 			=> Input::get('date_submit'),
                'amount' 		=> Input::get('amount'),
                'user_id' 		=> $this->currentUser->id
        );

        $payersData = array(
                'contributions'	=> Input::get('contributions')
        );

        // Declare the rules for the form validation.
        $rules = array(
           'title'  		=> 'required',
           'description'  	=> 'required',
           'date'  			=> 'required',
           'amount'  		=> 'required',
           'contributions'	=> 'required'
        );

        $data = array_merge($outgoingData, $payersData);

        // Validate the inputs.
        $validator = Validator::make($data, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $outgoing = $this->outgoing->find($id);

            $outgoing->title 		= $outgoingData['title'];
            $outgoing->description 	= $outgoingData['description'];
            $outgoing->date 		= $outgoingData['date'];
            $outgoing->amount 		= $outgoingData['amount'];

			$users = User::all();
			foreach ($users as $user) {
				if (isset($payersData['contributions'][$user->id])) {
					$contribution = $payersData['contributions'][$user->id];
				}
				$user->outgoings()->sync(array($outgoing->id => array('contribution' => $contribution)), false);
			}

			$outgoing->save();

            return Redirect::to('/')->with('success', 'Spesa aggiornata');
        }

        // Something went wrong.
        return Redirect::to('outgoing/create')->withErrors($validator)->withInput(Input::all());
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
