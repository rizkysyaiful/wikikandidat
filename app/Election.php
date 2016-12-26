<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $guarded = [];

    // TODO tidak nyambung karena nama foreign key beda
    public function cp()
    {
    	return $this->belongsTo('App\User', 'cp', 'id');
    }

    public function place()
    {
    	return $this->belongsTo('App\Place');
    }

    public function couples()
    {
    	return $this->hasMany('App\Couple');
    }
}
