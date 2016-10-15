<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
	protected $fillable = ['reference_id', 'verifier_id', 'comment'];

    public function verifier()
    {
    	return $this->belongsTo('App\User');
    }

    public function reference()
    {
    	return $this->belongsTo('App\Reference');
    }
}
