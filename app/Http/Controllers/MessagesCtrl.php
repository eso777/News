<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Messages ;

class MessagesCtrl extends Controller {

	public function getChat()
    {
        return view('admin.chat.index');
    }

    public function saveMessage()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $message = new Messages;
            $message->author = $data["author"];
            $message->message = $data["message"];
            $message->save();
 
            Pusher::trigger('chat', 'message', ['message' => $message]);
        }
 
    }
 	
 	public function listMessages(Messages $message) {
        return response()->json($message->orderBy("created_at", "DESC")->take(5)->get());
    }

}
