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

    public function university()
    {
        return $this->belongsTo('App\University');
    }

    public function references()
    {
        return $this->hasMany('App\Reference', 'submitter_id');
    }

    public function verifications()
    {
        return $this->hasMany('App\Verification', 'verifier_id');
    }
}
