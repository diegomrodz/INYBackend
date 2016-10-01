<?php

namespace INU;

use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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

    public function caretaker() 
    {
        return Caretaker::where('user_id', $this->id)->first();
    }

    public function patient() 
    {
        return Patient::where('user_id', $this->id)->first();
    }

    public function homeCare() 
    {
        return HomeCare::where('user_id', $this->id)->first();
    }

    public function device() 
    {
        return Device::where('user_id', $this->id)->first();        
    }
}
