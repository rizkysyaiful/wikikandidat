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
  $random_students = DB::select('select id from users where is_verifier = ? AND id != ? AND id != ? AND id != ? AND id != ? AND id != ? ORDER BY rand() LIMIT 3', [1, Auth::user()->id, 2, 3, 4, 5]);
  echo Auth::user()->id."<br>";
  print_r($random_students);
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

Route::post('/user/submit-fact',
  'UserController@submit_fact')
  ->middleware('auth');

Route::post('/student/approve-fact',
  'StudentController@approve_fact')
  ->middleware('auth'); // nanti cari middleware yang bisa filter student

Auth::routes();

Route::get('/logout', function(){
  Auth::logout();
  return redirect('/');
});

Route::get('/home', 'UserController@index');
