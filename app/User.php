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
        'name',
        'username',
        'email',
        'password',
        'national_pin',
        'phone_number',
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

    public function jobs_as_first()
    {
        return $this->hasMany('App\Reference', 'first_verifier_id');
    }

    public function jobs_as_second()
    {
        return $this->hasMany('App\Reference', 'second_verifier_id');
    }

    public function jobs_as_third()
    {
        return $this->hasMany('App\Reference', 'third_verifier_id');
    }    

    public function verifications()
    {
        return $this->hasMany('App\Verification', 'verifier_id');
    }
}
