<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate() {

	   $validator = Validator::make(Input::all(), Contact::$rules);
	 
	   if ($validator->passes()) {
	       $contact = new Contact;
	   	   $data = Input::all();
		   $contact->fill($data); 
		   $contact->birthdate = date("Y-m-d", strtotime( Input::get('birthdate'))); 	    
		   $contact->save();
		   return Redirect::to(Input::get('url').'#'.$contact->id)->with('confirmation', '¡El nuevo cliente a sido guardado!');
	   } else {
	       // validation has failed, display error messages 
	   	   return Redirect::to(Input::get('url')."#formContact")->with('message-box', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   }
	}

	public function postEdit($id=null){
	 	$validator = Validator::make(Input::all(), Contact::$rulesEdit);

	   	$data = Input::all();
	    $contact = Contact::find($id);  
	    if (is_null ($contact)){ 
			App::abort(404); 
		}  
	 	if ($validator->passes()) {
		   $contact->fill($data); 
		   $contact->birthdate = date("Y-m-d", strtotime( Input::get('birthdate'))); 
		   $contact->save(); 
		   return Redirect::to(Input::get('url').'#'.$contact->id)->with('confirmation', '¡Los datos de '.$contact->fullname().' fueron actualizados!');
	 	} else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url').'#edit'.$contact->id)->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   	}
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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