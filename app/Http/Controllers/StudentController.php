<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Fact;
use App\Reference;
use App\Verification;
use App\Submission;
use App\Edit;
use App\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\Job;
use App\Mail\EditStatus;


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

    public function create_edit(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	Validator::make($request->all(), [
            'submission_id' => 'required|exists:submissions,id',
        ])->validate();

        $submission = Submission::find($request->input('submission_id'));

        $is_valid_verifier = false;

    	// hilangkan flag butuh untuk verifikasi
		if($submission->first_verifier_id == Auth::user()->id)
    	{
			$is_valid_verifier = true;    		
    		$submission->first_verifier_id = null;
    	}
    	elseif($submission->second_verifier_id == Auth::user()->id)
    	{
    		$is_valid_verifier = true;
    		$submission->second_verifier_id = null;
    	}
    	elseif($submission->third_verifier_id == Auth::user()->id)
    	{
    		$is_valid_verifier = true;
    		$submission->third_verifier_id = null;
    	}
    	$submission->save();

    	if($is_valid_verifier)
    	{
    		if($request->has('is_no_change'))
    		{
    			$latest_edit = Edit::find($request->input("latest_edit_id"));
    			$text = $latest_edit->text;
    			$comment = $latest_edit->comment;
    			$submission_id = $latest_edit->submission_id;
    			$date_start = $latest_edit->date_start;
    			$date_finish = $latest_edit->date_finish;
    		}else
    		{
    			$text = $request->input('text');
	        	$comment = $request->input('comment');
	        	$submission_id = $submission->id;
	        	$date_start = $request->input('year_s').
	        				"-".($request->input('month_s')<10?"0":"").
	        				$request->input('month_s').
	        				"-".($request->input('date_s')<10?"0":"").
	        				$request->input('date_s');
	        	$date_finish = $request->input('year_f').
		        				"-".($request->input('month_f')<10?"0":"").$request->input('month_f').
		        				"-".($request->input('date_f')<10?"0":"").
		        				$request->input('date_f');
		    }

    		$edit = Edit::create([
	        	'text' => $text,
	        	'comment' => $comment,
	        	'submission_id' => $submission_id,
	        	'verifier_id' => Auth::user()->id,
	        	'date_start' => $date_start,
	        	'date_finish' => $date_finish,
	        	]);

    		if($request->has('is_no_change'))
    		{
    			$edit->is_agree = true;
    		}

    		// jika ini verifikasi ketiga, update submission
			if(	$submission->first_verifier_id == null &&
	    		$submission->second_verifier_id == null &&
	    		$submission->third_verifier_id == null 
	    		)
	    	{
	    		// jika fact-nya belum ada
	    		if($submission->fact_id == null)
	    		{
	    			$fact = Fact::create([
		    			'text' => $edit->text,
		    			'date_start' => $edit->date_start,
		    			'date_finish' => $edit->date_finish,
		    			'type_id' => $submission->type_id,
		    			'candidate_id' => $submission->candidate_id,
	    			]);
	    			$submission->fact_id = $fact->id;
	    		}
	    		else // jika fact-nya sudah ada
	    		{
	    			$fact = Fact::find($submission->fact_id);
	    			$fact->text = $edit->text;
	    			$fact->date_start = $edit->date_start;
	    			$fact->date_finish = $edit->date_finish;
	    			$fact->save();
	    		}
	    		$submission->is_rejected = false;
	    		$submission->save();
	    	}
	    	Mail::to($submission->submitter->email)
          		->queue(new EditStatus(true, $submission));

          	if($submission->first_verifier_id == null &&
	    		$submission->second_verifier_id != null)
          	{
          		Mail::to(User::find($submission->second_verifier_id)->email)
          		->queue(new Job($submission));
          	}

          	if($submission->first_verifier_id == null && 
          		$submission->second_verifier_id == null &&
	    		$submission->third_verifier_id != null)
          	{
          		Mail::to(User::find($submission->third_verifier_id)->email)
          		->queue(new Job($submission));
          	}
          	

    		$request->session()->flash('status', 'Edit kamu berhasil tersimpan...');
    	}

        return redirect('/verification');
    }

    public function reject_submission(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	Validator::make($request->all(), [
            'rejection_reason' => 'required',
            'submission_id' => 'required|exists:submissions,id'
        ])->validate();

        $submission = Submission::find($request->input('submission_id'));
        $submission->is_rejected = true;
        $submission->rejection_reason = $request->input('rejection_reason');
        $submission->save();

        Mail::to($submission->submitter->email)
          		->queue(new EditStatus(false, $submission));

        $request->session()->flash('status', 'Penolakan kamu berhasil tersimpan...');

        return redirect('/verification');
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
    	$fact->type_id = $request->input('type_id');
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

    		// kasih notif ke pengirim fakta kalau ditolak

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
    		'type_id' => 'required|exists:types,id',
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
	    	$fact->type_id = $request->input('type_id');
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
		    	// kalau ternyata ini adalah penggantian bukti yang sudah ada.. taruh successor_id ke tempat sesuai di sini.
		    	if(isset($r->successor_id))
		    	{
		    		$old_reference = Reference::find($r->successor_id);
		    		$old_reference->successor_id = $r->successor_id;
		    		$old_reference->save();
		    		$r->successor_id = null;
		    	}
		    	// TODO kasih notif ke submitter 
	    	}

	    	$fact->save();
	    	$r->save();

	    	$request->session()->flash('status', 'Tersimpan di database, kalau fakta & bukti barusan terverifikasi...');
    	}

    	return redirect('/home');
    }
}
