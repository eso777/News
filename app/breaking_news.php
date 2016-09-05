<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class breaking_news extends Model {

	protected $tabel    = 'breaking_news' ;
	protected $fillable = ['title','content'];


	public static function rules($type = 'add')
	{
		
		return 
				[
					'title' => 'required|min:10',
				];
	}
}
