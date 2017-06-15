<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hootlex\Moderation\Moderatable;

class Blog extends Model
{
    use Moderatable;
    
    public function callusers()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    
    public function callCategories()
    {
        return $this->belongsToMany('App\Category',"blog_categories");
    }
}
