<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function facts()
    {
    	return $this->belongsToMany('App\Fact');
    }
}
