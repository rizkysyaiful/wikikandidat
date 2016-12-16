<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
	protected $guarded = [];

    public function couples()
    {
    	return $this->belongsToMany('App\Couple');
    }
}
