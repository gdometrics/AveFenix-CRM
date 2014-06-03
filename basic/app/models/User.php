<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	// Use fillable as a white list
    protected $fillable = array('firstname', 'lastname', 'email', 'password', 'phone1', 'phone2', 'job', 'level','photo');

    protected $softDelete = true;

	public static $rules = array(
	   'firstname'=>'required|min:2',
	   'lastname'=>'required|min:2',
	   'email'=>'required|email|unique:users',
	   'password'=>'required|alpha_num|between:6,12|confirmed',
	   'password_confirmation'=>'required|alpha_num|between:6,12',
	   'phone1'=>'required|alpha_num|min:7',
	   'phone2'=>'alpha_num|min:7'
	);
	public static $rulesEditUser = array(
	   'firstname'=>'required|min:2',
	   'lastname'=>'required|min:2',
	   'email'=>'required|email',
	   'password'=>'required|alpha_num|between:6,12|confirmed',
	   'password_confirmation'=>'required|alpha_num|between:6,12',
	   'phone1'=>'required|alpha_num|min:7',
	   'phone2'=>'alpha_num|min:7'
	);
	public static $rulesEdit = array(
	   'job'=>'min:2'
		);
	public static $level = array(
    		0 => 'Inactivo',
    		1 => 'Gerente',
    		2 => 'Ejecutiva'
    	); 
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	} 
	public function fullname() {
    	return $this->firstname . ' ' . $this->lastname;
	}	
	public function clients(){
        return $this->hasMany('Client', 'id_user'); 
    } 
    public function level(){  
    	if($this->level == 1)
    		return 'manager';
    	else 
    		return 'executive';
    }
    public function getRememberToken()
	{
	    return $this->remember_token;
	} 
	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	} 
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}