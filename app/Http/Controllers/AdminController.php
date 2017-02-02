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

    public function add_election_2017_ver(Request $request)
    {
        $request->session()->flash('status', 'Gagal tersimpan..');

        $place = Place::create([
            'name' => $request->input("name"),
            'level' => $request->input("level"),
            'parent_id' => null
        ]);

        if($request->input("level") == 1)
            $prefix = "Prov.";
        if($request->input("level") == 2)
            $prefix = "Kota";
        if($request->input("level") == 3)
            $prefix = "Kab.";

        Election::create([
            'name' => "Pilkada 2017 ".$prefix." ".$request->input('name'),
            'urlname' => "pilkada-2017-".str_replace([" "], "-", strtolower($request->input('name'))),
            'is_gov' => true,
            'vote_date' => '2017-02-15',
            'description' => $request->input('description'),
            'place_id' => $place->id,
            'cp' => Auth::user()->id
        ]);

        $request->session()->flash('status', 'Dapil '.$place->name.' berhasil tersimpan..');

        return redirect('/admin');
    }

    public function edit_couple(Request $request)
    {
        $request->session()->flash('status', 'Gagal tersimpan..');

        $c = Couple::find($request->input("couple_id"));

        $c->running_mate_id = $request->input("running_mate_id");
        $c->election_id = $request->input("election_id");
        $c->order = $request->input("order");
        $c->website = $request->input("website");
        $c->slogan = $request->input("slogan");
        $c->visi = $request->input("visi");
        $c->misi = $request->input("misi");
        $c->program = $request->input("program");
        $c->sumber = $request->input("sumber");

        $c->save();

        DB::table('couple_party')
                ->where('couple_id', $c->id)
                ->delete();
        foreach ( $request->input('party') as $p ) {
            DB::table('couple_party')->insert([
                'couple_id' => $c->id,
                'party_id' => $p
            ]);
        }

        $request->session()->flash('status', 'Data pasangan '.$c->candidate->name.' - '.$c->running_mate->name.' berhasil diperbarui...');

        return redirect('/admin/edit-couple');
    }

    public function edit_candidate(Request $request)
    {
        $request->session()->flash('status', 'Gagal tersimpan..');

        $c = Candidate::find($request->input("candidate_id"));

        $c->name = $request->input("name");
        $c->nickname = $request->input("nickname");
        $c->urlname = $request->input("urlname");
        $c->photo_url = $request->input("photo_url");

        if(     $request->input("year") != "" && 
                $request->input("month") != "" &&
                $request->input("date") != ""){
            $c->birthdate = $request->input("year")."-".$request->input("month")."-".str_pad($request->input("date"), 2, 0, STR_PAD_LEFT);
        }
        $c->birthcity = $request->input("birthcity");

        $c->pendidikan = $request->input("pendidikan");
        $c->karir = $request->input("karir");
        $c->penghargaan = $request->input("penghargaan");
        $c->dakwaan = $request->input("dakwaan");
        $c->sumber_pemerintah = $request->input("sumber_pemerintah");
        $c->sumber_non_pemerintah = $request->input("sumber_non_pemerintah");
        $c->election_id = $request->input("election_id");

        $c->save();

        $request->session()->flash('status', 'Data '.$c->name.' berhasil tersimpan...');

        return redirect('/admin/edit-candidate');
    }

    public function add_candidate(Request $request)
    {

    	$request->session()->flash('status', 'Gagal tersimpan..');

        // kalau urlnamenya ga duplikat
        if( Candidate::where("urlname", $request->input("urlname"))->first() == null )
        {
            if( $request->input("year") != "" && 
                $request->input("month") != "" &&
                $request->input("date") != "")
            {
                $birthdate = $request->input("year").
                            "-".$request->input("month").
                            "-".str_pad($request->input("date"), 2, 0, STR_PAD_LEFT);
            }
            Candidate::create([
                'name' => $request->input("name"),
                'nickname' => $request->input("nickname"),
                'urlname' => $request->input("urlname"),
                'photo_url' => $request->input("photo_url"),
                'birthdate' => $birthdate,
                'birthcity' => $request->input("birthcity"),
                'pendidikan' => $request->input("pendidikan"),
                'karir' => $request->input("karir"),
                'penghargaan' => $request->input("penghargaan"),
                'dakwaan' => $request->input("dakwaan"),
                'sumber_pemerintah' => $request->input("sumber_pemerintah"),
                'sumber_non_pemerintah' => $request->input("sumber_non_pemerintah"),
                'election_id' => $request->input("election_id"),
                'entrier_id' => Auth::user()->id
            ]);

            $request->session()->flash('status', $request->input("name").' berhasil tersimpan..');
        }else{
            $request->session()->flash('status', $request->input("name").' gagal tersimpan.. '.$request->input("urlname").' sudah ada yang punya');
        }
    	return redirect('/admin');
    }

    public function add_couple(Request $request)
    {
        
    	$request->session()->flash('status', 'Gagal tersimpan..');

        if( $request->input('candidate_id') != $request->input('running_mate_id') )
        {
            $couple = Couple::create([
                'election_id' => $request->input('election_id'),
                'order' => $request->input('order'),
                'candidate_id' => $request->input('candidate_id'),
                'running_mate_id' => $request->input('running_mate_id'),
                'slogan' => $request->input('slogan'),
                'visi' => $request->input('visi'),
                'misi' => $request->input('misi'),
                'program' => $request->input('program'),
                'website' => $request->input('website'),
                'sumber' => $request->input('sumber')
            ]);

            foreach ($request->input('party') as $p) {
                $result = DB::table('couple_party')
                    ->where('couple_id', $couple->id)
                    ->where('party_id', $p)
                    ->get();
                if(count($result) == 0)
                {
                    DB::table('couple_party')->insert([
                        'couple_id' => $couple->id,
                        'party_id' => $p
                        ]);
                }
            }

            $request->session()->flash('status', 'Pasangan '.$couple->candidate->nickname.'-'.$couple->running_mate->nickname.' berhasil tersimpan..');
        }

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


    public function template(Request $request)
    {
    	$request->session()->flash('status', 'Gagal tersimpan..');

    	$request->session()->flash('status', 'berhasil tersimpan..');

    	return redirect('/admin');
    }
}
