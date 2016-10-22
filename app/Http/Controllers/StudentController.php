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

    public function edit_reference_fact(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	$r = Reference::find($request->input('reference_id'));
    	$r->title = $request->input('title');
		$r->eternal_url = $request->input('eternal_url');
		$r->photo_id = $request->input('photo_id');
    	$r->save();

    	$fact = Fact::find($request->input('fact_id'));
    	$fact->text = $request->input('text');
    	$fact->year_start = ( $request->input('year_start') == "" ? null : $request->input('year_start') );
    	$fact->year_end = ( $request->input('year_end') == "" ? null : $request->input('year_end') );
    	$fact->save();

    	$request->session()->flash('status', 'Berhasil diperbarui... Ingat, jangan sebar link ini. Ini hanya saat entrier-nya masih di satu waktu & tempat.');

    	return redirect('/edit-bukti');
    }

    public function reject_fact(Request $request)
    {
    	Validator::make($request->all(), [
            'rejection_reason' => 'required',
            'reference_id' => 'required|exists:references,id',
        ])->validate();

    	$request->session()->flash('status', 'Gagal tersimpan');

    	$r = Reference::find($request->input('reference_id'));
    	$flag_verifier = false;

    	// pastikan dia memang salah satu verifikator
		if(	$r->first_verifier_id == Auth::user()->id ||
			$r->second_verifier_id == Auth::user()->id ||
			$r->third_verifier_id == Auth::user()->id )
    	{
			$flag_verifier = true;    		
    	}

    	if($flag_verifier)
    	{
    		// satu mahasiswa menolak, yang lain tidak perlu verifikasi
    		$r->first_verifier_id = null;
    		$r->second_verifier_id = null;
    		$r->third_verifier_id = null;

    		$r->rejection_reason = $request->input('rejection_reason');
    		$r->is_rejected = true;
    		$r->save();

    		$request->session()->flash('status', 'Fakta & bukti barusan berhasil ditolak...');
    	}

    	return redirect('/home');
    }

    public function approve_fact(Request $request)
    {
    	$messages = [
		    'eternal_url.url' => 'The format must be url & generated from archive.org/web. Normal internet page might be changed or deleted anytime.',
		    'eternal_url.required' => 'URL generated from archive.org/web, directed to the proof is required. Normal internet page might be changed or deleted anytime.',
		    'title.required' => 'The authority who release the fact is required.',
		    'comment.required' => 'Your reason on why you pass this is required.',
		    'photo_id.required' => 'The screenshot of the proof is required. It helps reader to digest the information quickly.'
		];
    	Validator::make($request->all(), [
    		'comment' => 'required',
    		'title' => 'required',
    		'eternal_url' => 'required|url',
    		'photo_id' => 'required',
    		'text' => 'required',
    		'year_start' => 'numeric',
    		'year_end' => 'numeric',
    		'fact_id' => 'required|exists:facts,id',
            'reference_id' => 'required|exists:references,id',
        ], $messages)->validate();

    	$request->session()->flash('status', 'Gagal tersimpan');

    	$r = Reference::find($request->input('reference_id'));
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
    		$r->title = $request->input('title');
    		$r->eternal_url = $request->input('eternal_url');
    		$r->photo_id = $request->input('photo_id');

    		Verification::create([
    			'comment' => $request->input('comment'),
    			'reference_id' => $request->input('reference_id'),
    			'verifier_id' => Auth::user()->id,
    			]);

	    	$fact = Fact::find($request->input('fact_id'));
	    	$fact->text = $request->input('text');
	    	$fact->year_start = ( $request->input('year_start') == "" ? null : $request->input('year_start') );
	    	$fact->year_end = ( $request->input('year_end') == "" ? null : $request->input('year_end') );
	    	
	    	// kalau ini adalah verifikator terakhir,
	    	if(	$r->first_verifier_id == null &&
	    		$r->second_verifier_id == null &&
	    		$r->third_verifier_id == null 
	    		)
	    	{ // maka resmikan Faktanya
		    	$fact->is_verified = true;
		    	$r->is_rejected = false;
	    	}

	    	$fact->save();
	    	$r->save();

	    	$request->session()->flash('status', 'Tersimpan di database, kalau fakta & bukti barusan terverifikasi...');
    	}

    	return redirect('/home');
    }
}
