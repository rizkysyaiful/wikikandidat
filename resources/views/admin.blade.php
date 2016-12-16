@extends('layouts.app')

@section('title')
Admin
@endsection

@section('head')
<style type="text/css">
    
</style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="well well-sm">
                    <h3>Tambah Tempat</h3>
                    <form action="{{url('admin/add-place')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Nama Tempat</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Kabupaten / kota dari provinsi</label>
                            <select name="parent_id" class="form-control">
                              <option value="0">(Hey! Tempat ini provinsi)</option>
                              <?php
                                $provinces = App\Place::where('level', '=', 1)->get();
                              ?>
                              @foreach($provinces as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                              @endforeach
                            </select>
                        </div>
                         <button type="submit" class="btn btn-default">Simpan</button>
                    </form>
                </div>
                
                <div class="well well-sm">
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
                              ?>
                              @foreach($provinces as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Simpan</button>
                    </form>

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
                        <button type="submit" class="btn btn-default">Buat Dia Jadi Verifikator</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well well-sm">
                    <h3>Tambah Pemilihan</h3>
                    <form action="{{url('admin/add-election')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama &mdash; format: Pilkada [NamaTempat]</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">URL &mdash; format: pilkada-2017-[NamaTempatSingkatan]</label>
                            <input name="urlname" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Tempat</label>
                            <select name="place_id" class="form-control">
                              <?php
                                $provinces = App\Place::all();
                              ?>
                              @foreach($provinces as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Simpan</button>
                    </form>
                    <h3>Tambah Kandidat</h3>
                    <form action="{{url('admin/add-candidate')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Panggilan</label>
                            <input name="nickname" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">URL &mdash; format: namautama_singkatannamasisanya</label>
                            <input name="urlname" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Photo URL</label>
                            <input name="photo_url" type="text" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-default">Simpan</button>
                    </form>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well well-sm">
                    <h3>Tambah Pasangan</h3>
                    <form action="{{url('admin/add-couple')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Ketua</label>
                            <select name="candidate_id" class="form-control">
                              <?php
                                $candidates = App\Candidate::all();
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
                            <label>Di Pemilihan</label>
                            <select name="election_id" class="form-control">
                              <?php
                                $elections = App\Election::all();
                              ?>
                              @foreach($elections as $e)
                                <option value="{{$e->id}}">{{$e->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Tambah Pasangan</button>
                    </form>
                    <h3>Tambah Partai</h3>
                    <form action="{{url('admin/add-party')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama Partai</label>
                            <input name="name" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Singkatan Partai</label>
                            <input name="abbreviation" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>URL Logo Partai</label>
                            <input name="photo_url" type="text" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-default">Tambah Partai</button>
                    </form>
                    <h3>Tambah Partai ke Pasangan</h3>
                    <form action="{{url('admin/assign-party-to-couple')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama Pasangan</label>
                            <select name="couple_id" class="form-control">
                                <?php
                                $couples = App\Couple::all();
                                ?>
                                @foreach($couples as $c)
                                    <option value="{{$c->id}}">{{$c->candidate->nickname}}-{{$c->running_mate->nickname}} @ {{$c->election->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Partai Pendukung</label>
                            <select name="party_id" class="form-control">
                                <?php
                                $parties = App\Party::all();
                                ?>
                                @foreach($parties as $p)
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Tambah Dukungan</button>
                    </form>
                </div>
            </div>
        </div>
        
            
        
        
    </div>
@endsection