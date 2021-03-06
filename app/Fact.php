<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fact extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function type()
    {
    	return $this->belongsTo('App\Type');
    }

    public function candidate()
    {
    	return $this->belongsTo('App\Candidate');
    }

    public function references()
    {
    	return $this->hasMany('App\Reference');
    }

    public function submissions()
    {
        return $this->hasMany('App\Submission');
    }

    public function topics()
    {
        return $this->belongsToMany('App\Topic');
    }
}
