<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\JournalistsAcc ;
use App\Section ;
use App\Admin ;
/*use Image ;*/
use Validator ;
use Auth ;

class JournalistsAccCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$userActived  =  JournalistsAcc::where('status',1)->count() ;
		$userDisabled =  JournalistsAcc::where('status',0)->count() ;
		$accounts	  = JournalistsAcc::paginate(5) ;
		
		return view('admin.journalistsAcc.index' , compact('accounts' , 'userActived' ,'userDisabled')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$pre = Admin::where('id',Auth::admin()->get()->id)->select('pre')->first() ; 
		$arr = explode('|', $pre->pre) ;

		if(in_array('members_add', $arr))
		{
			// Get Sections for make premissions .
			$sections = Section::get() ;
			return view('admin.journalistsAcc.create' , compact('sections')) ;
		}

			return redirect()->back()->with(['msg' => 'عفوا , غير مسموح بأضافة صحفيين جدد .']) ;

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	

		
		$validation = Validator::make($bag->all(),JournalistsAcc::rules('add'),JournalistsAcc::msgs());
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		// Start Upload Image .
		$dest      = 'uploads/back-end/journalistsAcc/' ;
		$fileName  = time().'.'.$bag->file('img')->getClientOriginalExtension() ;
		$bag->file('img')->move($dest,$fileName);
		$bag->merge(['image' => $fileName]) ; 
		
		//var_dump($bag->img) ;
			// Image Proccess Re-size img .
				/*$img = Image::make($dest.$file_name);
				$img = Image::
				$img->resize(300, 200);
				$img->save('uploads/hotels/logo/thumb/'.$file_name);*/
			// Image Proccess Re-size img .

		// End Upload Image ..
		if($bag->type_acc == 0)
		{
			$bag->merge(['price'  => null]) ;
			$bag->merge(['target' => null]) ;
		}
		$bag->merge(['sections_controls'=>implode('|', $bag->sections_controls)]) ;
		$bag->merge(['password'=>bcrypt($bag->password)]) ;

		/*dd($bag->all()) ;*/
		JournalistsAcc::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/Journalists/acc')->with(['msg'=>'تمت الأضافة بنجاح.']) ;		

	}

	public function edit($id)
	{	

		$pre = Admin::where('id',Auth::admin()->get()->id)->select('pre')->first() ; 
		$arr = explode('|', $pre->pre) ;

		if(in_array('members_edit', $arr))
		{
			$jourAcc           =  JournalistsAcc::findOrFail($id);
			$sections     	   =  Section::get() ;
			$sections_controls =  explode('|',$jourAcc->sections_controls );
 
			return view('admin.journalistsAcc.edit', compact('jourAcc','sections_controls','sections')) ;
		}

			return redirect()->back()->with(['msg' => 'عفوا , غير مسموح بالتعديل علي أيا من الصحفيين .']) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag ,$id)
	{
		$validation = Validator::make($bag->all(),JournalistsAcc::rules('edit',$id),JournalistsAcc::msgs());
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}
		$journalistsAcc = JournalistsAcc::findOrFail($id) ;

		if($bag->hasFile('img'))
		{
			
			$dest      = 'uploads/back-end/journalistsAcc/' ;
			$fileName  = time().'.'.$bag->file('img')->getClientOriginalExtension() ;
			$bag->file('img')->move($dest,$fileName);
			$bag->merge(['image' => $fileName]) ; 
		}

		if($bag->has('password') )
		{
			$bag->merge(['password'=> bcrypt($bag->password)]) ;
		}else
		{
			$bag->merge(['password'=> $journalistsAcc->password]) ;
		}

		// IF admin change type account 
		if($bag->type_acc == 0)
		{
			$bag->merge(['price'  => null]) ;
			$bag->merge(['target' => null]) ;
		}
		// IF admin change type account 
		$bag->merge(['sections_controls'=>implode('|', $bag->sections_controls)]) ;

		// Make Update Request all .
		$journalistsAcc->update($bag->all()) ;
		return redirect()->to(Url('/').'/admin/Journalists/acc')->with(['msg'=>'تمت حفظ التعديلات.']) ;		
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function statusUsers($id)
	{
		$pre = Admin::where('id',Auth::admin()->get()->id)->select('pre')->first() ; 
		$arr = explode('|', $pre->pre) ;

		if(in_array('members_active', $arr))
		{
			$find   = JournalistsAcc::where('id', $id)->select('status')->first() ;
			JournalistsAcc::where('id', $id)->update(['status' => ($find->status == 0)?1:0]) ;
		 	return redirect()->to(Url('/').'/admin/Journalists/acc')->with(['msg'=>'تمت حفظ التعديلات.']) ;		 		
		}

		// Redirect To Back with Message .
		return redirect()->back()->with(['msg' => 'عفوا , غير مسموح بهذة العملية.']) ;
	}

}
