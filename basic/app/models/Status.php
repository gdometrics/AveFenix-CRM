<?php

Class Status extends Eloquent{ 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'status';
	// Use fillable as a white list
    protected $fillable = array('status', 'comments', 'color', 'edition', 'magazine' ,'date', 'time', 'id_user', 'id_contact', 'id_client', 'id_subclient');

    protected $softDelete = true;

	public static $rules = array(
		'status'=>'required|min:2',
		'comments'=>'min:2', 
		'color'=>'required',
		'edition'=>'integer',
		'magazine'=>'required|integer|exists:magazine,id',
		'date'=>'required|date',
		'time'=>'required',
	    'id_user'=>'required|exists:users,id',
	    'id_contact'=>'required|exists:contact,id',
	    'id_client'=>'exists:client,id',
	    'id_subclient'=>'exists:subclient,id'
	);

	public static $rulesEdit = array( 
	);   
	public static function findEditionByMagazine($magazine=null){ 
		return Status::select('edition')->where('magazine', '=', $magazine)->groupBy('edition')->get();  
	}
	public static function findClientStatus($id_client=null,$id_user=null){ 
		return Status::where('id_client', '=', $id_client)->get(); 
	}
	public static function search() {

	    //$q = Input::get('myInputField');

	    $q = 'on en';

	    $searchTerms = explode(' ', $q);

	    $query = DB::table('status');

	    foreach($searchTerms as $term)
	    {
	        $query->where('status', 'LIKE', '%'. $term .'%');
	    } 
	        //$query->where('status', 'LIKE', '%'. $q .'%');
	    return $results = $query->get();

	}
	public static function findStatus($sort=null){ 
		if($sort!=null){
			if(isset($sort['sort']))   
				$order = $sort['sort']; 
			if(isset($sort['date-ini']) && isset($sort['date-end']) && (DateTime::createFromFormat('d-m-Y', $sort['date-ini']) != false && DateTime::createFromFormat('d-m-Y', $sort['date-end']) != false))
					$between = " (date BETWEEN '".date('Y-m-d', strtotime($sort['date-ini']))."' AND '".date('Y-m-d', strtotime($sort['date-end']))."') ";				
			if(isset($sort['magazine'])){
				$id_magazine=$sort['magazine'];    
				if(isset($sort['edition']))
					$id_edition = $sort['edition']; 
			} 
			if(isset($sort['client']))
				$client = $sort['client'];	
			if(isset($sort['executive']))
				$executive = $sort['executive'];	
			if(isset($sort['color']))
				$color = $sort['color']; 	
			if(isset($sort['search']))
				$search = $sort['search']; 
		}
		$query = 'SELECT * FROM status ';
		$where = '';
		// variable $where identifica que field uso el WHERE primero
		if(isset($between)){
			$query .= ' WHERE '.$between; 
			$where = 'between';
		}
		elseif(isset($client)){
			$query .= ' WHERE id_client='.$client;
			$where = 'client';
		}
		elseif(isset($executive)){
			$query .= ' WHERE id_user='.$executive;
			$where = 'executive';
		}	
		elseif(isset($color)){
			$query .= ' WHERE color='.$color;
			$where = 'color';
		}		
		elseif(isset($search)){
			$query .= ' WHERE status LIKE "%'.$search.'%" OR comments LIKE "%'.$search.'%"';
			$where = 'search';
		}	
		elseif(isset($id_magazine)){ 
			if($id_magazine!=0){
				$query .= ' WHERE magazine='.$id_magazine;	
				if(isset($id_edition))
					$query .= ' AND edition='.$id_edition; 
				$where = 'magazine';
			}
		}  
		// agrega un AND por cada field recibido
		if(isset($id_magazine) && ($id_magazine!=0 && $where!='magazine')){
			$query .= ' AND magazine='.$id_magazine; 	
			if(isset($id_edition))
				$query .= ' AND edition='.$id_edition; 		
		}	
		if(isset($client)  && $where!='client' )	
			$query .= ' AND id_client='.$client;
		if(isset($executive)  && $where!='executive' )	
			$query .= ' AND id_user='.$executive;	
		if(isset($color)  && $where!='color' )	
			$query .= ' AND color='.$color;		
		if(isset($search)  && $where!='search' )	
			$query .= ' AND status LIKE "%'.$search.'%" OR comments LIKE "%'.$search.'%"';	
	 

		if(isset($order))
			$query .= ' ORDER BY date '.$order.', time '.$order;  
		else 
			$query .= ' ORDER BY date DESC, time DESC';
		$query;
		return $results = DB::select( DB::raw($query));  
	}
	public function magazineName($id_magazine){
		$magazine = Magazine::find($id_magazine);
		return $magazine->name;
	}
    public function contactName($id_contact){  
	    $contact = Contact::find($id_contact); 
    	return $contact->fullname();
    } 
    public function userName($id_user){ 
	    $user = User::find($id_user); 
    	return $user->fullname();
    }  
    public function clientName($id_client){ 
	    $client = Client::find($id_client); 
    	return $client->name;
    }   
	public function contactList($id_client){     
		$contacts = Contact::where('id_client', '=', $id_client)->get(array('id', 'firstname', 'lastname'));  
	    $contactsRow = array(); 
		$contactsRow[0] = "Contacto con el cliente";
	    foreach ($contacts as $contact) {
	      $contactsRow[$contact->id] =  $contact->fullname() ; 
	    }   
	    return $contactsRow;
    } 
}



