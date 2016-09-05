<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalistsAcc extends Model {

	protected $table    = 'journalists_accs' ;
	protected $fillable = ['fname', 'lname', 'type_acc','status','price','target', 'image', 'email', 'password', 'sections_controls'];
		
	protected $hidden   = ['password'];

	public static function rules($type = 'add', $id = null)
	{
		
		return [
					'fname'     		=> 'required|min:4',
					'lname'     		=> 'required|min:4',
					'img'				=> ($type == 'add')?'required':'',
					'sections_controls' => 'required',
					'email'    			=> "required|email|unique:journalists_accs,email,$id",
					'password' 			=> ($type == 'add')?'min:6|required':'min:6',					
			    ] ;
						
	}
	// End 

	// Start Messages Function
	public static function msgs()
	{
		return  
				[
					'fname.required'     		 => 'يجب تحديد الأسم الاول.',
					'lname.required'     		 => 'يجب تحديد الأسم الأخير.',
					'fname.min'          		 => 'يجب الأ يقل الاسم الأول عن اربع حروف.',
					'lname.min'          		 => 'يجب الأ يقل الاسم الأخير عن اربع حروف.',
					'password.required'  		 => 'يجب أدخال كلمة السر.',
					'password.min'       		 => 'كلمة السر يجب الا تقل عن 6 حروف او ارقام.',
					'email.required'     		 => 'يجب أدخال البريد الألكتروني.',
					'email.unique'       		 => 'البريد الألكتروني غير متاح.',
					'email.email'        		 => 'يجب ان يكون البريد الألمتروني صالح',
					'sections_controls.required' => 'يجب تحديد الأقسام المسموح بها لهذا الصحفي .',
					
			    ];	 
	}

}
