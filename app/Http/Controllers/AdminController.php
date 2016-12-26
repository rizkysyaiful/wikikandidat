<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Place;
use App\University;
use App\User;
use App\Election;
use App\Candidate;
use App\Couple;
use App\Party;

class AdminController extends Controller
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

    public function add_place(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	$level = 1;
    	$parent_id = null;
    	if($request->input("parent_id") != 0)
    	{
    		$level = 2;
    		$parent_id = $request->input("parent_id");
    	}

    	Place::create([
    		'name' => $request->input("name"),
    		'level' => $level,
    		'parent_id' => $parent_id
    		]);

    	$request->session()->flash('status', 'Tempat "'.$request->input("name").'" tersimpan..');

    	return redirect('/admin');
    }

    public function add_uni(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

		University::create([
			'name' => $request->input('name'),
			'abbreviation' => $request->input('abbreviation'),
			'place_id' => $request->input('place_id')
			]);    	

    	$request->session()->flash('status', 'Kampus "'.$request->input("name").'" tersimpan..');

    	return redirect('/admin');
    }

    public function promote_verifier(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

		$user = User::find($request->input("user_id"));
		$user->is_verifier = true;
		$user->join_verifier_date = date("Y-m-d");
		$user->exit_verifier_date = date('Y-m-d', strtotime('+1 year'));
		$user->place_id = $request->input("place_id");
		$user->save();

    	$request->session()->flash('status', $user->name.' sudah jadi verifikator..');

    	return redirect('/admin');
    }

    public function add_election(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	Election::create([
    		'name' => $request->input('name'),
    		'urlname' => $request->input('urlname'),
    		'is_gov' => true,
    		'vote_date' => '2017-02-15',
    		'description' => "-",
    		'place_id' => $request->input('place_id')
    		]);

    	$request->session()->flash('status', $request->input('name').' berhasil tersimpan...');

    	return redirect('/admin');
    }

    public function add_candidate(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	Candidate::create([
    		'name' => $request->input("name"),
    		'nickname' => $request->input("nickname"),
    		'urlname' => $request->input("urlname"),
    		'photo_url' => $request->input("photo_url")
    		]);

    	$request->session()->flash('status', $request->input("name").' berhasil tersimpan..');

    	return redirect('/admin');
    }

    public function add_couple(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	$couple = Couple::create([
    		'election_id' => $request->input('election_id'),
    		'order' => $request->input('order'),
    		'candidate_id' => $request->input('candidate_id'),
    		'running_mate_id' => $request->input('running_mate_id')
    		]);

    	$request->session()->flash('status', 'Pasangan '.$couple->candidate->nickname.'-'.$couple->running_mate->nickname.' berhasil tersimpan..');

    	return redirect('/admin');
    }

    public function add_party(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	Party::create([
    		'name' => $request->input('name'),
    		'abbreviation' => $request->input('abbreviation'),
    		'photo_url' => $request->input('photo_url')
    		]);

    	$request->session()->flash('status', $request->input('name').' berhasil tersimpan..');

    	return redirect('/admin');
    }

    public function assign_party_to_couple(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	$result = DB::table('couple_party')
                    ->where('couple_id', $request->input('couple_id'))
                    ->where('party_id', $request->input('party_id'))
                    ->get();

        if(count($result) == 0)
        {
        	DB::table('couple_party')->insert([
	    		'couple_id' => $request->input('couple_id'),
			    'party_id' => $request->input('party_id')
			    ]);

	    	$couple = Couple::find($request->input('couple_id'));
	    	$party = Party::find($request->input('party_id'));

	    	$request->session()->flash('status', 'Dukungan partai '.$party->name.' ke pasangan '.$couple->candidate->nickname.'-'.$couple->running_mate->nickname.' berhasil tersimpan..');
        }

    	return redirect('/admin');
    }

    public function template(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	$request->session()->flash('status', 'berhasil tersimpan..');

    	return redirect('/admin');
    }
}
