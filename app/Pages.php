<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {

	protected $table    = 'pages'; 
	protected $fillable = ['page_name','content'] ;

	public static function rules($type = 'add', $id = null)
	{
		return 
				[
					'page_name'  => "required|min:3|unique:pages,page_name,$id",
					'content'    => 'required|min:20',
			    ] ; 
	}

	public static function msgs()
	{
		return  
				[
					'page_name.required' => 'يجب تحديد أسم مناسب للصفحة .',
					'type_name.min'      => 'يجب الأ يقل الأسم عن ثلاثة أحرف',
					'type_name.unique'   => 'عفوا هذا الأسم مستخدم بالفعل ',
					'content.required'   => 'يجب ادخال محتوي الصفحة'
				];
	}

}
