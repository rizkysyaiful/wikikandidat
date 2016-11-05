<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function submitter()
    {
    	return $this->belongsTo('App\User', 'submitter_id');
    }

    public function fact()
    {
    	return $this->belongsTo('App\Fact');
    }

    public function candidate()
    {
    	return $this->belongsTo('App\Candidate');
    }

    public function edits()
    {
    	return $this->hasMany('App\Edit');
    }

    public function type()
    {
    	return $this->belongsTo('App\Type');
    }
}
