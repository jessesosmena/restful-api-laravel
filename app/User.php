<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isAdmin() 
    {
        return $this->admin; // If admin column in users table is == 1 redirect to admin page
    }
    
    public function address()
    {
        return $this->hasMany(Address::class); // Define relationship between User and Address Model
    }

    public function orders() // Define relationship between User and Order Model
    {
        return $this->hasMany(Order::class);
    }


    // Mutator
    public function setNameAttribute($value){

       $this->attributes['name'] = ucfirst($value);  

    }

    public function setPasswordAttribute($value){

       $this->attributes['password'] = bcrypt($value);  

    }
}
