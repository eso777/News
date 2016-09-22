<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Section;
use App\Pricing;
use App\Articles;
use App\JournalistsAcc;

use Validator;

class ArticlesCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Articles::Published()->paginate(20);
		return View('admin.articles.index',compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$type = 'add';
		$prices = Pricing::lists('type_name','id');
		$writers = JournalistsAcc::lists('fname','id');
		return View('admin.articles.create',compact('type','prices','writers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// Validation Form 
	    $validation = Validator::make($request->all(),Articles::rules('add'),Articles::translate());

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput(); ;
		}
		dd($request->all());
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	public function categories($id)
	{
		$accounts = JournalistsAcc::find($id);
		$categories = explode('|', $accounts->sections_controls);	 
		$i = 0;
		$data = [];
		foreach ($categories as $cat) {
			$data[$i]['id'] = $cat;
			$data[$i]['name'] = Section::find($cat)->name;
			$i++;
		}
		return Response()->json([$data]);	
	}

}
