<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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
        'name', 'email', 'password', 'slug', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone', 'user_id', 'id');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic', 'user_id', 'id');
    }

    public function preferences()
    {
        return $this->hasMany('App\Preference', 'user_id', 'id');
    }

    public function repetitions()
    {
        return $this->hasMany('App\Repetition', 'user_id', 'id')->orderBy('when', 'ASC');
    }
   
}
