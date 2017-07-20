<?php
//https://code.tutsplus.com/tutorials/build-a-real-time-chat-application-with-modulus-and-laravel-5--cms-24284
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Message;
use App\Inbox;

class TestMessagesController extends Controller
{
    public function index(){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->orderBy('updated_at','desc')->get();
        return view('test.messages.index')->withInboxes($inboxes);
    }
    
    public function getInboxes(){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->get();
        $data = $inboxes;
        return response()->json($data);
    }
    
    public function getMessages($friend_id){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->get();
        $inbox_id = $_GET['id'];
        $inboxx = Inbox::find($inbox_id);
        $messages = Message::where('inbox_id','=',$inbox_id)->orderBy("created_at", "ASC")->get();
        
        return view('test.messages.show')->withMessages($messages)->withInboxes($inboxes)->withInboxx($inboxx);
    }
    
    public function postMessages(Request $request,$friend_id){
        $inbox_id = $request->iid;
        $message = new Message;
        $message->inbox_id = $inbox_id;
        $message->user_id = Auth::user()->id;
        $message->message = $request->msginput;
        $message->status = 0;
        $message->save();
        $inbox = Inbox::find($inbox_id);
        $inbox->save();
        
        /*
        $data = array(
          'status' => 'success'
      );
        
        return response()->json($data);
        */
        return redirect()->route('test.messages.index');
    }
}
