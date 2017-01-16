@extends('layouts.app')

@section('title')
Admin
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css">
<style type="text/css">
    
</style>
@endsection

@section('content')
    <div class="container">

        <h1>Demi Senyum Pemilih Akibat Informasi yang Lengkap !</h1>
        <hr>

        <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tambahkandidat" role="tab" data-toggle="tab">Tambah Kandidat</a></li>
        <li role="presentation"><a href="#tambahdapil" role="tab" data-toggle="tab">Tambah Dapil</a></li>
        <li role="presentation"><a href="#tambahpasangan" role="tab" data-toggle="tab">Tambah Pasangan</a></li>
        <li role="presentation"><a href="#tambahpartai" role="tab" data-toggle="tab">Tambah Partai</a></li>
        <!--<li role="presentation"><a href="#tambahverifikator" role="tab" data-toggle="tab">Tambah Verifikator</a></li>-->
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="tambahkandidat">
            <form action="{{url('admin/add-candidate')}}" method="POST">
            <h3>Tambah Kandidat</h3>
            <div class="row">
                <div class="col-sm-4">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Ybs bertanding di</label>
                        <select name="election_id" class="form-control">
                          <?php
                            $elections = App\Election::all();
                            $elections = $elections->sortByDesc('created_at');
                          ?>
                          @foreach($elections as $e)
                            <option value="{{$e->id}}">{{$e->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Lengap (plus gelar &amp; hanya huruf pertama nama yang besar)</label>
                        <input name="name" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Panggilan (<em>Tebak saja kalau tidak tahu nama panggilannya apa</em>)</label>
                        <input name="nickname" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username (wikikandidat.com/NamaURL) &mdash; format: namadominan_singkatannamasisanya &mdash; contoh: bh_obama atau sherlock_h (jika kebetulan sudah ada, tambah angka di ujung akhir contoh sherlock_h2. <em>Tebak saja kalau tidak tahu nama dominannya yang mana</em>)</label>
                        <input name="urlname" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Photo URL &mdash; copy alamat foto ybs di pilkada2017.kpu.go.id &mdash; <strong>jangan lupa tugas 'save as' foto dengan nama file NamaURL di atas (tanpa extension seperti png atau jpg)</strong></label>
                        <input name="photo_url" type="text" class="form-control" required="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Pendidikan</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="pendidikan"
                                  rows="5" 
                                  ></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Karir/Organisasi</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="karir"
                                  rows="5"
                                  ></textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Penghargaan (award resmi)</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="penghargaan"
                                  rows="5"
                                  ></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sumber dari Lembaga Pemerintah (Contoh: KPU, DPR.go.id, dll)</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="sumber_pemerintah"
                                  rows="2"
                                  ></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sumber dari non Lembaga Pemerintah (Contoh: website tim sukses atau website partai)</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="sumber_non_pemerintah"
                                  rows="2"
                                  ></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </div>
            </form>
        </div>  

        <div role="tabpanel" class="tab-pane" id="tambahdapil">
            <h3>Tambah Dapil</h3>
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{url('admin/add-election')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tingkat</label>
                            <select name="level" class="form-control">
                                <option value="1">Provinsi</option>
                                <option value="2">Kota</option>
                                <option value="3">Kabupaten</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Tempat (tanpa awalan Prov. / Kab. / atau Kota) &mdash; Contoh: Banten / Tangerang</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Video-video debat yang ada seluruh pasangan di Youtube &mdash; Bisa lebih dari satu. Contoh: qp0HIF3SfI4, PTarGryqEuk</label>
                            <input name="description" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="tambahpartai">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah Partai</h3>
                    <form action="{{url('admin/add-party')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama Partai</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Singkatan Partai (Samakan saja jika tidak ada singkatannya)</label>
                            <input name="abbreviation" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>URL Logo Partai</label>
                            <input name="photo_url" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">Tambah Partai</button>
                    </form>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
          
        </div>

        <div role="tabpanel" class="tab-pane" id="tambahpasangan">
            <div class="row">
                <form action="{{url('admin/add-couple')}}" method="POST">
                <div class="col-sm-4">
                    <h3>Tambah Pasangan</h3>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Ketua</label>
                            <select name="candidate_id" class="form-control">
                              <?php
                                $candidates = App\Candidate::all();
                                $candidates = $candidates->sortByDesc('created_at');
                              ?>
                              @foreach($candidates as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Wakil</label>
                            <select name="running_mate_id" class="form-control">
                              <?php
                                $candidates = App\Candidate::all();
                                $candidates = $candidates->sortByDesc('created_at');
                              ?>
                              @foreach($candidates as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nomor Urut</label>
                            <input name="order" type="number" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Di Dapil</label>
                            <select name="election_id" class="form-control">
                              <?php
                                $elections = App\Election::all();
                                $elections = $elections->sortByDesc('created_at');
                              ?>
                              @foreach($elections as $e)
                                <option value="{{$e->id}}">{{$e->name}}</option>
                              @endforeach
                            </select>
                        </div>
                </div>
                <div class="col-sm-4">
                    @php
                        $parties = App\Party::all();
                        $parties = $parties->sortBy('name');
                    @endphp
                    @foreach($parties as $p)
                        <div class="checkbox">
                          <label>
                            <input  type="checkbox"
                                    value="{{$p->id}}"
                                    name="party[]">
                            {{$p->name}} ({{$p->abbreviation}})
                          </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-default">Tambah Pasangan</button>
                </div>
                <div class="col-sm-4">
                    
                </div>
                </form>
            </div>
        </div>
        
        <!--
        <div role="tabpanel" class="tab-pane" id="tambahverifikator">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah Universitas</h3>
                    <form action="{{url('admin/add-uni')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Singkatan</label>
                            <input name="abbreviation" type="text" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Tempat</label>
                            <select name="place_id" class="form-control">
                              <?php
                                $provinces = App\Place::all();
                                $provinces = $provinces->sortByDesc('created_at');
                              ?>
                              @foreach($provinces as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Simpan</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h3>Tambah Verifikator</h3>
                    <form action="{{url('admin/promote-verifier')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama &amp; Email Pengguna</label>
                            <select name="user_id" class="form-control">
                              <?php
                                $users = App\User::where('is_verifier', 0)->get();
                              ?>
                              @foreach($users as $u)
                                <option value="{{$u->id}}">{{$u->name}} - {{$u->email}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Institusi Pendidikan Pengguna</label>
                            <select name="university_id" class="form-control">
                              <?php
                                $uni = App\University::all();
                              ?>
                              @foreach($uni as $u)
                                <option value="{{$u->id}}">{{$u->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Daerah Tugas di Dapil</label>
                            <select name="place_id" class="form-control">
                              <?php
                                $places = App\Place::all();
                              ?>
                              @foreach($places as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Buat Dia Jadi Verifikator</button>
                    </form>
                </div>
            </div>
        </div> -->
                
                
        </div>
    </div>
@endsection

@section('js')
    <script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/wysihtml5x/dist/wysihtml5x-toolbar.min.js"></script>
    <script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/handlebars/handlebars.runtime.min.js"></script>
    <script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.js"></script>
    <script>
      $('textarea').wysihtml5({
        toolbar: {
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false, //Button to change color of font  
            "blockquote": false, //Blockquote 
        },
        "size": "xs"
      });
      window.getSelection().removeAllRanges();
    </script>
@endsection