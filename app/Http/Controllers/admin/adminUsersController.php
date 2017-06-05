<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

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
    
    public function edit(){
        
    }
    
    public function update(Request $request){
        
    }
    
    public function delete(){
        
    }
    
    public function markApprove($id){
        $user = User::withAnyStatus()->find($id);
        $user->markApproved();
        $user->save();
        
        return redirect()->route('admin.users.index');
    }
    
    public function markRejected($id){
        $user = User::withAnyStatus()->find($id);
        $user->markRejected();
        $user->save();
        
        return redirect()->route('admin.users.index');
    }
}
