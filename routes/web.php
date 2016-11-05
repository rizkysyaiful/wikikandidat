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
  echo markdown('I have more <sup>[1](http://tes.cuk)</sup>. http://tes.cuk');
});

/**
* Pages for reader
*/

Route::get('/', function () {
  return view('landing-sub')->with('election', App\Election::find(1));
});
Route::get('/banten-2017', function(){
  return view('landing')->with('election', App\Election::find(2));
});

Route::get('/faq', function(){
  return view('static.faq');
});

Route::post('user/process_new_fact_submission', 'UserController@process_new_fact_submission')->middleware('auth');
Route::post('user/process_edit_fact_submission', 'UserController@process_edit_fact_submission')->middleware('auth');
Route::post('student/reject_submission', 'StudentController@reject_submission')->middleware('auth');

Route::get('/verification', function(){
  return view('home-sub');
})->middleware('auth');

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

Auth::routes();

Route::get('/logout', function(){
  Auth::logout();
  return redirect('/');
});
