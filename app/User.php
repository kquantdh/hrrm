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
    public function get_statuses(){
        return array(

            1 => 'Admin',
            2 => 'User',
            3 => 'Guest'
        );
    }

    public function status_name(){
        $statuses = $this->get_statuses();
        return $statuses[$this->status];
    }
}
