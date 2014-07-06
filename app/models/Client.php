<?php

Class Client extends Eloquent{ 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'client';
	// Use fillable as a white list
    protected $fillable = array('name', 'razonsocial', 'business', 'address1', 'address2' ,'phone1', 'phone2', 'rif', 'email', 'photo', 'webpage', 'id_user', 'id_parent');

    protected $softDelete = true;

	public static $rules = array(
		'name'=>'required|min:2',
		'razonsocial'=>'required|min:2',
		'business'=>'required|min:2',
		'address1'=>'required|min:2',
		'address2'=>'min:2',
		'phone1'=>'required|alpha_dash|min:7',
		'phone2'=>'alpha_dash|min:7',
		'rif'=>'required|alpha_dash|min:6|unique:client',
	    'email'=>'required|email|unique:client',
	    'id_user'=>'required|exists:users,id' 
	);

	public static $rulesEdit = array(
		'name'=>'required|min:2',
		'razonsocial'=>'required|min:2',
		'business'=>'required|min:2',
		'address1'=>'required|min:2',
		'address2'=>'min:2',
		'phone1'=>'required|alpha_dash|min:7',
		'phone2'=>'alpha_dash|min:7',
		'rif'=>'required|alpha_dash|min:6',
	    'email'=>'required|email',
	    'id_user'=>'required|exists:users,id'
	);

	public static $rulesEditChild = array(
		'name'=>'required|min:2', 
		'business'=>'min:2',
		'address1'=>'min:2',
		'address2'=>'min:2',
		'phone1'=>'alpha_dash|min:7',
		'phone2'=>'alpha_dash|min:7', 
	    'email'=>'email',
	    'id_user'=>'exists:users,id' 
	);
	public static function findParentClients(){
		return Client::where('id_parent', '=', null)->get();
	}
	public static function findChildClients($id_client=null){
		return Client::where('id_parent', '=', $id_client)->get();
	}
	public static function saveImg($file){ 
		$date = new DateTime();
		$now = $date->getTimestamp(); 
		$destinationPath    = 'photos/'; // The destination were you store the image.
		$filename           = $file->getClientOriginalName(); // Original file name that the end user used for it.
		$mime_type          = $file->getMimeType(); // Gets this example image/png
		$extension          = $file->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
		$newNameFile        = $destinationPath.'/'.$now.'.'.$extension;
		$upload_success     = $file->move($destinationPath, $now.'.'.$extension); // Now we move the file to its new home. 
		$img 				= Image::make($newNameFile);
		$height 			= $img ->height();
		$width 				= $img ->width();
		($width>=$height)?$cropsize=$height:$cropsize=$width;
		$img->crop($cropsize, $cropsize)->save($newNameFile);
		if($cropsize>=300)
			$img->resize(300, 300)->save($newNameFile);
		return $now.'.'.$extension;
	}
	public function findRif($client=null){
		$result = Client::find($client["id_parent"], array('rif')); 
		return $result->rif;
	}
	public function contacts(){
        return $this->hasMany('Contact', 'id_client'); 
    }
	public static function findUserClients($id_user=null){
        return Client::where('id_user', '=', $id_user)->get();
    }  
	public static function findClientsList($id_user=null){
		if($id_user==null)
			$clients = Client::get(array('id', 'name')); 
		else 
			$clients = Client::where('id_user', '=', $id_user)->get(array('id', 'name')); 

		    $clientsRow = array(); 
			$clientsRow[0] = "Clientes";
		    foreach ($clients as $client) {
		      $clientsRow[$client->id] =  $client->name ; 
		    }   
		    return $clientsRow; 
    }  
	public static function findUserClient($id_client=null ,$id_user=null){ 
		return Client::where('id', '=', $id_client)->where('id_user', '=', $id_user)->first();  
    }   
    public function executiveName(){  
        $name = User::find($this->id_user, array('firstname','lastname'));  
        return $name['firstname'].' '.$name['lastname'];   
    }  
	public function executiveList(){     
		$users = User::where('level', '>', '0')->get(array('id', 'firstname', 'lastname') );  
	    $usersRow = array(); 
		$usersRow[0] = "Responsable por el cliente";
	    foreach ($users as $user) {
	      $usersRow[$user->id] =  $user->fullname() ; 
	    }   
	    return $usersRow;
    } 
}



