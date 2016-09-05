<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Pricing ;
use Validator ;

class PricingCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pricing = Pricing::paginate(5) ;
		return view('admin.pricing.index' , compact('pricing')) ; 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pricing.create') ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{
		$validation = Validator::make($bag->all(),Pricing::rules('add'),Pricing::msgs());
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		Pricing::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/pricing')->with(['msg'=>'تمت الأضافة']) ;
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
		$data = Pricing::findOrfail($id) ;
		return view('admin.pricing.edit' , compact('data')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag , $id)
	{
		
		$validation = Validator::make($bag->all(),Pricing::rules('add'),Pricing::msgs());
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}
		// Get Data To Update it .
		$data = Pricing::findOrfail($id) ;
		$data->update($bag->all());
		
		// Return To Pricing page . 
		return redirect()->to(Url('/').'/admin/pricing')->with(['msg'=>'تمت حفظ التعديلات']) ;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Pricing::findOrfail($id)->delete() ;
		return redirect()->to(Url('/').'/admin/pricing')->with(['msg'=>'تمت الحذف بنجاح']) ;
	}

}
