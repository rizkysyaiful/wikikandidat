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
  echo Auth::user()->jobs_as_second;
});

/**
* Pages for reader
*/
Route::get('/', function () {
  return view('landing')->with('election', App\Election::find(1));
});
Route::get('/faq', function(){
  return view('static.faq');
});

/**
* Pages for user
*/
Route::get('/home', 'UserController@index')->middleware('auth');
Route::get('/edit-bukti', function(){
  return view('edit-bukti')->with('references', App\Reference::all());
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
