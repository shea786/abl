<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    //
    
    public function callusers()
    {
        return $this->hasOne('App\User','id','friend_id');
    }
}
