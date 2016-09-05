<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Pages ;
use Validator ;

class PagesCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Pages::paginate(5) ;
		return view('admin.pages.index' , compact('pages')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pages.create') ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		// Make Validation Form
		$validation = Validator::make($bag->all(),Pages::rules('add'), Pages::msgs());

		if ($validation->fails())
		{
			// Rdirect To main page with All Error .
			return redirect()->back()->withErrors($validation)->withInput();
		}

		Pages::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/pages')->with(['msg'=>'تم حفظ الصفحة بنجاح.']);

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
		$page = Pages::findOrFail($id) ;
		return view('admin.pages.edit' , compact('page')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag, $id)
	{	
		// Make Validation Form
		$validation = Validator::make($bag->all(),Pages::rules('edit',$id), Pages::msgs());

		if ($validation->fails())
		{
			// Rdirect To main page with All Error .
			return redirect()->back()->withErrors($validation)->withInput();
		}
		// Get Old Data To update It .
		$pageData = Pages::findOrFail($id);
		$pageData->update($bag->all()) ;

		// Redirect To Page HOme .With Succssfully Edited Message .
		return redirect()->to(Url('/').'/admin/pages')->with(['msg'=>'تم حفظ التعديلات بنجاح']);
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
