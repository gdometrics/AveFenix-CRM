<?php

class UsersController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout = "layouts.default"; 

	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
   	   $this->beforeFilter('auth', array('only'=>array('getExecutive', 'getManager')));
	}

	public function getLogin() {
	    if (Auth::check()){
	    	 if(Auth::user()->level==2){
		     	return Redirect::to('users/executive')->with('confirmation', '¡Bienvenido!');
	    	 }else if(Auth::user()->level==1){
		     	return Redirect::to('users/manager')->with('confirmation', '¡Bienvenido!');
	    	 }else{
				return Redirect::to('home')->with('message', 'Debes iniciar sesión para continuar.');		
	    	 }
		} else{
	    	return Redirect::to('home')->with('message', 'Debes iniciar sesión para continuar.');	
		}	
	}

	public function postSignin() {
	    if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) { 
	   		if(Auth::user()->level==2){
		     	return Redirect::to('users/executive')->with('confirmation', '¡Bienvenido!');
	    	 }else if(Auth::user()->level==1){
		     	return Redirect::to('users/manager')->with('confirmation', '¡Bienvenido!');
	    	 }else{
				return Redirect::to('home')->with('message', 'Debes iniciar sesión para continuar.');		
	    	 }
		}
		else { 
		    return Redirect::to('home')->with('message', 'Tu combinación de usuario y contraseña es incorrecta.')->withInput();
		}      
	}

	public function getLogout() {
	   Auth::logout();
	   return Redirect::to('home')->with('message', '¡Tu sesión ha sido cerrada!');
	}

	public function getExecutive($section=null,$val=null) {  
		if(Auth::user()->level==2){
			if ($section == 'contacts') {  
				$contactList = Contact::findUserContacts(Auth::user()->id); 
				$contact = new Contact; 
		   		$this->layout->content = View::make('pages.contacts', array('contacto' => $contact, 'contacts' => $contactList, 'clients' => $contact->clientList(Auth::user()->id) ));
			} elseif($section == 'status'){   
				$client = Client::findUserClient($val, Auth::user()->id); 
				if(!$client) 
	   				return Redirect::to('users/executive');  
				$contacts = Contact::findClientContacts($client["id"]);
				$magazine = Magazine::listMagazine();  
				$_GET['client']=$val;
				$status = Status::findStatus($_GET); 
				$edition = range(0,200); $edition [0] = 'Edición';
				$stat = new Status; 
	   			$this->layout->content = View::make('pages.status', array('estatus' => $stat, 'client' => $client, 'contacts' => $contacts, 'magazine' => $magazine, 'status' => $status, 'edition' => $edition));
			}elseif($section == 'clients'){ 
				$clientsList = Client::findUserClients(Auth::user()->id);   
	   			$this->layout->content = View::make('pages.executive', array('clients' => $clientsList ));
			}else{   
				$_GET['executive']=Auth::user()->id;
				$status = Status::findStatus($_GET); 
				$clientsList = Client::findClientsList(Auth::user()->id); 
				$magazine = Magazine::listMagazine();   
				$stat = new Status; 
	   			$this->layout->content = View::make('pages.statusExecutive', array('estatus' => $stat, 'magazine' => $magazine, 'status' => $status, 'clients' => $clientsList));
			}

		}else{
			return Redirect::to('home')->with('message', 'Debes iniciar sesión para continuar.');		
		}  
	}

	public function getManager($section=null) {  
		if(Auth::user()->level==1){
			if ($section == 'clients') {	 
				$clients = Client::findParentClients(); 
				$executive = new Client; 
		   		$this->layout->content = View::make('pages.clients', array('clients' => $clients, 'users' => $executive->executiveList() ));
			} elseif ($section == 'contacts') {  
				$contacts = Contact::all(); 
				$contact = new Contact; 
		   		$this->layout->content = View::make('pages.contacts', array('contacto' => $contact, 'contacts' => $contacts, 'clients' => $contact->clientList() ));
			} elseif ($section == 'users') {  
				$users = User::all();
		   		$this->layout->content = View::make('pages.users', array('users' => $users ));
			} else{       
				$status = Status::findStatus($_GET);
				$clientsList = Client::findClientsList(); 
				$executive = new Client; 
				$magazine = Magazine::listMagazine();
				$stat = new Status; 
		   		$this->layout->content = View::make('pages.statusManager', array('estatus' => $stat, 'status' => $status, 'magazine' => $magazine, 'clients' => $clientsList, 'executive' => $executive->executiveList()));
			}
		}else{
			return Redirect::to('home')->with('message', 'Debes iniciar sesión para continuar.');		
		} 
	}

	public function postCreate() {
	   $validator = Validator::make(Input::all(), User::$rules);
	   $data = Input::all();
	   
	   if ($validator->passes()) {
	       $user = new User;  
		   $user->fill($data); 
		   $user->password = Hash::make(Input::get('password')); 
		   $user->birthdate = date("Y-m-d", strtotime( Input::get('birthdate')));
		   $user->save();
		   return Redirect::to('home')->with('confirmation', '¡Gracias por registrarte, tu perfil sera validado por un administrador!');
	   } else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url'))->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   }
	}

	public function postEdit($id=null){
	 	$validator = Validator::make(Input::all(), User::$rulesEdit);

	   	$data = Input::all();
	    $user = User::find($id);  
	    if (is_null ($user)){ 
			App::abort(404); 
		} 
	 	if ($validator->passes()) {
		   $user->fill($data); 
		   $user->save(); 
		   return Redirect::to(Input::get('url').'#'.$user->id)->with('confirmation', '¡Los datos de '.$user->firstname.' '.$user->lastname.' fueron actualizados!');
	 	} else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url').'#edit'.$user->id)->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   	}
	}
	public function postStore($id=null){
	 	$validator = Validator::make(Input::all(), User::$rulesEditUser);

	   	$data = Input::all();
	    $user = User::find($id);  
	    if (is_null ($user)){ 
			App::abort(404); 
		} 
	 	if ($validator->passes()) {
	 	   $oldFileName = $user->photo;
		   $user->fill($data); 
		   if (Input::hasFile('photo'))
			{   
			   // Get the image input
   			   $file = Input::file('photo');
   			   // Save image and crop it 
   			   $photoName = Client::saveImg($file);
   			   // Store photos name
			   $user->photo = $photoName; 
			}
			else
			{ 
			   $user->photo = $oldFileName; 
			}
		   $user->password = Hash::make(Input::get('password')); 
		   $user->birthdate = date("Y-m-d", strtotime( Input::get('birthdate')));
		   $user->save(); 
		   return Redirect::to(Input::get('url'))->with('confirmation', '¡Los datos de '.$user->firstname.' '.$user->lastname.' fueron actualizados!');
	 	} else {
	       // validation has failed, display error messages   
	   	   return Redirect::to(Input::get('url').'#perfilEdit')->with('message', 'Debes corregir los siguientes campos:')->withErrors($validator)->withInput();
	   	}
	}
}