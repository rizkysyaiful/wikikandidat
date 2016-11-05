<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edit extends Model
{
    protected $guarded = [];

    public function verifier()
    {
    	return $this->belongsTo('App\User');
    }

    public function submission()
    {
    	return $this->belongsTo('App\Submission');
    }
}
