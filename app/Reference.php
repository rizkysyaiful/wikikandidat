<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function submitter()
    {
    	return $this->belongsTo('App\User', 'submitter_id');
    }

    public function fact()
    {
    	return $this->belongsTo('App\Fact');
    }

    public function verifications()
    {
    	return $this->hasMany('App\Verification');
    }
}
