<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Notifications\UserEdited;

/*
flash('Message')->success(): Set the flash theme to "success".
flash('Message')->error(): Set the flash theme to "danger".
flash('Message')->warning(): Set the flash theme to "warning".
flash('Message')->overlay(): Render the message as an overlay.
flash()->overlay('Modal Message', 'Modal Title'): Display a modal overlay with a title.
flash('Message')->important(): Add a close button to the flash message.
flash('Message')->error()->important(): Render a "danger" flash message that must be dismissed.
*/


class adminUsersController extends Controller
{
    public function index(){
        //get all data from the users table
        $users = User::withAnyStatus()->get();
        //display all of the users | with all status
        return view('admin.users.index')->withUsers($users);
    }
    
    public function create(){
        
    }
    
    public function store(Request $request){
        
    }
    
    public function edit($id){
        $user = User::withAnyStatus()->find($id);
        return view('admin.users.edit')->withUser($user);
    }
    
    public function update(Request $request,$id){
        $user = User::withAnyStatus()->find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        
        $users = User::all();
        foreach($users as $user){
            $user->notify(new UserEdited($user));
        }
        
        flash('The user was successfully updated and an email was sent to all Admins')->success();
        
        return redirect()->route('admin.users.index');
    }
    
    public function delete($id){
        
    }
    
    public function markApprove($id){
        //get the user and mark it as approved
        $user = User::withAnyStatus()->find($id);
        $user->markApproved();
        $user->save();
        
        //flash notification
        flash('The user ' . $user->first_name . ' ' . $user->last_name . ' has been aproved')->success();
        
        //redirect to users home page
        return redirect()->route('admin.users.index');
    }
    
    public function markRejected($id){
        //get user and mark it as rejected
        $user = User::withAnyStatus()->find($id);
        $user->markRejected();
        $user->save();
        
        //Flash Notification
        //syntax - flash('your message')->type or session error;
        flash('The user ' . $user->first_name . ' ' . $user->last_name . ' has been rejected')->error();
        
        //redirect to users home page
        return redirect()->route('admin.users.index');
    }
}
