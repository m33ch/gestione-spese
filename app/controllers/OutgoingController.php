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
        $outgoings = $this->outgoing->with('author')->paginate(5);
        
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

        // Declare the rules for the form validation.
        $rules = array(
           'title'  		=> 'required',
           'description'  	=> 'required',
           'date'  			=> 'required',
           'amount'  		=> 'required',
        );

        // Validate the inputs.
        $validator = Validator::make($outgoingData, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $outgoing = $this->outgoing->create($outgoingData);

			return Redirect::to('/outgoing/'.$outgoing->id.'/edit')->with('success', 'Spesa creata, aggiungi ora i contribuenti!');
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

		$_payers = $outgoing->payers()
                            ->orderBy('payers.created_at','desc')
                            ->get()
                            ->toArray();
        
        $payers = array();
        $data_tmp = '';
        foreach ($_payers as $value) {
            if ($data_tmp != $value['pivot']['created_at']) {
                $data_tmp = $value['pivot']['created_at'];
             }
             $payers[$data_tmp][] = array(
                                     'id'         		=> $value['id'],
                                     'name'             => $value['name'],
                                     'contribution'     => $value['pivot']['contribution']
                                     );
        }        

        return View::make('outgoing.show')
        			->with('currentUser',$this->currentUser)
        			->with('currentMenu',$this->currentMenu)
        			->with('outgoing',$outgoing)
        			->with('payers',$payers);
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

		$_payers = $outgoing->payers()
                            ->orderBy('payers.created_at','desc')
                            ->get()
                            ->toArray();
        
        $users = User::all();

        $payers = array();
        $data_tmp = '';
        foreach ($_payers as $value) {
            if ($data_tmp != $value['pivot']['created_at']) {
                $data_tmp = date('d/m/Y',strtotime($value['pivot']['created_at']));
                //$data_tmp = date('d/m/Y',$data_tmp);
             }
             $payers[$data_tmp][] = array(
                                     'id'         		=> $value['id'],
                                     'name'             => $value['name'],
                                     'contribution'     => $value['pivot']['contribution'],
                                     'created_at'       => date('H:i',strtotime($value['pivot']['created_at'])),
                                     'updated_at'       => date('d/m/Y - H:i',strtotime($value['pivot']['updated_at'])),
                                     );
        } 
        //print_r($payers);die();
        return View::make('outgoing.edit')
        			->with('currentUser',$this->currentUser)
        			->with('currentMenu',$this->currentMenu)
        			->with('outgoing',$outgoing)
        			->with('users',$users)
        			->with('payers',$payers);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$outgoingData = array(
                'title' 		=> Input::get('title'),
                'description' 	=> Input::get('description'),
                'date' 			=> Input::get('date_submit'),
                'amount' 		=> Input::get('amount'),
                'user_id' 		=> $this->currentUser->id
        );

        // Declare the rules for the form validation.
        $rules = array(
           'title'  		=> 'required',
           'description'  	=> 'required',
           'date'  			=> 'required',
           'amount'  		=> 'required'
        );

        // Validate the inputs.
        $validator = Validator::make($outgoingData, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $outgoing = $this->outgoing->with('payers')->find($id);

            $outgoing->title 		= $outgoingData['title'];
            $outgoing->description 	= $outgoingData['description'];
            $outgoing->date 		= $outgoingData['date'];
            $outgoing->amount 		= $outgoingData['amount'];

			$outgoing->save();

            return Redirect::to('/outgoing')->with('success', 'Spesa aggiornata');
        }

        // Something went wrong.
        return Redirect::to('outgoing/'.$id.'/edit')->withErrors($validator)->withInput(Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$outgoing = $this->outgoing->find($id);

		if ( $outgoing->delete() ) {
			return Response::json(array('message' => 'La spesa è stata eliminata'));
		}
	}

	public function add_payer($id)
	{  
        $payersData = array(
                'contributions'	=> Input::get('contributions')
        );

        // Declare the rules for the form validation.
        $rules = array(
           'contributions'	=> 'required'
        );

        // Validate the inputs.
        $validator = Validator::make($payersData, $rules);

        // Check if the form validates with success.
        if ($validator->passes()) {
        	
            foreach($payersData['contributions'] as $key => $value) {

        	   $user = User::find($key);

        	   $user->outgoings()->attach(array($id => array('contribution' => $value)));
            }

        	return Response::json(array('message' => 'Contribuente inserito!'));

        }

        return Response::json(array($validator->messages()));

	}
}
