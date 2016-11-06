
    <?php
        $is_new = false;
        if($s->fact_id == null)
        {
            $is_new = true;
        }

        $latest_edit = null;
        if(count($s->edits) != 0)
        {
            $latest_edit = $s->edits->last();
        }
        
        $temp;
        $text = "";
        $date_s = "";
        $month_s = "";
        $year_s = "";
        $date_f = "";
        $month_f = "";
        $year_f = "";
        if($latest_edit)
        {
            $temp = $latest_edit;
            $text = $latest_edit->text;
        }
        elseif(!$is_new)
        {
            $temp = $s->fact;
            $text = $s->fact->text;
        }
        if($latest_edit OR !$is_new)
        {
            $date_s = (int)substr($temp->date_start, 8, 10);
            $month_s = (int)substr($temp->date_start, 5, -3);
            $year_s = (int)substr($temp->date_start, 0, 4);
            $date_f = (int)substr($temp->date_finish, 8, 10);
            $month_f = (int)substr($temp->date_finish, 5, -3);
            $year_f = (int)substr($temp->date_finish, 0, 4);
        }
    ?>
    
    <div class="well" style="background:
        @if( $is_new )
            #e5f1ff
        @else
            #ffe5e5
        @endif
    ">
        <?php $datetime = new DateTime($s->created_at); ?>
        Pada {{$datetime->format('j M H:i')}}, {{$s->submitter->name}} menyarankan informasi
        <hr>
            {!!markdown($s->text)!!}
        <hr>
        @if( $is_new )
            untuk dimunculkan di halaman kandidat {{$s->candidate->nickname}} di kategori {{$s->type->name}}.
        @else
            untuk diintegrasikan ke fakta kandidat {{$s->candidate->nickname}} berikut<br>
            <div class="bs-callout bs-callout-default">
                {!!markdown($s->fact->text)!!}
            </div>
        @endif


        <ul class="nav nav-pills nav-justified"
            role="tablist"
            style="margin-top: 20px;" 
        >
            <li role="presentation" class="active">
                <a  href="#agree" 
                    aria-controls="agree"
                    role="tab"
                    data-toggle="tab"
                >
                    Ide Bagus
                </a>
            </li>
            <li role="presentation">
                <a  href="#disagree" 
                    aria-controls="disagree" 
                    role="tab" 
                    data-toggle="tab"
                >
                    Hmm.. Ide Buruk
                </a>
            </li>
        </ul>
        <hr>
        <div class="tab-content">
            <div    role="tabpanel" 
                    class="tab-pane active" 
                    id="agree">
                @if($latest_edit)
                    <p>
                        Berarti kamu setuju ya.
                    </p>
                    <p>
                        Nah, verifikator sebelumnya sudah melakukan edit di bawah ini.
                    </p>
                    <div class="bs-callout bs-callout-default">
                        {!!markdown($latest_edit->text)!!}
                    </div>
                @endif
                <form   method="POST"
                        action="student/create_edit">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>
                            @if(!$latest_edit)
                                Tulis teks fakta terbaik untuk dibaca pengguna Wikikandidat, terkait 
                                @if($is_new)
                                    adanya
                                @else
                                    integrasi
                                @endif
                                informasi baru ini.<br>
                                ( Silahkan riset: Tambah poin-poin baru berikut buktinya. Juga ubah bukti yang diajukan {{$s->submitter->name}} dengan yang lebih kredibel.
                            @else
                                Tolong pelajari hasil edit di atas. Jika menemukan kesalahan edit, atau sumber yang tidak cukup kredibel, tolong ubah. Kalau merasa ada yang kurang, silahkan tambahkan. Kalau ada yang tidak penting, silahkan hilangkan. (
                            @endif
                            Ingat, Wikikandidat adalah kurasi fakta dari berbagai sumber, bukan tempat beropini. Ingat juga, semua hasil edit kamu akan tampil ke publik. Jangan mempermalukan diri kamu dengan sengaja tidak netral. )
                        </label>
                        <textarea   class="form-control" 
                                    name="text" 
                                    rows="5"
                                    required>{{$text}}</textarea>
                    </div>
                        
                    <div class="form-group">
                        <label>
                            Tulis penjelasan-penjelasan tambahan mengenai edit-edit yang  kamu lakukan di atas.<br>
                            ( Contoh: "saya menambah B karena P", atau "Q saya hilangkan karena Z &amp; Y", atau "hasil edit sudah bagus dan sumber-sumbernya kredibel, tidak ada yang saya ubah". Ingat, perubahan boleh lebih dari satu.)
                        </label>
                        <textarea   class="form-control" 
                                    name="comment" 
                                    rows="2"
                                    required></textarea>
                    </div>

                    <div    class="form-inline"
                            style="margin-bottom: 15px;">
                        <label>Waktu dimulainya fakta di atas.<br>( Tanggal, bulan, atau tahun bisa diisi 0 kalau memang tidak tahu )</label><br>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="number"
                                min="0"
                                max="31" 
                                class="form-control input-sm"
                                name="date_s"
                                style="width: 60px;"
                                required
                                value="{{$date_s}}">
                        </div>
                        <div class="form-group">
                            <label>Bulan</label>
                            <input type="number"
                                min="0"
                                max="12"
                                class="form-control input-sm"
                                name="month_s"
                                style="width: 60px;"
                                required
                                value="{{$month_s}}">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input  type="number"
                                class="form-control input-sm"
                                name="year_s"
                                style="width: 80px;"
                                required
                                value="{{$year_s}}">
                        </div>
                    </div>

                    <div    class="form-inline"
                            style="margin-bottom: 15px;">
                        <label>Waktu selesainya fakta di atas.<br>( Jika formatnya bukan rentang, buat waktu mulai bernilai 0 semua. Jika masih berlangsung, isi waktu saat ini. Kalau ada tanggal, harus ada bulan. Kalau ada bulan, harus ada tahun. )</label><br>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="number"
                                min="0"
                                max="31" 
                                class="form-control input-sm"
                                name="date_f"
                                style="width: 60px;"
                                required
                                value="{{$date_f}}">
                        </div>
                        <div class="form-group">
                            <label>Bulan</label>
                            <input type="number"
                                min="0"
                                max="12"
                                class="form-control input-sm"
                                name="month_f"
                                style="width: 60px;"
                                required
                                value="{{$month_f}}">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input  type="number"
                                class="form-control input-sm"
                                name="year_f"
                                style="width: 80px;"
                                required
                                value="{{$year_f}}">
                        </div>
                    </div>

                    <input  type="hidden"
                            name="submission_id"
                            value="{{$s->id}}">
                    <input  type="hidden"
                            name="type_id"
                            value="{{$s->type_id}}">
                    <button type="submit"
                            class="btn btn-primary">Simpan hasil edit</button>
                </form>
            </div>
            <div    role="tabpanel"
                    class="tab-pane" 
                    id="disagree"
            >
                <form   method="POST"
                        action="student/reject_submission">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Alasan kenapa tidak bagus<br>
                        ( Contoh: "Bukan hal yang penting untuk pembaca Wikikandidat", atau "sumbernya kurang valid", atau "sudah disebut di fakta lain" )</label>
                        <textarea class="form-control" 
                                    name="rejection_reason" 
                                    rows="5"
                                    required></textarea>
                    </div>
                    <input  type="hidden"
                            name="submission_id"
                            value="{{$s->id}}">
                    <button type="submit"
                            class="btn btn-primary">Simpan hasil edit</button>
                </form>
            </div>
        </div>
    </div>