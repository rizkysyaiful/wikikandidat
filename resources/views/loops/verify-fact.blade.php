
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <h3>{{$j->fact->text}}</h3>
                    <a href="{{$j->eternal_url}}">{{$j->eternal_url}}</a><br><br>
                    <em>Apa benar {{Auth::user()->name}}?</em> 
                </div>
                <div class="col-md-4">
                    <form method="POST" action="student/approve-fact">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Kenapa buktinya dianggap valid?</label>
                            <input type="text" class="form-control" placeholder="" value="" name="comment">
                        </div>
                        <div class="form-group">
                            <label>Teks fakta yang lebih sesuai</label>
                            <input type="text" class="form-control" placeholder="" value="{{$j->fact->text}}" name="text">
                        </div>
                        <div class="form-group">
                            <label>Judul dari tautan ke bukti</label>
                            <input type="text" class="form-control" placeholder="Umumnya diisi pihak otoritas yang merilis bukti. Juga semacam 'Panama Papers', 'Youtube'." value="{{$j->title}}" name="title">
                        </div>
                        <div class="form-group">
                            <label>Alamat Archive.org</label>
                            <input type="text" class="form-control" placeholder="" value="{{$j->eternal_url}}" name="eternal_url">
                        </div>
                        <div class="form-group">
                            <label>ID Google Drive Skrinsut Bukti</label>
                            <input type="text" class="form-control" placeholder="" value="{{$j->photo_id}}" name="photo_id">
                        </div>
                        <div class="form-group">
                            <label>Tahun Mulai</label>
                            <input type="number" class="form-control" placeholder="" value="{{$j->fact->year_start}}" name="year_start">
                        </div>
                        <div class="form-group">
                            <label>Tahun Selesai / Tahun Terjadi</label>
                            <input type="number" class="form-control" placeholder="" value="{{$j->fact->year_end}}" name="year_end">
                        </div>

                        <input type="hidden" name="fact_id" value="{{$j->fact->id}}">
                        <input type="hidden" name="reference_id" value="{{$j->id}}">
                        <button type="submit" class="btn btn-primary">Setujui</button>
                    </form>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            
        </div>
    </div>
