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

  Route::get('/', function(){
    return view('jogja.home');
  });

Route::group(['prefix' => 'qa'], function () {

  Route::get('/', function(){
    $elections = App\Election::all();
    $elections = $elections->sortBy('urlname');
    echo "<table border='1'>";
      echo "<thead>";
        echo "<tr>";
          echo "<th>";
            echo "Dapil";
          echo "</th>";
          echo "<th>";
            echo "Paslon yang sudah diinput";
          echo "</th>";
          echo "<th>";
            echo "Content Manager";
          echo "</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
        foreach($elections as $e){
          if($e->place->level == 1)
            $prefix = "Prov.";
          if($e->place->level == 2)
            $prefix = "Kota";
          if($e->place->level == 3)
            $prefix = "Kab.";
          echo "<tr>";
            echo "<td>";
              echo "<a href='".url("qa/".$e->urlname, [])."' 
                    target='_blank'>".$prefix." ".
                    $e->place->name."</a>";
            echo "</td>";
            echo "<td>";
              echo "<strong>".count($e->couples)."</strong>";
              if(count($e->couples) > 0){
                echo "<br>";
                $e->couples = $e->couples->sortBy('order');
                foreach ($e->couples as $c) {
                  echo $c->order.") <strong>".$c->candidate->name." - ";
                  echo $c->running_mate->name."</strong> (";
                  foreach ($c->parties as $p) {
                    echo $p->abbreviation.", ";
                  }
                  echo ") -- ".$c->id."<br>";
                }
              }
            echo "</td>";
            echo "<td>";
              echo App\User::find($e->cp)->name;
            echo "</td>";
          echo "</tr>";
        }
      echo "</tbody>";
    echo "</table>";
    
  });

  Route::get('{electionurl}', function($electionurl){
    $e = App\Election::where('urlname', $electionurl)->first();
    echo "<h2>".$e->name."</h2>";
    $couples = $e->couples;
    $couples = $couples->sortBy('order');
    foreach ($couples as $c) {
      echo $c->order.". <a href='".$electionurl."/".$c->order."' target='_blank'>".$c->candidate->name." - ".$c->running_mate->name."</a><br>";
    }
    echo "<p>Content Manager: ".App\User::find($e->cp)->name."</p>";
    $videos = explode(", ", $e->description);
    foreach($videos as $v){
      echo '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$v.'" allowfullscreen></iframe>';
    }

  });

  Route::get('{electionurl}/{order}', function($electionurl, $order){
    $e = App\Election::where('urlname', $electionurl)->first();
    $c = App\Couple::where('election_id', $e->id)
                    ->where('order', $order)->first();
    $cp = App\User::find($e->cp);
    echo '<link rel="stylesheet" href="'.asset('css/bootstrap.css').'" media="screen">
    <link rel="stylesheet" href="'.asset('css/custom.min.css').'">';
    echo "<div class='container'>";
      echo "<span class='pull-right'>Content Manager: ".$cp->name." (".$cp->email." ".$cp->phone_number.")</span>";
      echo "<h1>".$c->candidate->nickname." &amp; ".$c->running_mate->nickname."</h1>";
      echo "<div class='row'>";
        echo "<div class='col-sm-4'>";
          echo "<h4>Website Resmi:</h4><p>".$c->website."</p>";
          echo "<h4>Slogan:</h4><p>".$c->slogan."</p>";
          echo "<h4>Visi:</h4><p>".$c->visi."</p>";
          echo "<h4>Misi:</h4><p>".$c->misi."</p>";
          echo "<h4>Program:</h4><p>".$c->program."</p>";
          echo "<h4>Sumber:</h4><p>".$c->sumber."</p>";
        echo "</div>";
          echo "<div class='col-sm-4'>";
            echo "<img src='".$c->candidate->photo_url."' width='150'>";
            echo "<h3>".$c->candidate->name."<br><small>".$c->candidate->nickname." (".$c->candidate->urlname."). Tanding di <a href='".url(App\Election::find($c->candidate->election_id)->urlname)."'>".App\Election::find($c->candidate->election_id)->urlname."</a></small></h3>";
            echo "<h4>Lahir:</h4><p>".$c->candidate->birthcity.", ".$c->candidate->birthdate."</p>";
            echo "<h4>Pendidikan:</h4><p>".$c->candidate->pendidikan."</p>";
            echo "<h4>Karir:</h4><p>".$c->candidate->karir."</p>";
            echo "<h4>Penghargaan:</h4><p>".$c->candidate->penghargaan."</p>";
            echo "<h4>Kasus Pidana:</h4><p>".$c->candidate->dakwaan."</p>";
            echo "<h4>Sumber Pemerintah:</h4><p>".$c->candidate->sumber_pemerintah."</p>";
            echo "<h4>Sumber Non-Pemerintah:</h4><p>".$c->candidate->sumber_non_pemerintah."</p>";
          echo "</div>";
          echo "<div class='col-sm-4'>";
            echo "<img src='".$c->running_mate->photo_url."' width='150'>";
            echo "<h3>".$c->running_mate->name."<br><small>".$c->running_mate->nickname." (".$c->running_mate->urlname."). Tanding di <a href='".url(App\Election::find($c->running_mate->election_id)->urlname)."'>".App\Election::find($c->running_mate->election_id)->urlname."</a></small></h3>";
            echo "<h4>Lahir:</h4><p>".$c->running_mate->birthcity.", ".$c->running_mate->birthdate."</p>";
            echo "<h4>Pendidikan:</h4><p>".$c->running_mate->pendidikan."</p>";
            echo "<h4>Karir:</h4><p>".$c->running_mate->karir."</p>";
            echo "<h4>Penghargaan:</h4><p>".$c->running_mate->penghargaan."</p>";
            echo "<h4>Kasus Pidana:</h4><p>".$c->running_mate->dakwaan."</p>";
            echo "<h4>Sumber Pemerintah:</h4><p>".$c->running_mate->sumber_pemerintah."</p>";
            echo "<h4>Sumber Non-Pemerintah:</h4><p>".$c->running_mate->sumber_non_pemerintah."</p>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
    echo "</div>";
  });


});

Route::get('/tes', function(){

    $parties = App\Party::all();
    $parties = $parties->sortBy('abbreviation');
    $parties = $parties->toArray();
    echo "<pre>";
    print_r($parties);
    echo "</pre>";

   $all = App\Candidate::all();

    foreach($all as $a){
      if( App\Election::find($a->election_id) === null ){
        echo $a->name." (".$a->id.")<br>";

        if( App\Couple::where("candidate_id", $a->id) || App\Couple::where("running_mate_id", $a->id) ){
          $couples = App\Couple::where("running_mate_id", $a->id)->get();
        }
      }
    }
/*
    $all = App\Couple::all();

    foreach($all as $a){
      if( App\Candidate::find($a->candidate_id) === null || App\Candidate::find($a->running_mate_id) === null ){
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

Route::get('/home', function(){  
  return redirect('/');
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
  }else{
    echo "Sudah logout, silahkan ke wikikandidat.com/login dulu...";
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
  if( Auth::user() && !Auth::user()->is_hibernate )
  {
    return view('edit-candidate');
  }else{
    echo "Sudah logout, silahkan ke wikikandidat.com/login dulu...";
  }
});
Route::post("/admin/edit-candidate", 'AdminController@edit_candidate');

Route::get("/admin/edit-couple", function(){
  if( Auth::user() && !Auth::user()->is_hibernate )
  {
    return view('edit-couple');
  }else{
    echo "Sudah logout, silahkan ke wikikandidat.com/login dulu...";
  }
});
Route::post("/admin/edit-couple", 'AdminController@edit_couple');

/**
* Pages for reader
*/
//Route::get('/','ElectionController@index');
//Route::post('/', 'ElectionController@index');

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

Route::get('/paslon/{any}', function($any){
  $couple = App\Couple::find($any);
  if($couple)
  {
    $couple->election;
    echo $couple;
  }
});

Route::group(['prefix' => 'json'], function () {
    Route::get('', function () {
        echo App\Election::all();
    });
    Route::get('{any}', function ($any) {
      $election = App\Election::where('urlname', $any)->first();
      if($election)
      {
        $election->couples;
        foreach ($election->couples as $c) {
          $c->candidate->name;
          $c->running_mate->name;
        }
        echo $election;
      }else{
        $candidate = App\Candidate::where('urlname', $any)->first();
        if($candidate)
        {
          echo $candidate;
        }else{
          echo "URL tidak dikenal";
        }
      }
    });

});

Route::get('{electionurl}', function($electionurl){
    $e = App\Election::where('urlname', $electionurl)->first();
    if(count($e->couples) > 2){
      return view('jogja.election')->with('election', $e);
    }
    elseif(count($e->couples) == 2){
      $couples = $e->couples->sortBy('order');
      return view("jogja.comparison",[
                        'election' => $e,
                        'left' => $couples->first(),
                        'right' => $couples->last()
                      ]);
    }elseif(count($e->couples) == 1){
      echo "paslon hanya ada satu, belum diimplementasikan";
    }else{
      echo "paslong dapil ini belum ada";
    }
  });

  Route::get('{electionurl}/{versus}', function($electionurl, $versus){
    $candidates = explode('--vs--', $versus);
    if( count($candidates) == 2 && $candidates[0] != $candidates[1]){
      $e = App\Election::where('urlname', $electionurl)->first();
      $left = false;
      $right = false;
      $couples = $e->couples;
      foreach ($couples as $c) {
        if($c->candidate->urlname == $candidates[0])
        {
          $left = $c;
        }
        if($c->candidate->urlname == $candidates[1])
        {
          $right = $c;
        }
      }
      if($left && $right)
      {
        return view("jogja.comparison",[
                        'election' => $e,
                        'left' => $left,
                        'right' => $right
                      ]);
      }else
      {
        echo "Data kandidat tidak ditemukan di dapil ini.";
      }
    }
  });

//Route::get('{any}', 'ElectionController@election');
//Route::post('{any}', 'ElectionController@election');

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
