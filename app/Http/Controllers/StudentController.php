<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Fact;
use App\Reference;
use App\Verification;


class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function approve_fact(Request $req)
    {
    	$r = Reference::find($req->input('reference_id'));
    	$flag_verifier = false;

    	// hilangkan flag butuh untuk verifikasi
		if($r->first_verifier_id == Auth::user()->id)
    	{
			$flag_verifier = true;    		
    		$r->first_verifier_id = null;
    	}
    	elseif($r->second_verifier_id == Auth::user()->id)
    	{
    		$flag_verifier = true;
    		$r->second_verifier_id = null;
    	}
    	elseif($r->third_verifier_id == Auth::user()->id)
    	{
    		$flag_verifier = true;
    		$r->third_verifier_id = null;
    	}

    	if($flag_verifier)
    	{
    		$r->title = $req->input('title');
    		$r->eternal_url = $req->input('eternal_url');
    		$r->photo_id = $req->input('photo_id');
	    	$r->save();

	    	Verification::create([
	    		'reference_id' => $req->input('reference_id'),
	    		'verifier_id' => Auth::user()->id,
	    		'comment' => $req->input('comment'),
	    		]);

	    	$fact = Fact::find($req->input('fact_id'));
	    	$fact->text = $req->input('text');
	    	$fact->year_start = ( $req->input('year_start') == "" ? null : $req->input('year_start') );
	    	$fact->year_end = $req->input('year_end');
	    	
	    	// kalau ini adalah verifikator terakhir,
	    	if(	$r->first_verifier_id == null &&
	    		$r->second_verifier_id == null &&
	    		$r->third_verifier_id == null 
	    		)
	    	{ // maka resmikan Faktanya
		    	$fact->is_verified = true;
	    	}
	    	$fact->save();
    	}

    	return redirect('/');
    }
}
