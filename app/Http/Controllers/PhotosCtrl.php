<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Photo ;
use Validator ;

class PhotosCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::paginate(20) ;
		return view('admin.photos.index' , compact('photos')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.photos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{
		
		$validation = Validator::make($bag->all(), Photo::rules('add')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		if($bag->hasFile('img'))
		{

			$dest     = 'uploads/back-end/photos' ;
			$i 		  = 1 ;
			$paths    = '' ;
   			foreach ($bag->file('img') as $file) {
				
				$fileName = time()."$i".'.'.$file->getClientOriginalExtension(); ;
				$file->move($dest , $fileName) ;
				
				$paths .= ($i == 1) ? $fileName : '|'.$fileName ;
			
				$i++ ;					
			}
			$bag->merge(['image' => $paths]) ;
		}
	//	dd($bag->image) ;
		Photo::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/photos')->with(['msg'=>'تمت الأضافة بنجااح .']);
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
		/*$page = */
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

}
