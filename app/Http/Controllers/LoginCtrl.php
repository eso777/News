<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth ;

class LoginCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getShowAdmin()
	{	
		if(Auth::admin()->check() == false)
		{	

			return view('admin.login') ;
		}
			
		return redirect()->intended('/admin');	
				
	}

	public function postAdminLogin(Request $bag)
	{
		if(Auth::admin()->check() == true)
		{	
			
			return redirect()->to(Url('/').'/admin');
		}

		if(Auth::admin()->attempt(['email' => $bag->email , 'password' => $bag->password ]))	
		{
			return redirect()->intended('/admin');	
		}
		
		return redirect()->back()->withErrors(['يوجد خطأ في البريد الألكتروني أو كلمة المرور .']);



	}

	public function adminLogout(){

		
		@Auth::admin()->logout() ;
		return redirect()->to(Url('/').'/admin/login') ;

	}
	

}
