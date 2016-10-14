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
  
});

Route::get('/', function () {
  return view('landing')->with('election', App\Election::find(1));
   // return view('landing');
/*   
    $risma = App\Candidate::find(1);
    echo App\Type::where('name', 'Educations')->get();
    echo $risma->facts()->where('type_id', 1)->get();
    foreach ($risma->facts()->where('type_id', 1) as $f) {
    	$f->text;
    }
*/

});

Route::post('/user/submit-fact', 'UserController@submit_fact')->middleware('auth');

Auth::routes();

Route::get('/logout', function(){
  Auth::logout();
  return redirect('/');
});

Route::get('/home', 'UserController@index');
