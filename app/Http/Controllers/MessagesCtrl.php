<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Messages ;

class MessagesCtrl extends Controller {


    public function getChat()
    {
       $tests = Messages::get();
        return view('admin.chat.index' ,compact('tests')) ;
    } 
	public function ajax()
    {   
        
        ini_set('max_execution_time',7200);
      
        while (Messages::where('status',0)->count() < 1) {
            usleep(1000);
        }
        if(Messages::where('status',0)->count() > 0)
        {
            $data = Messages::where('status',0)->first();
            $id   = $data->id ;
            $edit = Messages::find($id);
            $edit->status = 2 ; 
            $edit->save();
          
            return response()->json([
                'message' => $data->message  
            ]);
        }

    }

    public function store(Request $bag)
    {
        $table  = new Messages ;
        $table->message = $bag->msg;
        $table->save();
    }
 	

}
