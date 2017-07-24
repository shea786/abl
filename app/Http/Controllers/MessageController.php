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
        
    }
}