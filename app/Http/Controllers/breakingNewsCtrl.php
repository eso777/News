<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\breaking_news ;
use Validator ;
class breakingNewsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 	$news = breaking_news::paginate(5); 
	 	return view('admin.breakingNews.index' , compact('news')) ;

  	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.breakingNews.create') ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{
		// Validation Form 
	    $validation = Validator::make($bag->all(),breaking_news::rules('add') ,['title.required' => 'يبدو ان عنوان الخبر فارغ , من فضلك اضف عنوان للخبر .']) ;

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput(); ;
		}	  

		breaking_news::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/breaking-news')->with(['msg'=>'تمت أضافة الخبر .']) ;		
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

		$breakingNews = breaking_news::findOrFail($id) ;
		return view('admin.breakingNews.edit', compact('breakingNews')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag , $id)
	{
		// Validation Form 
	    $validation = Validator::make($bag->all(),breaking_news::rules('edit') ,['title.required' => 'يبدو ان عنوان الخبر فارغ , من فضلك اضف عنوان للخبر .']) ;

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput(); ;
		}	  

		$findById = breaking_news::findOrFail($id)->update($bag->all()) ;
		return redirect()->to(Url('/').'/admin/breaking-news')->with(['msg'=>'تم حفظ التعديلات.']) ;	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		breaking_news::findOrFail($id)->delete();
		return redirect()->to(Url('/').'/admin/breaking-news')->with(['msg'=>'تم حفظ الخبر.']) ;	
	}

}
