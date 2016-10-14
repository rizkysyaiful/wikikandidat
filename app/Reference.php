<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['eternal_url', 'fact_id', 'submitter_id', 'first_verifier_id', 'second_verifier_id', 'third_verifier_id'];

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
