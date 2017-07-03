<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Inbox;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //validation
        $this->validate($request, [
            'msginput' => 'required',
        ]);
       
        
        $inbox = Inbox::where('friend_id','=',$id)->first();
        if(count($inbox) != 1){
            $inbox = new Inbox;
            $inbox->user_id = Auth::user()->id;
            $inbox->friend_id = $id;
            $inbox->save();
            
            $friend_inbox = new Inbox;
            $friend_inbox->user_id = $id;
            $friend_inbox->friend_id = Auth::user()->id;
            $friend_inbox->save();
        }
        $message = new Message;
        $message->msg_from = Auth::user()->id;
        $message->msg_to = $id;
        $message->message = $request->msginput;
        $message->status = 0;
        $message->save();
        
        
        //redirect
        return redirect()->route('inbox.index',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
