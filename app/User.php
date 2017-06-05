<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Hootlex\Moderation\Moderatable;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    use Moderatable;
    use HasRole;
    
}
