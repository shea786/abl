<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    public function callUserOne()
    {
        return $this->hasOne('App\User','id','user_one');
    }
    
    public function callUserTwo()
    {
        return $this->hasOne('App\User','id','user_two');
    }
}
