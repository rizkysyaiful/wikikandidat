<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Wikikandidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.css" media="screen">
    <link rel="stylesheet" href="https://bootswatch.com/assets/css/custom.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://bootswatch.com/bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="https://bootswatch.com/bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      /* bootstrap manipulation */
      .panel-body {
        background-color: rgba(240,240,240,1);
      }
      .panel{
        border: none;
      }
      /* self-made */
      .panel-body > .head{
        text-align: center
      }
      .panel-body > .head > img{
        width: 100%;
      }
      .panel-body > .data{
        border: 1px solid #cacaca;
        padding: 2px 5px;
        margin-bottom: 5px; 
      }
      .panel-body .verification-btn{
        margin-top: 3px;
        cursor: pointer;
      }
      .panel-body > h5{
        color: #008cba;
        font-weight: bold;
      }
      .random-quote{
        max-width: 300px;
        margin-top: 25px;
        text-align: right;
      }
    </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=125602920880407";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">Wikikandidat</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Pilkada 2017</a>
            </li>
            <li>
              <a href="#">Pileg 2014</a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="about-us">Tentang Kami <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="about-us">
                <li><a href="#">Sejarah</a></li>
                <li><a href="#">Tujuan</a></li>
                <li><a href="#">Tim Kerja</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="about-us">Register <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="about-us">
                <li><a href="#">Sebagai Verifikator</a></li>
                <li><a href="#">Sebagai Donatur</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="about-us">Login <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="about-us">
                <li><a href="#">Sebagai Verifikator</a></li>
                <li><a href="#">Sebagai Donatur</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <span class="pull-right random-quote"><em>"Demokrasi tidak bisa hanya berisi pemilu, yang hampir selalu fiktif dan diatur oleh tuan tanah serta politisi profesional."<br>~ Che Guavara</em></span>
      <h1>Pilkada 2017</h1>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Aceh</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div>
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-lg">Banda Aceh</a>
        <a href="#" class="btn btn-default btn-lg dropdown-toggle " data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div>
      <hr>
      <ul class="nav nav-tabs">
        <li class="active"><a href="#primary-tab" class="btn-md" data-toggle="tab" aria-expanded="true">Calon Wakilkota</a></li>
        <li class=""><a href="#vice-tab" class="btn-md" data-toggle="tab" aria-expanded="false">Calon Wakil Walikota</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="primary-tab">
          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default" >
                <div class="panel-body">
                  <div class="head">
                    <img src="http://speakerdata.s3.amazonaws.com/photo/image/848865/Tri_Rismaharini1.jpg" alt="">
                    <h3><strong>Tri Rismaharini</strong></h3>
                    Calon Wakil : <a href="#" class="link-to-vice-tab">Wisnu Sakti Buana</a>
                  </div>
                  <h5>Karir:</h5>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2010-2016</strong><br>
                    Walikota Surabaya
                  </div>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2008-2010</strong><br>
                    Kepala Badan Perencanaan Pembangunan Kota Surabaya
                  </div>
                  <h5>Organisasi:</h5>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2016-2016</strong><br>
                    Dewan Penasihat Asosiasi Arsitek Indonesia 
                  </div>
                  <h5>Pendidikan:</h5>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2002</strong><br>
                    Pascasarjana Manajemen Pembangunan Kota di ITS (Lulus) 
                  </div>
                  <h5>Prestasi:</h5>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2015</strong><br>
                    Termasuk 50 tokoh berpengaruh di dunia versi majalah Fortune. 
                  </div>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2015</strong><br>
                    Menutup tempat pelacuran Gang Dolly 
                  </div>
                  <h5>Kontroversi:</h5>
                  <div class="data">
                    <span class="label label-primary pull-right verification-btn" data-toggle="modal" data-target="#myModal">
                      referensi
                    </span>
                    <strong>2015</strong><br>
                    Laporan PT. Gala Bumi Perkasa, atas lalai membongkar pasar Turi
                  </div>
                  <h5>Testimoni</h5>
                  <div class="fb-comments" data-href="https://facebook.com" data-width="335" data-numposts="5"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="vice-tab">
          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Referensi</h5>
          </div>
          <div class="modal-body">
            <a href="https://web.archive.org/web/20160916120336/http://www.surabaya.go.id/berita/8058-daftar-nama-&-alamat-walikota,-sekdakota-dan-asisten-pemerintah-kota-surabaya">Surabaya.go.id, 16 September 2016</a><br>
            <span>Data diajukan oleh:  <a href="#">Surip</a></span><br>
            <span>Diverifikasi secara terpisah oleh: <a href="#">Rizky</a>, <a href="#">Lulu</a></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://bootswatch.com/assets/js/custom.js"></script>
    <script>
      $('.link-to-vice-tab').click(function (e) {
        e.preventDefault();
        $("a[href='#vice-tab']").click();
      });
    </script>
  </body>
</html>