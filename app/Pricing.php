<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model {

	protected $table = 'pricings'; 
	protected $fillable = ['type_name','price'] ;

	public static function rules($type = 'add')
	{
		return 
				[
					'type_name'=> 'required|min:3|unique:Pricings',
					'price'    => 'required|min:3|numeric',
			    ] ; 
	}

	public static function msgs()
	{
		return  
				[
					'type_name.required' => 'يجب تحديد نوع المقالة .',
					'type_name.min'      => 'يجب الأ يقل الأسم عن ثلاثة أحرف',
				];
	}

}

