<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\User;
use App\Couple;
use App\Candidate;

use Illuminate\Support\Facades\Input;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $election = Election::find(1);
        return $this->show($election);
    }

    public function election($any)
    {
        $election = Election::where('urlname', $any)->first();

        if( $election )
        {
          if( count($election->couples) > 1 )
          {
            return $this->show($election);
          }else{
            if( count($election->couples) == 1 )
            {
              foreach ($election->couples as $c) {
                echo "Kandidatnya cuma satu dan ini orangnya:<br>.";
                echo $c->candidate->name;
                echo "<br>Tolong kasih tahu mas Rizky untuk cek.";
              }
            }else{
              echo "Dapil ini belum bisa diakses, karena ".User::find($election->cp)->name." belum memasukan ";
            }
          }
        }else{
          $candidate = Candidate::where('urlname', $any)->first();
          if($candidate)
          {
            return view('candidate')->with('c', $candidate);
          }
          abort(404, "URL ".url($any)." tidak ada kaka... Kaka salah ketik?");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($election)
    {

      $cp = User::find($election->cp);

      if(Input::get('candidate1') == null )  {

      $s = 0;
      foreach($election->couples as $couple)  {
        $cands[$s] = $couple->id;
      $s++;
      }
      $count = $election->couples->count();
      for($i = 0; $i < 2; $i++)
        $cand[$i] = $cands[array_rand($cands)];

      while($cand[0] == $cand[1])
        $cand[1] = $cands[array_rand($cands)];
      }
      else {
        $cand[0] = Input::get('candidate1');
        $cand[1] = Input::get('candidate2');
      }
      $wcand1 = Couple::find($cand[0])->running_mate_id;
      $cand1 = Couple::find($cand[0])->candidate_id;

      $c = Candidate::find($cand1);
      $rm = Candidate::find($wcand1);

      $wcand1 = Couple::find($cand[1])->running_mate_id;
      $cand1 = Couple::find($cand[1])->candidate_id;

      $c2 = Candidate::find($cand1);
      $rm2 = Candidate::find($wcand1);

      return view('landing-sub',['election'=>$election, 'couples'=>$election->couples, 'cp'=>$cp, 'c'=>$c, 'rm'=>$rm, 'c2'=>$c2, 'rm2'=>$rm2]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
