
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
        
        <?php
            // TODO, refactor ini jadi global function, hapus juga yang di fact panel page page
            function flexible_date($db_date)
            {
              $date = (int)substr($db_date, 8, 10);
              $month = (int)substr($db_date, 5, -3);
              $year = (int)substr($db_date, 0, 4);
              $month_opt = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
              $output = "";
              $output = $date != 0 ? $date." " : "";
              $output .= $month != 0 ? $month_opt[$month-1]." " : "";
              $output .= $year != 0 ? $year : "";
              return $output;
            }
        ?>
        @if(!$is_new)
            <strong>{{$s->candidate->nickname}}, {{$s->fact->type->name}}</strong>
            <div class="bs-callout bs-callout-default" style="margin-top: 5px;">
                <?php
                    $fact_start = flexible_date($s->fact->date_start);
                    $fact_finish = flexible_date($s->fact->date_finish);
                ?>
                <strong>{{($fact_start != "" ? $fact_start." - " : "")}}{{$fact_finish}}</strong>
                {!!markdown($s->fact->text)!!}
            </div>
        @endif

        <strong>{{$s->submitter->name}}</strong>, <span class="text-muted">{{(new DateTime($s->created_at))->format('j M Y, H:i')}}</span>
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $s->submitter->email ) ) )}}?s=60">
            </a>
          </div>
          <div class="media-body">
            <div class="well well-sm"> 
                @if( $is_new )
                    Ini saranku, untuk tambahkan fakta {{$s->type->name}} milik kandidat {{$s->candidate->nickname}}:<br>
                @else
                    Ini saranku, tentang perubahan dari fakta di atas
                @endif
                {{$s->text}}
            </div>
          </div>
        </div>

        <ul class="nav nav-pills nav-justified"
            role="tablist" 
        >
            <li role="presentation" class="active">
                <a  href="#agree-{{$s->id}}" 
                    aria-controls="agree"
                    role="tab"
                    data-toggle="tab"
                >
                    <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=20">: <strong>"Ide Bagus. Saya edit ya.."</strong>
                </a>
            </li>
            <li role="presentation">
                <a  href="#disagree-{{$s->id}}" 
                    aria-controls="disagree" 
                    role="tab" 
                    data-toggle="tab"
                >
                    <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=20">: <strong>"Ide Buruk. Ini alasannya.."</strong>
                </a>
            </li>
        </ul>
        <hr>
        <div class="tab-content">
            <div    role="tabpanel" 
                    class="tab-pane active" 
                    id="agree-{{$s->id}}">
                <form   method="POST"
                        action="student/create_edit">
                    {{ csrf_field() }}
                @if($latest_edit)
                    <strong><u>Hasil edit verifikator sebelumnya, {{$latest_edit->verifier->name}}</u></strong>
                    <div class="media" style="margin-top:5px;">
                      <div class="media-left">
                        <a href="#">
                          <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $latest_edit->verifier->email ) ) )}}?s=60">
                        </a>
                      </div>
                      <div class="media-body">
                        <?php
                            $start = flexible_date($latest_edit->date_start);
                            $finish = flexible_date($latest_edit->date_finish);
                        ?>
                        <strong>{{($start != "" ? $start." - " : "")}}{{$finish}}</strong><br>
                        {!!markdown($latest_edit->text)!!}
                        <span class="text-muted">Berikut teks di atas dalam format markdown: (silahkan copy paste)</span><br>
                        <textarea   class="form-control"            style="width:100%;"
                                    readonly="">{{$latest_edit->text}}</textarea>
                      </div>
                    </div>
                    <br>
                    <input  class="checkbox-is-changed" 
                            type="checkbox" 
                            name="is_no_change" 
                            data-s-id="{{$s->id}}"
                            checked> "Saya setuju dengan hasil edit di atas. Tidak ada yang perlu saya ganti."
                    <br><br>
                @endif

                @if(!$latest_edit && !$is_new)
                    <span>Teks fakta saat ini dalam format markdown: (salin untuk mulai mengubahnya)</span><br>
                    <textarea   class="form-control"            style="width:100%;"
                                readonly="">{{$s->fact->text}}</textarea>
                    <span>Informasi waktu dari fakta di atas: {{($fact_start != "" ? $fact_start." - " : "")}}{{$fact_finish}}</span>
                    <br><br>
                @endif
                
                <a class="pull-right" data-s-id="{{$s->id}}" href="#">contoh-contoh</a>
                <strong><u>Hasil edit {{Auth::user()->name}}</u></strong>
                <div class="media" style="margin-top:5px;">
                  <div class="media-left">
                    <a href="#">
                      <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=60">
                    </a>
                  </div>
                  <div class="media-body">
                    <textarea   class="form-control markdown-input edit-{{$s->id}}" 
                                data-s-id="{{$s->id}}"
                                name="text" 
                                rows="3"
                                required
                                {{($latest_edit)?"disabled":""}}></textarea>
                    <input  class="checkbox-range edit-{{$s->id}}" 
                            data-s-id="{{$s->id}}" 
                            type="checkbox" 
                            checked
                            {{($latest_edit)?"disabled":""}}> format waktu kejadian fakta adalah rentang<br>
                    <select class="form-control date edit-{{$s->id}}" 
                            style="width:44px;"
                            name="date_s"
                            id="date_s_select-{{$s->id}}" 
                            data-s-id="{{$s->id}}"
                            {{($latest_edit)?"disabled":""}}>
                        <?php
                            $date_opt = '<option value="0">t?</option>';
                            for ($i = 1; $i < 32; $i++)
                            {
                                $date_opt .= '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                        {!!$date_opt!!}
                    </select>
                    <select class="form-control date edit-{{$s->id}}"
                            style="width:47px;"
                            name="month_s"
                            id="month_s_select-{{$s->id}}"
                            data-s-id="{{$s->id}}"
                            {{($latest_edit)?"disabled":""}}>
                        <?php
                            $month_opt = '<option value="0">b?</option>';
                            for ($i = 1; $i < 13; $i++)
                            {
                                $month_opt .= '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                        {!!$month_opt!!}
                    </select>
                    <select class="form-control date edit-{{$s->id}}"
                            style="width:60px;"
                            name="year_s"
                            id="year_s_select-{{$s->id}}"
                            data-s-id="{{$s->id}}"
                            {{($latest_edit)?"disabled":""}}>
                        <option value="0000">thn?</option>
                        @for($i = (int)date("Y") ; $i >= 1960; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <span id="up_until-{{$s->id}}" class="up-until">sampai dengan</span>
                    <select class="form-control date edit-{{$s->id}}" 
                            style="width:44px;"
                            name="date_f"
                            data-s-id="{{$s->id}}"
                            {{($latest_edit)?"disabled":""}}>
                        {!!$date_opt!!}
                    </select>
                    <select class="form-control date edit-{{$s->id}}"
                            style="width:47px;"
                            name="month_f"
                            data-s-id="{{$s->id}}"
                            {{($latest_edit)?"disabled":""}}>
                        {!!$month_opt!!}
                    </select>
                    <select class="form-control date edit-{{$s->id}}"
                            style="width:60px;"
                            name="year_f"
                            data-s-id="{{$s->id}}"
                            {{($latest_edit)?"disabled":""}}>
                            <option value="0000">thn?</option>
                        @for($i = (int)date("Y") ; $i >= 1960; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                </div>
                <br>
                <strong><u>Tampilan hasil edit {{Auth::user()->name}} di Wikikandidat.com</u></strong>
                <div class="bs-callout bs-callout-default" style="margin-top:5px;">
                    <strong>
                        <span id="date_s-{{$s->id}}"></span>
                        <span id="month_s-{{$s->id}}"></span>
                        <span id="year_s-{{$s->id}}"></span>
                        <span id="date_f-{{$s->id}}"></span>
                        <span id="month_f-{{$s->id}}"></span>
                        <span id="year_f-{{$s->id}}"></span>
                    </strong>
                    <div id="preview-{{$s->id}}">
                        
                    </div>
                </div>
                <strong><u>Komentar yang menjelaskan alasan dari setiap edit kamu</u></strong>
                <div class="media" style="margin-top:5px;">
                  <div class="media-left">
                    <a href="#">
                      <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=60">
                    </a>
                  </div>
                  <div class="media-body">
                    <textarea   class="form-control edit-{{$s->id}}" 
                                    name="comment" 
                                    rows="3"
                                    data-s-id="{{$s->id}}"
                                    required
                                    {{($latest_edit)?"disabled":""}}></textarea>
                  </div>
                </div>
                <input  type="hidden"
                        name="submission_id"
                        value="{{$s->id}}">
                @if($latest_edit)
                <input  type="hidden"
                        name="latest_edit_id"
                        value="{{$latest_edit->id}}">
                @endif
                <br>
                <button type="submit"
                        class="btn btn-primary">Simpan hasil edit</button>
                </form>
                
            </div>
            <div    role="tabpanel"
                    class="tab-pane" 
                    id="disagree-{{$s->id}}"
            >
                <form   method="POST"
                        action="student/reject_submission">
                    {{ csrf_field() }}
                    <strong><u>Alasan kenapa itu ide buruk</u></strong>
                    <div class="media" style="margin-top:5px;">
                      <div class="media-left">
                        <a href="#">
                          <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=60">
                        </a>
                      </div>
                      <div class="media-body">
                        <textarea   class="form-control" 
                                    name="rejection_reason" 
                                    rows="3"
                                    required></textarea>
                        Contoh :
                        <ol>
                            <li>
                                "Bukan hal yang penting untuk pembaca Wikikandidat."
                            </li>
                            <li>
                                "Sumbernya kurang valid."
                            </li>
                            <li>
                                "Sudah disebut di fakta lain."
                            </li>
                            <li>
                                "Kategorinya kurang tepat, coba ajukan di kategori lain."
                            </li>
                        </ol>
                      </div>
                    </div>
                    <input  type="hidden"
                            name="submission_id"
                            value="{{$s->id}}">
                    <button type="submit"
                            class="btn btn-primary">Beritahu {{$s->submitter->name}}</button>
                </form>
            </div>
        </div>
    </div>