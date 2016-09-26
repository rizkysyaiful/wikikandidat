<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    //return view('landing')->with('candidates', App\Candidate::all());
    // return view('landing');
/*   
    $risma = App\Candidate::find(1);
    echo App\Type::where('name', 'Educations')->get();
    echo $risma->facts()->where('type_id', 1)->get();
    foreach ($risma->facts()->where('type_id', 1) as $f) {
    	$f->text;
    }
*/
  $election = App\Election::find(1);
  echo $election->couples->first()->candidate->facts->first()->references->first()->fact->references->first()->submitter->verifications;

  $verification = App\Verification::find(1);
  //echo $verification->reference;
});
