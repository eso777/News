<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon ;
class Articles extends Model {

	//
	use SoftDeletes;
	protected $softDelete = true; 
	protected $table = 'articles';
	protected $fillable = ['name','content','status','writer','tags','images','categories_id','atricle_type','views','choosen','notes','main_slider','slug','update_by','published_at','deleted_at'];
	protected $dates = ['published_at','deleted_at'];

	public function setPublishedAtAttribute($date)
	{
		$date =  str_replace(' PM', ':00',$date);
		$date =  str_replace(' AM', ':00',$date);
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	public function scopePublished($query)
	{
		$query->where('published_at','<=',Carbon::now())->where('status',1);
	}

	public function scopeUnPublished($query)
	{
		$query->where('published_at','>=',Carbon::now());
	}

	public static function rules($type = 'add')
	{
		
		return [
	    		'name' => 'required|min:5',
	    		'content' => 'required|min:10',
			   ];
	}

	public static function translate()
	{
		return [
			    'name.required' => 'يجب ادخال الاسم ',
			    'name.min' => 'يجب أن لا يقل الاسم عن 5 حروف',
			    'content.min' => 'يجب أن لا يقل المحتوى عن 10 حروف',
			    'content.required' => 'يجب ادخال المحتوي',
			    'tags.required' => 'يجب ادخال الكلمات الدلالية',
		];
	}


}
