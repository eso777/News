<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Settings;
use App\Admin;
use Auth ;

class SettingsCtrl extends Controller {
	

	public function index()
	{	
		$check = Auth::admin()->get()->pre ;
		
 		if(in_array('settings', explode('|', $check)))
		{
			$settings = Settings::first();
            $themes = [] ;
            $d = opendir(base_path('resources/views/themes'));
            $i = 0 ;

            while (false !== ($entry = readdir($d))) {
             if($entry !== '.' && $entry !== '..')
             {
                 $themes[$entry] = $entry ;
                 $i++ ;
             }
            }

            return view('admin.settings' , compact('settings','themes')) ;
        }

		return redirect()->to(Url('/').'/admin')->with(['msgErr'=>'عفوا , غير مسموح بزيارة هذة الصفحة']);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request , $id)
	{
		$data = $request->all();
     
	    Settings::findOrFail($id)->update($data);

        return redirect()->to(Url('/').'/admin/settings')->with(['msg'=>'تم حفظ التعديلات بنجاح']); 
	
	}

	

}
