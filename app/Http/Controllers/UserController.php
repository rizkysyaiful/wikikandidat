<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

use App\Fact;
use App\Reference;
use App\Submission;
use App\Edit;
use App\User;


use Illuminate\Support\Facades\Mail;
use App\Mail\Job;
use App\Mail\EditStatus;

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

    private function get_random_students()
    {
        $random_students = null;
        // id 2, 3, 4, & 5 adalah mahasiswa test, tidak dijalankan di production
        if (App::environment('local')) {
            $random_students = DB::select('select id from users where is_verifier = ? AND id != ? ORDER BY rand() LIMIT 3', [1, Auth::user()->id]);
        }else{
            $random_students = DB::select('select id from users where is_verifier = ? AND id != ? AND id != ? AND id != ? AND id != ? AND id != ? ORDER BY rand() LIMIT 3', [1, Auth::user()->id, 2, 3, 4, 5]);
        } 
        return $random_students;
    }

    public function process_new_fact_submission(Request $request)
    {
        $request->session()->flash('status', 'gagal tersimpan...');

        Validator::make($request->all(), [
            'text' => 'required',
            'type_id' => 'required|exists:types,id',
            'candidate_id' => 'required|exists:candidates,id'
        ])->validate();

        $random_students = $this->get_random_students();

        // fact_id null karena ini submission baru
        $submission = Submission::create([
            'first_verifier_id' => $random_students[0]->id,
            'second_verifier_id' => $random_students[1]->id,
            'third_verifier_id' => $random_students[2]->id,
            'text' => $request->input('text'),
            'type_id' => $request->input('type_id'),
            'submitter_id' => Auth::user()->id,
            'candidate_id' => $request->input('candidate_id'),
        ]);

        $request->session()->flash('status', 'Saran fakta baru sudah tersimpan di basis data, siap menunggu verifikasi mahasiwa... (Ingat, mahasiswa berhak melakukan investigasi lanjut sehingga munkgin saran kamu bukan satu-satunya yang akan ditampilkan.)');

        Mail::to(User::find($random_students[0]->id)->email)
                ->queue(new Job($submission));
        Mail::to($submission->submitter->email)
                ->queue(new EditStatus(true, $submission));

        return redirect('/');
    }

    public function process_edit_fact_submission(Request $request)
    {
        $request->session()->flash('status', 'gagal tersimpan...');

        Validator::make($request->all(), [
            'text' => 'required',
            'fact_id' => 'required|exists:facts,id',
            'type_id' => 'required|exists:types,id',
            'candidate_id' => 'required|exists:candidates,id'
        ])->validate();

        $random_students = $this->get_random_students();

        // fact_id null karena ini submission baru
        $submission = Submission::create([
            'first_verifier_id' => $random_students[0]->id,
            'second_verifier_id' => $random_students[1]->id,
            'third_verifier_id' => $random_students[2]->id,
            'text' => $request->input('text'),
            'fact_id' => $request->input('fact_id'),
            'submitter_id' => Auth::user()->id,
            'candidate_id' => $request->input('candidate_id'),
            'type_id' => $request->input('type_id'),
        ]);

        $request->session()->flash('status', 'Saran perubahaan kamu sudah tersimpan di basis data, siap menunggu verifikasi mahasiwa... (Ingat, mahasiswa berhak melakukan investigasi lanjut sehingga munkgin saran kamu bukan satu-satunya yang akan ditampilkan.)');

        return redirect('/');
    }

    public function submit_fact(Request $request)
    {
        $request->session()->flash('status', 'gagal tersimpan...');

        Validator::make($request->all(), [
            'url' => 'required|url',
            'text' => 'required',
            'type_id' => 'required|exists:types,id',
            'candidate_id' => 'required|exists:candidates,id'
        ])->validate();

        $fact = Fact::create([
            'text' => $request->input("text"),
            'type_id' => $request->input("type_id"),
            'candidate_id' => $request->input("candidate_id"),
        ]);

        $random_students = $this->get_random_students();

        $reference = Reference::create([
            'first_verifier_id' => $random_students[0]->id,
            'second_verifier_id' => $random_students[1]->id,
            'third_verifier_id' => $random_students[2]->id,
            'eternal_url' => $request->input("url"),
            'fact_id' => $fact->id,
            'submitter_id' => Auth::user()->id,
        ]);

        $request->session()->flash('status', 'Fakta dan bukti sudah tersimpan di basis data, siap menunggu verifikasi mahasiwa..');

        return redirect('/');

    }

}
