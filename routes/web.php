<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Job;
use App\Mail\EditStatus;

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

});

Route::post('/reveal-all', function(Request $r){
  print_r($r->all());
});

/**
* Pages for reader
*/

Route::get('/', function () {
  return view('landing-sub')->with('election', App\Election::find(1));
});

Route::get('/tentang-kami', function(){
  return view('static.about');
});
Route::get('/cara-kontribusi', function(){
  return view('static.contribute');
});
Route::get('/contoh', function(){
  return view('static.example');
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

Route::get('/verification', function(){
    if( !Auth::user()->is_hibernate ){
      return view('home-sub');
    }else{
      echo "Kamu sedang hibernasi, tidak ada pekerjaan untuk kamu.";
    }
  })->middleware('auth');
Route::get('/hibernate-on', 'UserController@hibernate_on')->middleware('auth'); // TODO ganti middleware verfikator 
Route::get('/hibernate-off', 'UserController@hibernate_off')->middleware('auth'); // TODO ganti middleware verfikator
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
  });
Route::get('/edit-bukti', function(){
  $references = App\Reference::where([
      ['first_verifier_id', '=', null],
      ['second_verifier_id', '=', null],
      ['third_verifier_id', '=', null],
    ])->get();
  return view('edit-bukti')->with('references', $references);
})->middleware('auth');

Route::get('/user/{any}', function($any){
  $user = App\User::where('username', $any)->first();
  if($user)
  {
    return view('profile')->with('user', $user);
  }
});

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




