<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Inbox;
use App\User;
use Auth;

class MessageController extends Controller
{
    public function index(){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->orderBy('updated_at','desc')->get();
        return view('inbox.index')->withInboxes($inboxes);
    }
    
    public function getMessages($inbox_id){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->orderBy('updated_at','desc')->get();
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
        $inbox->touch();
        
        return redirect()->route('inbox.messages.get',$inbox_id);
    }
    
    public function create(){
        $inboxes = Inbox::where('user_one','=',Auth::user()->id)->orWhere('user_two','=',Auth::user()->id)->orderBy('updated_at','desc')->get();
        $users = User::where('id','<>',Auth::user()->id)->get();
        return view('inbox.create')->withInboxes($inboxes)->withUsers($users);
    }
    
    public function store(Request $request){
        
        if($inbox = Inbox::where('user_one','=',Auth::user()->id)->where('user_two','=',$request->user_id)->orwhere('user_one','=',$request->user_id)->where('user_two','=',Auth::user()->id)->first()){
            
        }else{
            $inbox = new Inbox;
            $inbox->user_one = Auth::user()->id;
            $inbox->user_two = $request->user_id;
            $inbox->save();
        }
        return redirect()->route("inbox.messages.get",$inbox->id);
    }
}