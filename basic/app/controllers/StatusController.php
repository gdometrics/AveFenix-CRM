<?php

class StatusController extends BaseController {

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
	   $validator = Validator::make(Input::all(), Status::$rules);
	 
	   if ($validator->passes()) {
	       $status = new Status;
	   	   $data = Input::all();
		   $status->fill($data); 
		   $status->date = date("Y-m-d", strtotime( Input::get('date')));
		   $status->save();
		   return Redirect::to(Input::get('url').'#'.$status->id)->with('confirmation', '¡El nuevo status a sido guardado!');
	   } else {
	       // validation has failed, display error messages 
	   	   return Redirect::to(Input::get('url')."#formStatus")->with('message-box', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   }
	}
	public function postEdition($id=null)
	{
		return Status::findEditionByMagazine($id);
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