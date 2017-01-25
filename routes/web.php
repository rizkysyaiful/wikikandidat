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

   $all = App\Candidate::all();

    foreach($all as $a){
      if( App\Election::find($a->election_id) === null ){
        echo $a->name." (".$a->id.")<br>";
      }
    }
/*
    echo "<h3>Sama</h3>";

    foreach($all as $a){

      if( App\Election::find($a->election_id) === null ){
        echo $a->name." (".$a->id.")<br>";
      }
    }
*/
});

Route::post('/reveal-all', function(Request $r){
  print_r($r->all());
});

/**
* Pages for admin
*/


Route::get('/admin', function(){  
  if( Auth::user() && !Auth::user()->is_hibernate )
  {
    return view('admin');
  }
});

// TODO, protect this routes so that only admin can access it
Route::post('/admin/add-place', 'AdminController@add_place');
Route::post('/admin/add-uni', 'AdminController@add_uni');
Route::post('/admin/promote-verifier', 'AdminController@promote_verifier');
Route::post('/admin/add-election', 'AdminController@add_election_2017_ver');
Route::post('/admin/add-candidate', 'AdminController@add_candidate');
Route::post('/admin/add-couple', 'AdminController@add_couple');
Route::post('/admin/add-party', 'AdminController@add_party');

Route::get("/admin/edit-candidate", function(){
  return view('edit-candidate');
});
Route::post("/admin/edit-candidate", 'AdminController@edit_candidate');

/**
* Pages for reader
*/
Route::get('/','ElectionController@index');
Route::post('/', 'ElectionController@index');

Route::get('/tentang-kami', function(){
  return view('static.about-2017-ver');
});

Route::get('/contoh', function(){
  return view('static.example');
});

/*
Route::get('/cara-kontribusi', function(){
  return view('static.contribute');
});

Route::get('/panduan-verifikasi', function(){
  return view('static.verifier-how-to');
});
Route::get('/inisiator', function(){
  return view('static.inisiator');
});

*/

/*
Route::get('/daftar', function(){
  echo "Wikikandidat.com masih dalam tahap closed-beta.<br> Artinya, penambah data & verifikator masih direkrut dengan interview tatap muka.<br>Desember ini akan fokus merekrut di Universitas Indonesia Depok.<br><br>Ikuti perkembangan pergerakan kami di <a href='http://wikikandidat.tumblr.com'>wikikandidat.tumblr.com</a><br>
    Dari sisi pengembangan software di <a href='https://github.com/rizkysyaiful/wikikandidat#readme'>github.com/rizkysyaiful/wikikandidat#readme</a><br><br>Tertarik bantu? Hubungi kami di rizky.syaiful@gmail.com.";
});*/
Auth::routes();
/*Route::get('/login', 'Auth\LoginController@showLoginForm' );
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::get('/daftardong', 'Auth\RegisterController@showRegistrationForm');*/

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
/*
Route::get('/edit-bukti', function(){
  $references = App\Reference::where([
      ['first_verifier_id', '=', null],
      ['second_verifier_id', '=', null],
      ['third_verifier_id', '=', null],
    ])->get();
  return view('edit-bukti')->with('references', $references);
})->middleware('auth');
*/
Route::get('/user/{any}', function($any){
  $user = App\User::where('username', $any)->first();
  if($user)
  {
    return view('profile')->with('user', $user);
  }
});

Route::get('{any}', 'ElectionController@election');
Route::post('{any}', 'ElectionController@election');

/**
* Actions of user
*
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
*
Route::post('/student/approve-fact',
  'StudentController@approve_fact')
  ->middleware('auth'); // nanti cari middleware yang bisa filter student
Route::post('/student/reject-fact',
  'StudentController@reject_fact')
  ->middleware('auth');
Route::post('student/edit-reference-fact',
  'StudentController@edit_reference_fact')
  ->middleware('auth');
*/
