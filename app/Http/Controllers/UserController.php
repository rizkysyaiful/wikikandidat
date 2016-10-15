<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Fact;
use App\Reference;


class UserController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function submit_fact(Request $req)
    {
        Validator::make($req->all(), [
            'eternal_url' => 'required|url',
            'text' => 'required',
            'type_id' => 'required|exists:types,id',
            'candidate_id' => 'required|exists:candidates,id',
            'submitter_id' => 'required|exists:users,id',
        ])->validate();

        $fact = Fact::create([
            'text' => $req->input("text"),
            'type_id' => $req->input("type_id"),
            'candidate_id' => $req->input("candidate_id"),
        ]);

        $random_students = DB::select('select id from users where is_verifier = ? AND id != ? ORDER BY rand() LIMIT 3', [1, Auth::user()->id]);

        $reference = Reference::create([
            'first_verifier_id' => $random_students[0]->id,
            'second_verifier_id' => $random_students[1]->id,
            'third_verifier_id' => $random_students[2]->id,
            'eternal_url' => $req->input("eternal_url"),
            'fact_id' => $fact->id,
            'submitter_id' => $req->input("submitter_id"),
        ]);

        return redirect('/');

    }
}
