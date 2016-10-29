
    <?php
        $is_additional_reference = false;
        if($j->fact->is_verified == true)
            $is_additional_reference = true;
    ?>

    <div class="well" style="background:  
        @if($is_additional_reference)
            @if(isset($j->successor_id))
                #ffe5e5
            @else
                #e5f1ff
            @endif
        @else
            #fffce5
        @endif
    ">
        <div class="row">
            <div class="col-md-4 dont-break-out">
                <h5>
                    <strong>
                        Pertanyaan Verifikasi 
                    </strong>
                </h5>
                <hr>
                <p>
                    Menurut {{Auth::user()->name}}
                </p>
                @if($is_additional_reference)
                    @if(isset($j->successor_id))
                        <p>
                            apakah
                        </p>
                        <p>
                            <em><a href="{{$j->eternal_url}}" target="_blank">{{$j->eternal_url}}</a></em>
                        </p>
                        <p>
                            lebih kredibel dari 
                        </p>
                        <p>
                            <em><a href="{{$j->successor->eternal_url}}" target="_blank">{{$j->successor->title}}</a></em> ?
                        </p>
                        <p>
                            Apakah {{$j->eternal_url}} juga menyatakan fakta tentang {{$j->fact->candidate->name}} di bawah ini?
                        </p>
                        <div class="bs-callout bs-callout-default">
                            {!!markdown($j->fact->text)!!}
                        </div>
                        <p>
                            Berarti boleh-kah <em><a href="{{$j->eternal_url}}" target="_blank">{{$j->eternal_url}}</a></em> menggantikan <em><a href="{{$j->successor->eternal_url}}" target="_blank">{{$j->successor->eternal_url}}</a></em>?
                        </p>
                    @else
                        <!-- Menambah reference ke fakta  -->
                        <p>
                            apakah sumber 
                        </p>
                        <p>
                            <em><a href="{{$j->eternal_url}}" target="_blank">{{$j->eternal_url}}</a></em>
                        </p>
                        <p>
                            cukup kredibel?
                        </p>
                        <p>
                            Pengaju bukti ini bilang "{{$j->reason}}" belum ada di fakta di bawah ini
                        </p>
                        <div class="bs-callout bs-callout-default">
                            {!!markdown($j->fact->text)!!}
                        </div>
                        <p>
                            Apa itu benar?
                        </p>
                        <p>
                            Meskipun benar, apa memang belum ada di sumber bukti di bawah ini (sehingga harus menambah bukti baru ini)?
                        </p>
                        <?php
                            $existing_references = $j->fact->references
                                ->where('first_verifier_id', null)
                                ->where('second_verifier_id', null)
                                ->where('third_verifier_id', null);
                        ?>
                        <ul>
                        @foreach($existing_references as $r)
                            <li><a href="{{$r->eternal_url}}">{{$r->eternal_url}}</a></li>
                        @endforeach
                        </ul>
                        <p>
                            Apakah hal baru itu bermanfaat untuk pembaca Wikikandidat.com? 
                        </p>
                    @endif
                @else
                    <!-- Menambah fakta baru berikut buktinya -->
                    <p>
                        apakah sumber 
                    </p>
                    <p>
                        <em><a href="{{$j->eternal_url}}" target="_blank">{{$j->eternal_url}}</a></em>
                    </p>
                    <p>
                        cukup kredibel?
                    </p>
                    <p>
                        Pengaju bukti tersebut bilang fakta berikut
                    </p>
                    <div class="bs-callout bs-callout-default">
                        {!!markdown($j->fact->text)!!}
                    </div>
                    <p>
                        cukup penting untuk ada di halaman {{$j->fact->candidate->nickname}} Wikikandidat.com.
                    </p>
                    <p>
                        Apa kamu setuju?
                    </p>
                @endif
                <p>
                    <span class="label label-primary"><strong>
                        Pengaju Bukti:
                    </strong></span><br>
                    {{$j->submitter->name}}
                </p>
            </div>
            <div class="col-md-4">
                <h5><strong class="text-success">&#10140; Kalau kamu pikir semua jawabannya "iya"</strong></h5>
                <hr>
                <form method="POST" action="student/approve-fact">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label>
                        @if($is_additional_reference)
                            @if(isset($j->successor_id))
                                Kenapa buktinya kredibel dan layak menggantikan bukti lama?
                            @else
                                Kenapa buktinya kredibel dan layak digabungkan bersama bukti-bukti yang sudah ada?
                            @endif
                        @else
                            Kenapa bukti ini kredibel dan fakta baru ini penting dibaca publik?
                        @endif
                        </label>
                        <textarea class="form-control" name="comment" rows="3"></textarea>
                        @if ($errors->has('comment'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <h5><strong><em>Ada yang mau diubah dari sisi fakta (yang terlihat di halaman depan wikikandidat)?</em></strong></h5>
                    <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
                        <label>
                            @if($is_additional_reference)
                                @if(isset($j->successor_id))
                                    Teks fakta? (harusnya ini tidak berubah, karena bukti baru hanya menggantikan bukti lama)
                                @else
                                    Dengan bukti baru ini, teks fakta-nya berubah jadi seperti apa? (khusus untuk kontroversi, gunakan nomor 1. 2. 3. setiap baris poin.)
                                @endif
                            @else
                                Teks fakta yang nanti akan dibaca publik baiknya seperti apa?
                            @endif
                        </label>
                        <textarea class="form-control" name="text" rows="4">{{$j->fact->text}}</textarea>
                        @if ($errors->has('text'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('text') }}</strong>
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
                    <?php
                        $avalaible_types = App\Type::all();
                    ?>
                    <div class="form-group">
                        <label>Kategori Fakta</label>
                        <select class="form-control" name="type_id">
                            @foreach($avalaible_types as $t)
                            <option 
                                @if($t->id == $j->fact->type_id)
                                selected="selected" 
                                @endif
                            value="{{$t->id}}">{{$t->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h5><em><strong>Ada yang mau diubah dari sisi bukti?</strong></em></h5>
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
                        @if($j->photo_id != "")
                            <img style="width: 100%;" src="https://docs.google.com/uc?id={{$j->photo_id}}">
                        @endif
                        @if ($errors->has('photo_id'))
                        <div class="has-error">
                            <span class="help-block">
                                <strong>{{ $errors->first('photo_id') }}</strong>
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
                <h5><strong class="text-danger">&#10140; Kalau ada yang jawabannya "tidak"</strong></h5>
                <hr>
                <form method="POST" action="student/reject-fact">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('rejection_reason') ? ' has-error' : '' }}">
                        <label>Bisa jelaskan alasan dari setiap "tidak" tersebut?</label>
                        <textarea class="form-control" rows="3" name="rejection_reason"></textarea>
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
