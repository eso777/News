<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Admin ;
use App\Section ;
use Validator ;

class AdminsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$admins = Admin::paginate(5) ;	
		return view('admin.admins.index' ,compact('admins')) ;
	}

	/**Validator
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$sections = Section::get();
		return view('admin.admins.create' , compact('sections')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		/*dd($bag->all()) ;*/
		// Validation Form Create Admin
	    $validation = Validator::make($bag->all(),Admin::rules('add') ,Admin::msgs()) ;

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput(); ;
		}	    

		// Implode Array Pre To convert string | Hash the password for more secure .
		$bag->merge(['pre'      =>implode('|', $bag->pre)]);
		$bag->merge(['cat_pre'  =>implode('|', $bag->cat_pre)]);
		$bag->merge(['password' =>bcrypt($bag->password)]) ;
		
		// Add New Admin
		Admin::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/admins')->with(['msg'=>'تمت الأضافة بنجاح']) ;
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$admin    = Admin::findOrFail($id);
		$sections = Section::select('id','name')->get();
		$pre      = explode('|' , $admin->pre);
		$cat_pre  = explode('|' , $admin->cat_pre);

		return view('admin.admins.edit' , compact('admin','sections','pre','cat_pre')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag , $id)
	{

		$admin = Admin::findOrFail($id) ;
		
		$validation = Validator::make($bag->all() ,Admin::rules('edit', $admin->id),Admin::msgs()) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput(); ;
		}

		if(!$bag->has('password'))
		{
			// Implode Array Pre To convert string | Hash the password for more secure .
			$bag->merge(['pre'      => implode('|', $bag->pre)]);
			$bag->merge(['cat_pre'  => implode('|', $bag->cat_pre)]);
			// Get Old Password To keep it Without change .
			$bag->merge(['password' => $admin->password ]) ;

			// Update Data For This Admin .
			$admin->update($bag->all()) ;
			return redirect()->to(Url('/').'/admin/admins')->with(['msg'=>'تم حفظ التعديلات بنجاح']);

		} // End IF if Not has a password . 

		// Case two admin Change password || So get a new password to encypt it before added to bag. 
		$bag->merge(['password'=>bcrypt($bag->password)]);
		
		// Implode Array Pre To convert string .
		$bag->merge(['pre'      =>implode('|', $bag->pre)]);
		$bag->merge(['cat_pre'  =>implode('|', $bag->cat_pre)]);
	
		// Update Data For This Admin .
		$admin->update($bag->all()) ;
		return redirect()->to(Url('/').'/admin/admins')->with(['msg'=>'تم حفظ التعديلات بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
