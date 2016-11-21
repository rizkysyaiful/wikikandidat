<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('/tes', function(){
  $facts = App\Fact::all();
  foreach ($facts as $f) {
    if($f->date_start == $f->date_finish){
      echo $f->text."<br>";
    }
  }
});

/**
* Pages for reader
*/

Route::get('/', function () {
  return view('landing-sub')->with('election', App\Election::find(1));
});

Route::get('/verification', function(){
  return view('home-sub');
})->middleware('auth');
Route::get('/logout', function(){
  Auth::logout();
  return redirect('/');
});

Route::get('/faq', function(){
  return view('static.faq');
});

// Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm' );
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::get('/register', function(){
  echo "Wikikandidat.com masih dalam tahap closed-beta.<br> Artinya, penambah data & verifikator masih direkrut dengan interview tatap muka.<br>November ini akan fokus merekrut di Universitas Indonesia Depok.<br><br>Ikuti perkembangan pergerakan kami di <a href='http://wikikandidat.tumblr.com'>wikikandidat.tumblr.com</a><br>
    Dari sisi pengembangan software di <a href='https://github.com/rizkysyaiful/wikikandidat#readme'>github.com/rizkysyaiful/wikikandidat#readme</a><br><br>Tertarik bantu? Hubungi kami di rizky.syaiful@gmail.com."; 
});


Route::post('user/process_new_fact_submission', 'UserController@process_new_fact_submission')->middleware('auth');
Route::post('user/process_edit_fact_submission', 'UserController@process_edit_fact_submission')->middleware('auth');
Route::post('student/reject_submission', 'StudentController@reject_submission')->middleware('auth');

Route::post('student/create_edit', 'StudentController@create_edit')->middleware('auth');

/**
* Pages for user
*/
// Route::get('/home', 'UserController@index')->middleware('auth');

Route::get('/edit-bukti', function(){
  $references = App\Reference::where([
      ['first_verifier_id', '=', null],
      ['second_verifier_id', '=', null],
      ['third_verifier_id', '=', null],
    ])->get();
  return view('edit-bukti')->with('references', $references);
})->middleware('auth');

Route::get('{any}', function($any){
  $election = App\Election::where('urlname', $any)->first();
  if($election)
  {
    return view('landing-sub')->with('election', $election);
  }
});

/**
* Actions of user
*/
Route::post('/user/submit-fact',
  'UserController@submit_fact')
  ->middleware('auth');
Route::post('/user/add-reference',
  'UserController@add_reference')
  ->middleware('auth');
Route::post('/user/change-reference',
  'UserController@change_reference')
  ->middleware('auth');

/**
* Actions of student
*/
Route::post('/student/approve-fact',
  'StudentController@approve_fact')
  ->middleware('auth'); // nanti cari middleware yang bisa filter student
Route::post('/student/reject-fact', 
  'StudentController@reject_fact')
  ->middleware('auth');
Route::post('student/edit-reference-fact',
  'StudentController@edit_reference_fact')
  ->middleware('auth');




