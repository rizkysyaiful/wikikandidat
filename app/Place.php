<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];

    public function parent()
    {
    	return $this->belongsTo('App\Place', 'parent_id');
    }

    public function children()
    {
    	return $this->hasMany('App\Place', 'parent_id');
    }

    public function elections()
	{
    	return $this->hasMany('App\Election');
    }

    public function universities()
    {
    	return $this->hasMany('App\University');
    }
}
