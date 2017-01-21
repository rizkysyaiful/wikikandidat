gudang kode selama pilkada 2017

@include('layouts.fact-panel', [
'category' => 'Karir',
'color' => 'rgb(235, 244, 255)',
'candidate' => $c])

@include('layouts.fact-panel', [
'category' => 'Pendidikan',
'color' => 'rgb(235, 255, 245)',
'candidate' => $c])

@include('layouts.fact-panel', [
'category' => 'Kontribusi ke Organisasi',
'color' => 'rgb(255, 235, 235)',
'candidate' => $c])

@include('layouts.fact-panel', [
'category' => 'Prestasi',
'color' => 'rgb(235, 236, 255)',
'candidate' => $c])

@include('layouts.fact-panel', [
'category' => 'Kontroversi',
'color' => 'rgb(255, 251, 235)',
'candidate' => $c])




              @include('layouts.fact-panel', [
                'category' => 'Karir',
                'color' => 'rgb(235, 244, 255)',
                'candidate' => $rm])

              @include('layouts.fact-panel', [
                'category' => 'Pendidikan',
                'color' => 'rgb(235, 255, 245)',
                'candidate' => $rm])

              @include('layouts.fact-panel', [
                'category' => 'Kontribusi ke Organisasi',
                'color' => 'rgb(255, 235, 235)',
                'candidate' => $rm])

              @include('layouts.fact-panel', [
                'category' => 'Prestasi',
                'color' => 'rgb(235, 236, 255)',
                'candidate' => $rm])

              @include('layouts.fact-panel', [
                'category' => 'Kontroversi',
                'color' => 'rgb(255, 251, 235)',
                'candidate' => $rm])


<!-- blok ini tepat sebelum endforeach couple -->

        <?php
          $facts = $c->facts;
          $facts = $facts->merge($rm->facts);
        ?>

        @foreach($facts as $f)
          <div class="modal fade" id="modal-{{$f->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Riwayat Perubahan</h4>
                </div>
                <div class="modal-body">
                  @foreach($f->submissions as $s)
                    @if($s->is_rejected === 0)
                      <div class="media">
                        <div class="media-left">
                          <a href="{{url('user/'.$s->submitter->username, [], $secure)}}"><img style="display: inline;" class="media-object" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $s->submitter->email ) ) )}}?s=45"></a>
                        </div>
                        <div class="media-body">
                          <strong><a href="{{url('user/'.$s->submitter->username, [], $secure)}}">{{$s->submitter->name}}</a></strong>, <span class="text-muted">{{Helper::wk_date($s->created_at)}}</span>
                          <div>
                            {{$s->text}}
                          </div>
                          <?php 
                            $previous_edit;
                           ?>
                          @foreach($s->edits as $e)
                          <div class="media">
                            <div class="media-left">
                              <a href="{{url('user/'.$e->verifier->username, [], $secure)}}"><img style="display: inline;" class="media-object" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $e->verifier->email ) ) )}}?s=45"></a>
                            </div>
                            <div class="media-body">
                              <a href="{{url('user/'.$e->verifier->username, [], $secure)}}"><strong>{{$e->verifier->name}}</strong></a> ({{$e->verifier->university->abbreviation}}), <span class="text-muted">{{Helper::wk_date($e->created_at)}}</span><br>
                              <?php
                                $is_no_change = false;
                                if(!$loop->first && $previous_edit->text == $e->text && $previous_edit->date_start == $e->date_start && $previous_edit->date_finish == $e->date_finish)
                                  $is_no_change = true;
                              ?>
                              @if($is_no_change)
                              <span class="text-muted">Setuju dengan hasil edit di atas</span>
                              @else
                              "{{$e->comment}}"
                              <div class="well well-sm" style="margin-bottom:0px;">
                                <u>
                                  {{Helper::wk_date($e->date_start, $e->date_finish)}}
                                </u>
                                {!!markdown($e->text)!!}  
                              </div>
                              @endif
                            </div>
                          </div>
                          <?php $previous_edit = $e; ?>
                          @endforeach
                        </div>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="EditFactModal-{{$f->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Fakta</h4>
                  <div class="bs-callout bs-callout-default">
                    {!!markdown($f->text)!!}
                  </div>
                </div>
                <div class="modal-body">
                  @if(Auth::check())
                    <?php
                      $submissions = App\Submission::where([
                          ['fact_id', '=', $f->id],
                          ['is_rejected', '=', null]
                        ])->get();
                    ?>
                    @if($submissions->count() == 0)
                      <form method="POST" action="user/process_edit_fact_submission">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label>Jelaskan apa yang ingin ditambah/dikurangi/diubah di teks fakta di atas. Setiap saran perubahaan harus ditunjang bukti asli. Taruh ke link internet yang merujuk ke bukti tersebut.</label>
                          <textarea class="form-control" name="text" id="" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="fact_id" value="{{$f->id}}">
                        <input type="hidden" name="place_id" value="{{$election->place->id}}">
                        <input type="hidden" name="type_id" value="{{$f->type_id}}">
                        <input type="hidden" name="candidate_id" value="{{$f->candidate_id}}">
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
                    @else
                      <p>
                        Mohon maaf. Sekarang kamu harus mengantri. Karena ada sebuah masukan yang sedang diproses tiga mahasiswa acak. Takutnya bentrok kalau diproses bersamaan.
                      </p>
                      <p>
                        Nanti akan dibuat fitur, yang akan mengirim email ke kamu kalau proses sudah selesai. Jadi kamu sudah bisa tambahkan bukti baru yang melengkapi fakta ini. Sekarang fiturnya belum jadi. Kamu rajin-rajin cek halaman ini dulu aja ya.. :)
                      </p>
                    @endif
                  @else
                    Login dahulu untuk memasukan fakta baru. Kalau ingin anonimus karena faktanya terlalu sensitif, ikuti petunjuk berikut. 
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach


<!-- blok ini tepat sebelum endsection content -->


    <div class="modal fade" id="SubmitFactModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Tambah Fakta <span id="type"></span> <span id="nickname"></span></h4>
          </div>
          <div class="modal-body">
            @if(Auth::check())
              <form method="POST" action="user/process_new_fact_submission">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Silahkan masukan fakta baru, jangan lupa, harus ditunjang bukti asli. Taruh ke link internet.</label>
                  <textarea class="form-control" name="text" id="" rows="3"></textarea>
                </div>
                <input type="hidden" name="place_id" value="{{$election->place->id}}">
                <input type="hidden" name="type_id" value="">
                <input type="hidden" name="candidate_id" value="">
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            @else
            Login dahulu untuk memasukan fakta baru. Kalau ingin anonimus karena faktanya terlalu sensitif, ikuti petunjuk berikut. 
            @endif
          </div>
        </div>
      </div>
    </div>


<!--
      <p class="pull-right random-quote"><strong>Makin cerdas pemilih, makin keren pemimpinnya!</strong><br>Wikikandidat adalah museum rekam jejak kandidat.<br>Semua bisa menambah/mengubah rekam jejak,<br>tapi hanya informasi yang valid menurut tiga mahasiswa acak yang tampil.<br>
      <span class="text-muted">Bantu Wikikandidat.com sebagai:</span> <a href="{{url('tentang-kami#mahasiswa', [], $secure)}}">verifikator</a> &middot; <a href="{{url('cara-kontribusi', [], $secure)}}">penambah data</a> &middot; <a href="#">pemasar</a> &middot; <a href="https://github.com/rizkysyaiful/wikikandidat" target="_blank">developer</a><br>
       <a href="{{url('/tentang-kami#kontak', [], $secure)}}">Kontak</a> &middot; <a href="https://github.com/rizkysyaiful/wikikandidat/milestones?direction=asc&sort=due_date&state=open" target="_blank">Roadmap</a> <span class="text-muted">(ya, visi kami jauh melampaui pilkada 2017)</span>
      </p>
      -->


      <!-- <div class="well well-sm" style="background-color: #faebcc;">
        <div style="text-align: center; margin-bottom: 10px;">
          <i class="em em-loudspeaker"></i> <strong>Pengumuman! Buat kamu yang peduli dengan {{$election->place->name}}</strong> <i class="em em-speaker"></i><br>
          <span class="text-muted">Bantu warga {{$election->place->name}} memilih pemimpin dengan lebih cerdas &amp; munculkan nama organisasi kamu di sini.</span>
        </div>
        <div class="row">
          <div class="col-md-5">
            @if($election->initiator == NULL)
              <u>1. Tolong bantu kumpulkan data inisial kandidat</u><br>
              Punya organisasi mahasiswa? Tertarik mengumpulkan data versi pertama seluruh kandidat {{$election->place->name}}? Selain konkrit membantu {{$election->place->name}}, nama, logo &amp; link ke organisasi kamu akan muncul di banner ini, di halaman ini, selama-lamanya. Karena kontribusi organisasi kamu, halaman ini jadi bisa mulai bermanfaat untuk orang lain. <a href="{{asset('img/contoh-initiator.jpeg', $secure)}}" target="_blank">Ingin seperti contoh ini? Segera hubungi, jangan sampai keduluan organisasi lain</a>.
            @else
              Terima kasih kepada teman-teman di<br>
              {!!$election->initiator!!}<br>
              atas bantuannya dalam meriset versi pertama rekam jejak kandidat {{$election->place->name}}. Karena kalian, halaman ini jadi bisa dibaca &amp; mulai dilengkapi orang banyak.
            @endif
          </div>
          <div class="col-md-7" style="padding-left: 0px;">
            @if($election->promoters == NULL)
              <u>2. Tolong bantu sebarkan keberadaan Wikikandidat ke pemilih</u><br>
              Setelah data versi pertama terkumpul, Wikikandidat sudah bisa digunakan. Sayang, belum banyak orang di {{$election->place->name}} yang tahu. Yuk, bantu dengan menulis artikel tentang halaman ini. Atau bisa juga dengan mengadakan penyuluhan langsung. Dokumentasikan segala kegiatan kamu secara online. Lalu beritahu kami. Semua link ke bantuan kamu akan tercatat di sini. Selama-lamanya (FYI, selain membuat organisasi kamu lebih populer, akan mendongkrak ranking website kamu di Google juga).
            @else
              Teman-teman yang sudah beraksi demi pilkada yang lebih cerdas {{$election->place->name}}:<br>
              {!!$election->promoters!!}
            @endif
          </div>
        </div>
        <?php 
          $cp = App\User::find($election->cp);
        ?>
        <div style="text-align: center; padding-top: 10px;">
          <strong>
            Ingin bantu warga {{$election->place->name}}? Ingin nama organisasi kamu tercantum di atas? Hubungi {{$cp->name}} di {{$cp->email}}
          </strong>
        </div>
      </div>
      -->