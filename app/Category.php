<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hootlex\Moderation\Moderatable;

class Category extends Model
{
    use Moderatable;
    
    public function callusers()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    
}
