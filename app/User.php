<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    // Posts function to  know that users can have many posts
    public function posts(){
        return $this->hasMany('App\Post');
    }
    // User can have many Results.
    public function results(){
        return $this->hasMany('App\Result');
    }
    public function tests(){
        return $this->hasMany('App\Test');
    }
    public function weightTrackers(){
        return $this->hasMany('App\WeightTracker');
    }
}
