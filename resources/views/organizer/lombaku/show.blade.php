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
                  
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <?php
                    $user = \App\User::find($lombaku->user_id);

                ?>
                <h4>Data Pendaftar/Guru</h4>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>



                        <tr>
                            <td>Nama</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>{{$user->nohp}}</td>
                        </tr>

                 



                    </tbody>
                </table>

                <br />
                <h4>Data Peserta</h4>

                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Kategori</th>
                            <th>Lagu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // dd($lomba->lombaku);
                            $pesertas = $lombaku->peserta;
                            // dd(sizeof($lombaku[0]->peserta))
                        ?>

                        @foreach($pesertas as $peserta)

                        <?php

                        ?>
                        <tr>

                            <td>{{$peserta->nama}}</td>
                            <td>{{$peserta->tanggal_lahir}}</td>
                            <?php
                                $kategori = \App\LombaKategori::find($peserta->kategori_id);
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song1;
                                } else {
                                    $song = $kategori['song'.$peserta->song1];
                                }
                                // dd($song);
                            ?>
                            <td>{{$kategori->name}}</td>
                            <td>{{$song}}</td>
                            
                           
                        </tr>
                        @endforeach
                 



                    </tbody>
                </table>
                <br />

                <h4>Total Pembayaran:</h4>
                <strong><p>Rp {{number_format($lombaku->total_biaya,2)}}</p></strong>
                <hr>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>



                        <tr>
                            <td>Tanggal Pembayaran</td>
                            <td>{{$lombaku->tanggal_bayar}}</td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>{{$lombaku->metode_pembayaran}}</td>
                        </tr>
                        <tr>
                            <td>Email Pembayar</td>
                            <td>{{$lombaku->email_pembayar ?? "-"}}</td>
                        </tr>
                        <tr>
                            <td>Xendit Product Id</td>
                            <td>{{$lombaku->xendit_payment_id}}</td>
                        </tr>
                        <tr>
                            <td>External Id</td>
                            <td>{{$lombaku->external_id}}</td>
                        </tr>
                        <tr>
                            <td>Payment URL</td>
                            <td>
                                <a href="{{$lombaku->payment_url}}" target="_blank">
                                    {{$lombaku->payment_url}}
                                </a>
                            </td>
                        </tr>
                        <tr>

                 



                    </tbody>
                </table>

                <div class="row">
                    <div class="col">

                        <a href="#" class="hapus-pendaftaran">
                            <button type="button" class="btn btn-danger waves-effect waves-light">Hapus Pendaftaran</button>
                        </a>

                    </div>
                    <div class="col" align="right">
                        <a href="#" class="confirm-gmail" >
                            <img src="/image/gmail.png" style="height:2.5em;margin-right: 8px" alt="Konfirmasi Via Gmail" title="Konfirmasi Via Gmail" class="img-responsive">
                        </a>
                        <a href="#" class="confirm-wa" >
                            <img src="/image/social-01-wa.png" style="height:2.5em;margin-right: 8px" alt="Konfirmasi Via Whatsapp" title="Konfirmasi Via Whatsapp" class="img-responsive">
                        </a>
                        @if($lombaku->status == 202 || $lombaku->status == 0)
                        <a href="#" class="confirm-pendaftaran" >
                            <button type="button" class="btn btn-primary waves-effect waves-light">Konfirmasi Pembayaran Ini</button>
                        </a>
                        @endif
                        @if($lombaku->status == 200)
                        <a href="#" class="confirm-pendaftaran" >

                            <button type="button" class="btn btn-success waves-effect waves-light">LUNAS</button>
                        </a>
                        @endif
                    </div>
                </div>
               


            </div>
        </div>
    </div>
    <br />

   
</div>
<!-- end container -->
<?php
$text = str_split($user->nohp);
$y=null;
$x=0;
if (count($text) >1) {
    if($text[0] == '6'){
        for($i=0; $i <count($text); $i++){
            $y .= $text[$i];
        }
    }
    if($text[0] == '0'){
        $y = str_replace('0','62',$text[0]);
        for($i=1; $i <count($text)-1 ; $i++){
            $y .= $text[$i+1];
        }
    }
    if($text[0] == '+'){
        $y= str_replace('+','',$user->nohp);
    }
}
// dd($y);

?>
@endsection

@section('js')
<script src="/js/axios.js"></script>
<script>
$('#datapembayaran').DataTable();
$('#datapeserta').DataTable();
$('.confirm-gmail').click((e)=>{
    var kategoriId = $(this).attr('kategori-id');
    var kategoriName = $(this).attr('kategori-nama');
    var lombaId = $(this).attr('lomba-id');
        e.preventDefault();
        axios.post('/organizer/lomba/{{$lombaku->lomba_id}}/lombaku/{{$lombaku->id}}/confirm')
        .then(function (response) {
            console.log(response);
            window.location.reload();
            alert('email confrimation success');
        })
        .catch(function(error){
            console.log(error);
        });
});
$('.confirm-pendaftaran').click(function(e){
    // alert("hello");
    // e.preventDefault();
    var kategoriId = $(this).attr('kategori-id');
    var kategoriName = $(this).attr('kategori-nama');
    var lombaId = $(this).attr('lomba-id');
    // var text = '*Konfirmasi%20Pembayaran*%0A*{{$lombaku->lomba->name}}*%0A%0APembayaran%20pendaftaran%20atas%20nama%3A%20{{$lombaku->nama_bayar}}%20%0Asebesar%20Rp.{{number_format($lombaku->total_biaya),2}}%20pada%20tanggal%{{$lombaku->tanggal_bayar}}%20*telah%20dikonfrimasi.*%0ATerima%20kasih%20atas%20kerja%20sama%20yang%20baik.%20%0AMohon%20tetap%20periksa%20e%20mail%20anda.';
    
    if(confirm("Anda Yakin Ingin Konfirmasi Pendaftaran Ini / Email Ulang Pembayaran Sukses Peserta?")){
        
    //    window.open("https://wa.me/{{$y}}?text="+text);
      axios.post('/organizer/lomba/{{$lombaku->lomba_id}}/lombaku/{{$lombaku->id}}/confirm')
        .then(function (response) {
          console.log(response);
        //   window.location.reload();
          
        })
        .catch(function(error){
            console.log(error);
        });
    }

});
$('.confirm-wa').click(function(){
    var text = '*Konfirmasi%20Pembayaran*%0A*{{$lombaku->lomba->name}}*%0A%0APembayaran%20pendaftaran%20atas%20nama%3A%20{{$lombaku->nama_bayar}}%20%0Asebesar%20Rp.{{number_format($lombaku->total_biaya),2}}%20pada%20tanggal%{{$lombaku->tanggal_bayar}}%20*telah%20dikonfrimasi.*%0ATerima%20kasih%20atas%20kerja%20sama%20yang%20baik.%20%0AMohon%20tetap%20periksa%20e%20mail%20anda.';       
       window.open("https://wa.me/{{$y}}?text="+text);

});
$('.hapus-pendaftaran').click(function(){
    // alert("hello");
    var kategoriId = $(this).attr('kategori-id');
    var kategoriName = $(this).attr('kategori-nama');
    var lombaId = $(this).attr('lomba-id');

    if(confirm("Anda Yakin Ingin hapus Pembayaran Ini ?")){
      axios.post('/organizer/lomba/{{$lombaku->lomba_id}}/lombaku/{{$lombaku->id}}/delete')
        .then(function (response) {
          console.log(response);
          window.location = '/organizer/lomba/{{$lombaku->lomba_id}}';
        })
        .catch(function(error){
            console.log(error);
        });
    }

});
</script>
@endsection
