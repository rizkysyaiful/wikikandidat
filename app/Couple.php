<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    protected $guarded = [];

    public function election()
    {
    	return $this->belongsTo('App\Election');
    }

    public function candidate()
    {
    	return $this->belongsTo('App\Candidate', 'candidate_id');
    }

    public function running_mate()
    {
    	return $this->belongsTo('App\Candidate', 'running_mate_id');
    }

    public function parties()
    {
        return $this->belongsToMany('App\Party', 'couple_party');
    }
}
