
    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <h5><strong>Fakta &amp; Bukti yang harus diverifikasi</strong></h5>
                <hr>
                <p>
                    Fakta:<br>
                    {{$j->fact->text}}
                </p>
                <p>
                    Link ke bukti:<br>
                    <a href="{{$j->eternal_url}}">{{$j->eternal_url}}</a>
                </p>
                <p>
                    <em>Hayo {{Auth::user()->name}}... Apa faktanya relevan buat ditambahkan? Kalau relevan, apa buktinya cukup otentik?</em>
                </p> 
            </div>
            <div class="col-md-4">
                <h5><strong>&#10140; Kalau kamu pikir layak</strong></h5>
                <hr>
                <form method="POST" action="student/approve-fact">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label>Kenapa buktinya dianggap valid?</label>
                        <textarea class="form-control" name="comment" rows="3"></textarea>
                        @if ($errors->has('comment'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
                        <label>Teks fakta yang lebih sesuai</label>
                        <textarea class="form-control" name="text" rows="4">{{$j->fact->text}}</textarea>
                        @if ($errors->has('text'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('text') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>Perilis bukti (nama media massa)</label>
                        <input type="text" class="form-control" value="{{$j->title}}" name="title">
                        @if ($errors->has('title'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('eternal_url') ? ' has-error' : '' }}">
                        <label>Alamat Archive.org</label>
                        <textarea class="form-control" name="eternal_url" rows="3">{{$j->eternal_url}}</textarea>
                        @if ($errors->has('eternal_url'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('eternal_url') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('photo_id') ? ' has-error' : '' }}">
                        <label>ID Google Drive Skrinsut Bukti</label>
                        <input type="text" class="form-control" placeholder="" value="{{$j->photo_id}}" name="photo_id">
                        <img style="width: 100%;" src="https://docs.google.com/uc?id={{$j->photo_id}}">
                        @if ($errors->has('photo_id'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('photo_id') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('year_start') ? ' has-error' : '' }}">
                        <label>Tahun Mulai</label>
                        <input type="number" class="form-control" placeholder="" value="{{$j->fact->year_start}}" name="year_start">
                        @if ($errors->has('year_start'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('year_start') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('year_end') ? ' has-error' : '' }}">
                        <label>Tahun Selesai / Tahun Terjadi</label>
                        <input type="number" class="form-control" placeholder="" value="{{$j->fact->year_end}}" name="year_end">
                        @if ($errors->has('year_end'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('year_end') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <input type="hidden" name="fact_id" value="{{$j->fact->id}}">
                    <input type="hidden" name="reference_id" value="{{$j->id}}">
                    <button type="submit" class="btn btn-primary">Setujui</button>
                </form>
            </div>
            <div class="col-md-4">
                <h5><strong>&#10140; Kalau kamu pikir tidak layak</strong></h5>
                <hr>
                <form method="POST" action="student/reject-fact">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('rejection_reason') ? ' has-error' : '' }}">
                        <label>Kenapa fakta atau buktinya dianggap tidak valid?</label>
                        <input type="text" class="form-control" placeholder="" value="" name="rejection_reason">
                        @if ($errors->has('rejection_reason'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('rejection_reason') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <input type="hidden" name="fact_id" value="{{$j->fact->id}}">
                    <input type="hidden" name="reference_id" value="{{$j->id}}">
                    <button type="submit" class="btn btn-primary">Tolak</button>
                </form>
            </div>
        </div>
    </div>
