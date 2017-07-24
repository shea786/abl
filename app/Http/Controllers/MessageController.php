<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Inbox;
use Auth;

class MessageController extends Controller
{
    public function index(){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->orderBy('updated_at','desc')->get();
        return view('inbox.index')->withInboxes($inboxes);
    }
    
    public function getMessages($inbox_id){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->get();
        $inboxx = Inbox::find($inbox_id);
        $messages = Message::where('inbox_id','=',$inbox_id)->orderBy("created_at", "ASC")->get();
        
        return view('inbox.showMessages')->withMessages($messages)->withInboxes($inboxes)->withInboxx($inboxx);
    }
    
    public function postMessages(Request $request,$inbox_id){
        $message = new Message;
        $message->inbox_id = $inbox_id;
        $message->user_id = Auth::user()->id;
        $message->message = $request->msginput;
        $message->status = 0;
        $message->save();
        $inbox = Inbox::find($inbox_id);
        $inbox->save();
        
        return redirect()->route('inbox.messages.get',$inbox_id);
    }
}