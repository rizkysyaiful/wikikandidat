
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
        
        @if(!$is_new)
            <strong>{{$s->candidate->nickname}}, {{$s->fact->type->name}}</strong>
            <div class="bs-callout bs-callout-default">
                {!!markdown($s->fact->text)!!}
            </div>
        @endif

        <?php $datetime = new DateTime($s->created_at); ?>
        <strong>{{$s->submitter->name}}</strong> <span class="text-muted">{{$datetime->format('j M Y, H:i')}}</span>
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
                    <strong>Hasil edit {{$latest_edit->verifier->name}}</strong>
                    <div class="media" style="margin-top:5px;">
                  <div class="media-left">
                    <a href="#">
                      <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $latest_edit->verifier->email ) ) )}}?s=60">
                    </a>
                  </div>
                  <div class="media-body">
                    <strong>
                        @if($latest_edit->date_start != "0000-00-00")
                            {{$latest_edit->date_start}} - 
                        @endif
                        {{$latest_edit->date_finish}}
                    </strong><br>
                    {!!markdown($latest_edit->text)!!}
                  </div>
                @endif

                <strong>Hasil edit {{Auth::user()->name}}</strong>
                <div class="media" style="margin-top:5px;">
                  <div class="media-left">
                    <a href="#">
                      <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=60">
                    </a>
                  </div>
                  <div class="media-body">
                    <textarea   class="form-control markdown-input" 
                                    data-s-id="{{$s->id}}"
                                    name="text" 
                                    rows="3"
                                    required>{{$text}}</textarea>
                    <input type="checkbox"> format waktu kejadian fakta adalah rentang<br>
                    <select class="form-control date" 
                            style="width:44px;"
                            name="date_s">
                        <option>00</option>
                    </select>
                    <select class="form-control date"
                            style="width:57px;"
                            name="month_s">
                        <option>00</option>
                        <option>Des</option>
                        <option>Nov</option>
                    </select>
                    <select class="form-control date"
                            style="width:60px;"
                            name="year_s">
                        <option>0000</option>
                    </select>
                    <span class="up-until">sampai dengan</span>
                    <select class="form-control date" 
                            style="width:44px;"
                            name="date_f">
                        <option>00</option>
                    </select>
                    <select class="form-control date"
                            style="width:57px;"
                            name="month_f">
                        <option>00</option>
                        <option>Des</option>
                        <option>Nov</option>
                    </select>
                    <select class="form-control date"
                            style="width:60px;"
                            name="month_f">
                        <option>0000</option>
                    </select>
                  </div>
                </div>
                <br>
                <strong>Tampilan hasil edit di Wikikandidat.com</strong>
                <div class="bs-callout bs-callout-default" style="margin-top:5px;">
                    <strong>12 Des 2016</strong>
                    <div id="preview-{{$s->id}}">
                    ktjern
                    </div>
                </div>
                <strong>Komentar yang menjelaskan alasan dari setiap edit kamu</strong>
                <div class="media" style="margin-top:5px;">
                  <div class="media-left">
                    <a href="#">
                      <img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( Auth::user()->email ) ) )}}?s=60">
                    </a>
                  </div>
                  <div class="media-body">
                    <textarea   class="form-control" 
                                    name="comment" 
                                    rows="3"
                                    required>{{$text}}</textarea>
                  </div>
                </div>
                <input  type="hidden"
                        name="submission_id"
                        value="{{$s->id}}">
                <input  type="hidden"
                        name="type_id"
                        value="{{$s->type_id}}">
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