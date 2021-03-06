<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable,HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //mutator.. bycrpt password and save when creating new user and updating
    public function setPasswordAttribute($value)
    {
        if ($value) {
            //check if d value is already hashed otherwise ignore
            $this->attributes['password'] = app('hash')->needsRehash($value)?Hash::make($value): $value;
        }
       
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
