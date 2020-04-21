<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = Str::title($value);
    }

    public function setUsernameAttribute($value){
        $this->attributes['username'] = Str::lower($value);
    }
    
}
