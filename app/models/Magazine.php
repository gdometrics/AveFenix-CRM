<?php

Class Magazine extends Eloquent{ 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'magazine';
	// Use fillable as a white list
    protected $fillable = array('name', 'photo');

    protected $softDelete = true;

	public static $rules = array( 
	); 
	public static function listMagazine(){     
		$magazines = Magazine::all(array('id', 'name'));  
	    $magazineRow = array(); 
		$magazineRow[0] = "Revista";
	    foreach ($magazines as $magazine) {
	      $magazineRow[$magazine->id] =  $magazine->name ; 
	    }   
	    return $magazineRow;
    } 
}



