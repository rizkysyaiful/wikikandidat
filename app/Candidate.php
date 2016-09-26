<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    public function facts()
    {
    	return $this->hasMany('App\Fact');
    }

    public function couples_as_primary()
    {
    	return $this->hasMany('App\Couple', 'candidate_id');
    }

    public function couples_as_running_mate()
    {
    	return $this->hasMany('App\Couple', 'running_mate_id');
    }
}
