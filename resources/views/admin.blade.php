<?php
    $secure = App::environment('production') ? true : NULL;
?>
@extends('layouts.app')

@section('title')
Admin
@endsection

@section('head')
<link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css', $secure)}}">
<link rel="stylesheet" href="{{asset('css/select2.min.css', $secure)}}">
@endsection

@section('content')
    <div class="container">

        <h1>Demi Senyum Pemilih Akibat Informasi yang Lengkap ! <small><a href="https://pilkada2017.kpu.go.id/paslon/tahapPenetapan" target="_blank">pilkada2017.kpu.go.id/paslon/tahapPenetapan</a></small></h1>
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
            <form action="{{url('admin/add-candidate', [], $secure)}}" method="POST">
            <h3>Tambah Kandidat</h3>
            <div class="row">
                <div class="col-sm-4">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Ybs bertanding di</label>
                        <select name="election_id" class="form-control autocomplete">
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
                        <label>Tempat Lahir (cari di ijazah, kosongkan jika tidak ada informasi)</label>
                        <input name="birthcity" type="text" class="form-control">
                    </div>

                    <div class="form-inline">
                        <div class="form-group">
                            <label>Tanggal Lahir (kosongkan jika tidak ada informasi)</label><br>
                            <select name="month" class="form-control">
                                <option value="">Tidak ada informasi</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <input name="date" type="number" class="form-control" min="1" max="31" placeholder="DD">
                            <input name="year" type="number" class="form-control" min="1900" max="2000" placeholder="YYYY">
                        </div>
                    </div>

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
                        <label class="control-label">Kasus Pidana</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="dakwaan"
                                  rows="2"
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
                        <label class="control-label">Sumber dari non Lembaga Pemerintah (Contoh: website tim sukses, website partai, website berita yang punya redaksi dan kantornya jelas)</label>
                        <textarea class="form-control"          style="width:100%;"
                                  name="sumber_non_pemerintah"
                                  rows="2"
                                  ></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </div>
            </form>
            <strong>Kandidat Terbaru:</strong><br>
            @php
                $candidates = App\Candidate::all();
                $candidates = $candidates->sortByDesc('created_at');
            @endphp
            <ul>
            @foreach($candidates as $c)
                <li>
                {{$c->created_at}}: {{$c->name}} @ {{App\User::find($c->entrier_id)->name}}
                </li>
            @endforeach
            </ul>
        </div>  

        <div role="tabpanel" class="tab-pane" id="tambahdapil">
            <h3>Tambah Dapil</h3>
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{url('admin/add-election', [], $secure)}}" method="POST">
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
                <div class="col-sm-6">
                    <strong>Dapil Terbaru:</strong><br>
                    @php
                        $elections = App\Election::all();
                        $elections = $elections->sortByDesc('created_at');
                    @endphp
                    <ul>
                    @foreach($elections as $e)
                        <li>
                        {{$e->name}} <span class="pull-right">{{$e->created_at}}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="tambahpartai">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah Partai</h3>
                    <form action="{{url('admin/add-party', [], $secure)}}" method="POST">
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
            <form action="{{url('admin/add-couple', [], $secure)}}" method="POST">
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Tambah Pasangan</h3>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Ketua</label>
                            <select name="candidate_id" class="form-control autocomplete">
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
                            <select name="running_mate_id" class="form-control autocomplete">
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
                            <select name="election_id" class="form-control autocomplete">
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
                        <div class="form-group">
                            <label>Website Kampanye</label>
                            <input name="website" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slogan</label>
                            <input name="slogan" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Visi</label>
                            <input name="visi" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Misi</label>
                            <textarea class="form-control"
                                      name="misi"
                                      rows="2"
                                      ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Program</label>
                            <textarea class="form-control"
                                      name="program"
                                      rows="2"
                                      ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sumber Data-Data di atas</label>
                            <textarea class="form-control"
                                      name="sumber"
                                      rows="2"
                                      ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @php
                            $parties = App\Party::all();
                            $parties = $parties->sortBy('abbreviation');
                        @endphp
                        @foreach($parties as $p)
                            <div class="checkbox">
                              <label>
                                <input  type="checkbox"
                                        value="{{$p->id}}"
                                        name="party[]">
                                <strong>{{$p->abbreviation}}</strong> ({{$p->name}})
                              </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-default">Tambah Pasangan</button>
                    </div>
                </div>
                <strong>Pasangan Terbaru:</strong><br>
                @php
                    $couples = App\Couple::all();
                    $couples = $couples->sortByDesc('created_at');
                @endphp
                <ul>
                @foreach($couples as $c)
                    <li>
                    <strong>{{$c->created_at}}</strong><br>
                    {{$c->election->name}}<br>
                    {{$c->candidate->urlname}} &amp; {{$c->running_mate->urlname}}
                    </li>
                @endforeach
                </ul>
            </form>
        </div>
        
        <!--
        <div role="tabpanel" class="tab-pane" id="tambahverifikator">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah Universitas</h3>
                    <form action="{{url('admin/add-uni', [], $secure)}}" method="POST">
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
                    <form action="{{url('admin/promote-verifier', [], $secure)}}" method="POST">
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

    <script type="text/javascript" src="{{asset('js/select2.full.min.js', $secure)}}"></script> 
    <script type="text/javascript">
        $(document).ready( function () {
            $("select.autocomplete").select2({ width: '100%' });
        });
    </script>

    <script src="{{asset('js/bootstrap3-wysiwyg/wysihtml5x-toolbar.min.js', $secure)}}"></script>
    <script src="{{asset('js/bootstrap3-wysiwyg/handlebars.runtime.min.js', $secure)}}"></script>
    <script src="{{asset('js/bootstrap3-wysiwyg/bootstrap3-wysihtml5.min.js', $secure)}}"></script>
    <script>
        $(document).ready( function () {
          $('textarea').wysihtml5({
            toolbar: {
                "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false, //Button to change color of font  
                "blockquote": false, //Blockquote 
            },
            "size": "xs"
          });
          window.getSelection().removeAllRanges();
        });
    </script>
@endsection