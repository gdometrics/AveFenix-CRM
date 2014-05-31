<?php

class ClientsController extends BaseController {

	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post')); 
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */ 

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate() {

	   $validator = Validator::make(Input::all(), Client::$rules);
	 
	   if ($validator->passes()) {
	       $client = new Client;
	   	   $data = Input::all();
		   $client->fill($data); 
		   $client->save(); 

	   	   $count = 0;
	   	   while (Input::get('sub-cl-name'.$count)){
	       	  $subClient = new Client;
		   	  $subClient->fill($data);
	   	      $subClient->name = Input::get('sub-cl-name'.$count);
	   	      $subClient->id_user = Input::get('id_user'.$count);
	   	      $subClient->id_parent = $client->id;
	   	      $subClient->rif = null;
		   	  $subClient->save(); 
	   	      $count ++;
	   	   }  
		   return Redirect::to(Input::get('url').'#'.$client->id)->with('confirmation', '¡El nuevo cliente a sido registrado!');
	   } else {
	       // validation has failed, display error messages 
	   	   return Redirect::to(Input::get('url')."#formClient")->with('message-box', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   }
	}


	public function postEdit($id=null){ 
	 	$validator = Validator::make(Input::all(), Client::$rulesEdit);

	   	$data = Input::all();
	    $client = Client::find($id);  
	    if (is_null ($client)){ 
			App::abort(404); 
		}  
	 	if ($validator->passes()) {
	 	   $oldFileName = $client->photo;
		   $client->fill($data); 
		   if (Input::hasFile('photo'))
			{   
			   // Get the image input
   			   $file = Input::file('photo');
   			   // Save image and crop it 
   			   $photoName = Client::saveImg($file);
   			   // Store photos name
			   $client->photo = $photoName; 
			}
			else
			{ 
			   $client->photo = $oldFileName; 
			}
		   $client->save(); 
		   return Redirect::to(Input::get('url').'#'.$client->id)->with('confirmation', '¡Los datos de '.$client->name.' fueron actualizados!');
	 	} else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url').'#edit'.$client->id)->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   	}
	} 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore($id)
	{
		$validator = Validator::make(Input::all(), Client::$rulesEditChild);
	   	$data = Input::all();
	    $subclient = Client::find($id);  
	    if (is_null ($subclient)){ 
			App::abort(404); 
		}  
	 	if ($validator->passes()) {
	 	   $oldFileName = $subclient->photo;
		   $subclient->fill($data);  
		   if (Input::hasFile('photo'))
			{   
			   // Get the image input
   			   $file = Input::file('photo');
   			   // Save image and crop it 
   			   $photoName = Client::saveImg($file);
   			   // Store photos name
			   $subclient->photo = $photoName; 
			}
			else
			{ 
			   $subclient->photo = $oldFileName; 
			}
		   $subclient->save(); 
		   return Redirect::to(Input::get('url').'#sub'.$subclient->id)->with('confirmation', '¡Los datos de '.$subclient->name.' fueron actualizados!');
	 	} else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url').'#subedit'.$subclient->id)->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   	}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postCreatesub()
	{
		$validator = Validator::make(Input::all(), Client::$rulesEditChild);
	   	$data = Input::all();   
	 	if ($validator->passes()) { 
	       $child = new Client;  
		   $child->fill($data);   
		   $parent = Client::find($child->id_parent);
	       	if (is_null ($parent)){ 
				App::abort(404); 
			} 
		   $child->fill($data);  
		   $child->razonsocial = $parent->razonsocial ;
		   ($child->address1=='')?$child->address1=$parent->address1:$child->address1;
		   ($child->phone1=='')?$child->phone1=$parent->phone1:$child->phone1;
		   ($child->webpage=='')?$child->webpage=$parent->webpage:$child->webpage;
		   ($child->email=='')?$child->email=$parent->email:$child->email;
		   $child->address2 = $parent->address2 ;  
		   $child->phone2 = $parent->phone2 ; 
		   $child->save(); 
		   return Redirect::to(Input::get('url').'#sub'.$child->id)->with('confirmation', '¡El nuevo sub cliente a sido registrado!');
	 	} else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url'))->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   	}
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