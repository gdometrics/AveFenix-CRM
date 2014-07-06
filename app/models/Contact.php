<?php

Class Contact extends Eloquent{ 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contact';
	// Use fillable as a white list
    protected $fillable = array('firstname', 'lastname', 'job', 'department', 'phone1' ,'phone2', 'email', 'birthdate', 'id_client', 'id_subclient');

    protected $softDelete = true;

	public static $rules = array(
		'firstname'=>'required|min:2',
		'lastname'=>'min:2',
		'job'=>'min:2', 
		'department'=>'min:2', 
		'phone1'=>'required|alpha_dash|min:7',
		'phone2'=>'alpha_dash|min:7', 
	    'email'=>'required|email|unique:contact',
	    'id_client'=>'exists:client,id',
	    'id_subclient'=>'exists:subclient,id'
	); 
		public static $rulesEdit = array(
		'firstname'=>'required|min:2',
		'lastname'=>'min:2',
		'job'=>'min:2', 
		'department'=>'min:2', 
		'phone1'=>'required|alpha_dash|min:7',
		'phone2'=>'alpha_dash|min:7', 
	    'email'=>'required|email',
	    'id_client'=>'exists:client,id',
	    'id_subclient'=>'exists:subclient,id'
	); 
	public function fullname() {
    	return $this->firstname . ' ' . $this->lastname;
	}	     
	public function clientName($contact=null) { 
		$clients = Client::find($contact->id_client, array('id', 'name')); 
    	return $clients->name;
	}
	public function clientList($id=null){
		if($id==null)  
			$clients = Client::all(array('id', 'name' ));    
		else  
			$clients = Client::where('id_user','=', Auth::user()->id)->get(array('id', 'name' ));    
		$clientsRow = array();
		$clientsRow[0] = "Cliente";
		foreach ($clients as $client) { 
			$clientsRow[$client["id"]] = $client["name"]; 
		}  
		return $clientsRow;
	}
	public function parentSubClient(){
		$client = Client::find($this->id_subclient, array('id_client'));
		return $client->id_client;
	}
	public static function findClientContacts($id_client=null){ 
		$contact = Contact::where('id_client','=', $id_client)->get(array('id', 'firstname', 'lastname' ));  
		$contactRow = array();
		$contactRow[0] = "Contacto del cliente";
		foreach ($contact as $contact) { 
			  $contactRow[$contact->id] = $contact->fullname(); 
		}  
		return $contactRow;
	}
	public static function findClientContactsArray($id_client=null){ 
		return Contact::where('id_client','=', $id_client)->get(array('id', 'firstname', 'lastname' ));  
	}
	public static function findUserContacts($id_user=null){  
		$results = DB::select( DB::raw("SELECT contact.* FROM contact, client WHERE contact.id_client = client.id AND client.id_user = :id_user"), array('id_user' => $id_user,));
		return (object) $results;
	}
 
}