<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Section ; 
use Validator;
class SectionsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sections = Section::paginate(20) ;
		return view('admin.sections.index' ,compact('sections')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.sections.create') ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{
		
		// Validation Form Create Admin
		$rules =[
					'name'     => 'required|min:3',
					'desc'     => 'required|min:15',
			    ] ;
		$msgs = 
				[ 
					'name.required'     => 'يجب تحديد أسم للقسم.',
					'name.min'          => 'يجب الأ يقل الاسم عن ثلاثة أحرف.',
					'desc.required'     => 'يجب وضع وصف مختصر عن القسم.',
					'desc.min'          => 'يجب ألا يقل الوصف عن خمسة عشر حرفا.',
			    ];	
	    // Make New Validation For All Request .			 	    
	    $validation = Validator::make($bag->all(), $rules ,$msgs) ;

	    // Send Validation To View.
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation) ;
		}	

		// Save Data in a Data base 
		 Section::create($bag->all());
		// Redirect To Sections Home page | With Message Succssfully.
		return redirect()->to(Url('/').'/admin/sections')->with(['msg'=>'تم أضافة القسم بنجاح.']);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	

		$section = Section::findOrFail($id) ;
		return View('admin.sections.edit' , compact('section')) ;

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag , $id)
	{
		// Validation Form Create Admin
		$rules =[
					'name'     => 'required|min:3',
					'desc'     => 'required|min:15',
			    ] ;
		$msgs = 
				[ 
					'name.required'     => 'يجب تحديد أسم للقسم.',
					'name.min'          => 'يجب الأ يقل الاسم عن ثلاثة أحرف.',
					'desc.required'     => 'يجب وضع وصف مختصر عن القسم.',
					'desc.min'          => 'يجب ألا يقل الوصف عن خمسة عشر حرفا.',
			    ];	

	    // Make New Validation For All Request .			 	    
	    $validation = Validator::make($bag->all(), $rules ,$msgs) ;

	    // Send Validation To View.
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation) ;
		}	
		

		Section::findOrFail($id)->update($bag->all()); 
		return redirect()->to(Url('/').'/admin/sections')->with(['msg' => 'تم حفظ التعديلات .']) ;

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Section::findOrFail($id)->delete();
		return redirect()->to(Url('/').'/admin/sections')->with(['msg' => 'تم الحذف بنجاح .']) ;
	}

}
