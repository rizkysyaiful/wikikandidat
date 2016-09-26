<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    //
    public function place()
    {
    	return $this->belongsTo('App\Place');
    }

    public function couples()
    {
    	return $this->hasMany('App\Couple');
    }
}
