@extends('layouts.organizer')
@section('css')
@endsection

@section('content')
<div class="container">
    <!-- <div class="card-group mt-4">
        <div class="card col-sm-12 col-lg-2">
            <img class="img-responsive card-img-top" src="http://www.opusnusantara.com/images/Poster_KPP_2018.jpg" alt="Card image cap">
        </div>
        <div class="card col-sm-12 col-lg-10">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div> -->
    <!-- end card group -->
    <br>

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h6 class="h-block">
                            Data Peserta
                        <h6>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger waves-effect waves-light pull-right peserta-hapus" redirect="/organizer/lomba/{{$peserta->lombaku->lomba_id}}/" url="/organizer/lomba/{{$peserta->lombaku->lomba_id}}/peserta/{{$peserta->id}}">
                            Hapus
                        </a>
                        <a class="btn btn-success waves-effect waves-light pull-right" href="/organizer/lomba/{{$peserta->lombaku->lomba_id}}/peserta/{{$peserta->id}}/edit">
                            Edit Data Peserta
                        </a>
                    </div>
                  
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <?php


                ?>
                <h4>Data Peserta</h4>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        // dd($peserta);
                    ?>

                        <tr>
                            <td>Foto</td>
                            <td>
                                <img height="200px" id="target" src="/uploads/{{$peserta->foto}}"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>{{$peserta->nama}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{$peserta->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>{{$peserta->tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$peserta->alamat}}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>{{$peserta->nohp}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$peserta->email}}</td>
                        </tr>
                        <tr>
                            <td>Sekolah</td>
                            <td>{{$peserta->sekolah_nama}}</td>
                        </tr>
                        <tr>
                            <td>Sekolah Tingkat</td>
                            <td>{{$peserta->sekolah_tingkat}}</td>
                        </tr>

                        <?php
                            $kategori = \App\LombaKategori::find($peserta->kategori_id);
                            $lomba = \App\Lomba::find($kategori->lomba_id);
                            if($lomba->tipe_lomba == "semifinal"){
                                if($kategori->song_type == 'bebas'){
                                    $song_semi_1 = $peserta->song1;
                                    $song_semi_2 = $peserta->song2;
                                    $song_final_1 = $peserta->song1_final;
                                    $song_final_2 = $peserta->song2_final;
                                } else {
                                    $song_semi_1 = $kategori['song'.$peserta->song1];
                                    $song_semi_2 = "";
                                    $song_final_1 = $peserta->song1_final;
                                    $song_final_2 = $peserta->song2_final;
                                }
                            } else {
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song1;
                                } else {
                                    $song = $kategori['song'.$peserta->song1];
                                }
                            }
                            
                            // dd($song);
                        ?>

                        <tr>
                            <td><strong>Kategori</strong></td>
                            <td>{{$kategori->name}}</td>
                        </tr>

                         <tr>
                            <td><strong>No Urut</strong></td>
                            <td>
                                <h4>{{$peserta->no_undian}}</h4>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Reset</td>
                            <td>
                            <a href="#" class="btn-sm btn-primary waves-effect waves-light" peserta-id="{{$peserta->id}}" id="reset-no-undian">Reset No Undian</a>
                            <a href="#" class="btn-sm btn-primary waves-effect waves-light" peserta-id="{{$peserta->id}}" id="ambil-no-undian">Ambil No Undian</a>
                            </td>
                        </tr>
                        @if($lomba->tipe_lomba == "semifinal")
                        <tr>
                            <td><strong>Lagu Semifinal 1</strong></td>
                            <td>{{$song_semi_1}}</td>
                        </tr>
                        <tr>
                            <td><strong>Lagu Semifinal 1</strong></td>
                            <td>{{$song_semi_2}}</td>
                        </tr>
                        <tr>
                            <td><strong>Lagu Final 1</strong></td>
                            <td>{{$song_final_1}}</td>
                        </tr>
                        <tr>
                            <td><strong>Lagu Final 2</strong></td>
                            <td>{{$song_final_2}}</td>
                        </tr>
                        @else
                        <tr>
                            <td><strong>Lagu</strong></td>
                            <td>{{$song}}</td>
                        </tr>
                        @endif
                        <?php
                            $lombaku = $peserta->lombaku;
                            $user = \App\User::find($lombaku->user_id);
                        ?>
                        <tr>
                            <td><strong>Guru/Pendaftar</strong></td>
                            <td><a target="_blank" href="/organizer/lomba/{{$lombaku->lomba_id}}/lombaku/{{$lombaku->id}}">{{$user->name}}</a></td>
                        </tr>

                        <?php
                            if($lombaku->status == '200'){
                                $status = "Lunas";
                            }elseif($lombaku->bank_bayar == '201' || $lombaku->bank_bayar == NULL){
                                $status = "Belum Konfirmasi";
                            }elseif($lombaku->bank_bayar && $lombaku->status != '202'){
                                $status = "Menunggu Konfirmasi Admin";
                            }
                        ?>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td><a target="_blank" href="/organizer/lomba/{{$lombaku->lomba_id}}/lombaku/{{$lombaku->id}}">{{$status}}</a></td>
                        </tr>


                 



                    </tbody>
                </table>

                 <div class="w-block" align="right">
                    <a href="/organizer/lomba/{{$peserta->lombaku->lomba_id}}/" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                </div>

                
               


            </div>
        </div>
    </div>
    <br />

   
</div>
<!-- end container -->
@endsection

@section('js')
<script src="/js/axios.js"></script>
<script>
    $('#reset-no-undian').click(function(){
        var pesertaId = $(this).attr('peserta-id');
        if(confirm("Yakin reset no undian?")){
            // alert(pesertaId);
            axios.post('/organizer/lomba/{{$lombaku->lomba_id}}/peserta/{{$peserta->id}}/reset_undian')
                .then(function(data){
                    location.reload();
                })
                .catch(function(err){

                });
        }
    });

    $('#ambil-no-undian').click(function(){
        var pesertaId = $(this).attr('peserta-id');
        if(confirm("Yakin ambil no undian?")){
            // alert(pesertaId);
            var pesertaId = $(this).attr('peserta-id');
                axios.post('/lombaku/{{$lombaku->lomba_id}}/undian/'+pesertaId)
                .then(function (response) {
                    console.log(response);
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
                }
    });

    $('.peserta-hapus').click(function(){
        var url = $(this).attr('url');
        var redirect = $(this).attr('redirect');
        if(confirm("Yakin hapus data peserta?")){
            // alert(pesertaId);
            var pesertaId = $(this).attr('peserta-id');
                axios.delete(url)
                .then(function (response) {
                    console.log(response);
                    location.href=redirect
                })
                .catch(function (error) {
                    console.log(error);
                });
                }
    });

  
</script>

@endsection
