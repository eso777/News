<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	protected $table    = 'photos';
	protected $fillable = ['name','image'];



  	public static function rules($type = 'add') 
  	{
  		 return 
  		 	[
	  	 		'name'  => 'required',
	  	 		'img'   => 'required' ,
  	 		
  	 		];
  		
  	}
}
