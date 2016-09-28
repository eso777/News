<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table    = 'admins' ;
    protected $fillable = ['name', 'email', 'password','pre', 'cat_pre'];
		
	protected $hidden   = ['password'];

	public static function rules($type = 'add', $id = null)
	{
		return 
				[
					'name'     => 'required|min:4',
					'pre'	   => 'required',
					'cat_pre'  => 'required',
					'email'    => ($type == 'add')?"required|email|unique:admins" : "required|email|unique:admins,email,$id",
					'password' => ($type == 'add')?'required|min:6':'min:6'				
			    ] ; 
	}

	/* Start Function messages For Errors return  */
	public static function msgs()
	{
		return  
				[ 
					'name.required'     => 'يجب تحديد أسم للمدير.',
					'name.min'          => 'يجب الأ يقل الاسم عن اربع حروف.',
					'password.required' => 'يجب أدخال كلمة السر.',
					'password.min'      => 'كلمة السر يجب الا تقل عن 6 حروف او ارقام.',
					'email.required'    => 'يجب أدخال البريد الألكتروني.',
					'email.unique'      => 'البريد الألكتروني غير متاح.',
					'email.email'       => 'يجب ان يكون البريد الألمتروني صالح',
					'pre.required'      => 'يجب تحديد صلاحيات للمدير.',
					'cat_pre.required'  => 'يجب تحديد صلاحيات الأقسام.'
			    ];	 
	}
	/* End Function messages For Errors return  */

}
// End class
