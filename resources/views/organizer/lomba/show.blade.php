@extends('layouts.organizer')
@section('css')
@endsection

@section('content')
<div class="container">

    <div class="card col-sm-12 col-lg-12">
        <div class="card-body">
            <h5 class="card-title">Download Rekap dan Laporan</h5>
            <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/rekap">
                Rekap Pendaftaran
            </a>
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/rekap_peserta">
                Rekap Peserta
            </a>
            <!-- <br /> -->
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/bukuacara">
                Buku Acara
            </a>
            <!-- <br /> -->
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/guidebook">
                Guidebook
            </a>
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/komentar">
                Lembar Komentar Juri
            </a>
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/penilaian">
                Penilaian Juri
            </a>
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/hasil">
                Hasil Kompetisi
            </a>
            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/sertifikat">
                Sertifikat Peserta
            </a>
            <a class="btn mt-2 btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/download/powerpoint">
                Powerpoint Peserta
            </a>
        </div>
    </div>


    <br>

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h6 class="h-block">
                            Data Pembayaran
                        <h6>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <table class="table table-responsive" id="datapembayaran">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Nama Guru/Akun</th>
                            <th>Jumlah Peserta</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // dd($lomba->lombaku);
                            $lombaku = $lomba->lombaku;
                            $i=1;
                            // dd(sizeof($lombaku[0]->peserta))
                        ?>

                        @forelse ($lombaku as $x)
                        <tr>

                            <th scope="row">{{$i}}</th>
                            <td>{{$x->user->name}}</td>
                            <td>

                                {{sizeof($x->peserta)}}

                            </td>

                            <td>{{number_format($x->total_biaya,2)}}</td>
                            <td>
                                @if($x->bank_bayar == null)
                                    Belum Konfirmasi
                                @endif
                                @if($x->bank_bayar && $x->status != 200)
                                    Menunggu Konfirmasi Admin
                                @endif
                                @if($x->status == 200)
                                    Lunas
                                @endif
                            </td>
                            <td>
                                <!-- <a href="/organizer/lomba/{{$lomba->id}}/kategori/}/edit">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Konfirm Pembayaran</button>
                                </a> -->
                                <a target="_blank" href="/organizer/lomba/{{$lomba->id}}/lombaku/{{$x->id}}">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Edit</button>
                                </a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @empty
                            <p>No users</p>
                        @endforelse




                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <br />

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

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <table class="table table-responsive" id="datapeserta">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Peserta</th>
                            <th>Kategori</th>
                            <th>Lagu</th>
                            <th>No Urut</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // dd($lomba->lombaku);
                            // $lombaku = $lomba->lombaku->peserta;
                            // dd(sizeof($lombaku[0]->peserta))
                            // $pesertas = \App\LombakuPeserta::where('lomba_peserta_id',$lomba->id)->get();

                            $pesertas = DB::table('lombaku_pesertas')
                                ->join('lombakus', 'lombakus.id', '=', 'lombaku_pesertas.lombaku_id')
                                // ->join('lomba_kategoris', 'lomba_kategoris.id', '=', 'lombaku_pesertas.kategori_id')
                                ->select('lombakus.lomba_id', 'lombakus.status','lombakus.bank_bayar','lombaku_pesertas.*')
                                ->where('lomba_id',$lomba->id)
                                ->get();

                            // dd($pesertas);
                        ?>

                        @forelse ($pesertas as $peserta)
                        <tr>
                            <?php
                                $kategori = \App\LombaKategori::find($peserta->kategori_id);
                                if($peserta->status == '200'){
                                    $status = "Lunas";
                                }elseif($peserta->bank_bayar == null){
                                    $status = "Belum Konfirmasi";
                                }elseif($peserta->bank_bayar && $peserta->status != '200'){
                                    $status = "Menunggu Konfirmasi Admin";
                                }

                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song1;
                                } else {
                                    $song = $kategori['song'.$peserta->song1];
                                }
                                // dd($song);
                            ?>
                            <td><img height="50px" id="target" src="/uploads/{{$peserta->foto}}"/></td>
                            <td>{{$peserta->nama}}</td>
                            <td>{{$kategori->name}}</td>
                            <td>{{$song}}</td>
                            <td>{{$peserta->no_undian}}</td>
                            <td><a target="_blank" href="/organizer/lomba/{{$lomba->id}}/lombaku/{{$peserta->lombaku_id}}">{{$status}}</a></td>
                            <td>

                                <a target="_blank" href="/organizer/lomba/{{$lomba->id}}/peserta/{{$peserta->id}}">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Details</button>
                                </a>
                            </td>
                        </tr>
                        @empty
                            <p>No users</p>
                        @endforelse




                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<!-- end container -->
@endsection

@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$('#datapembayaran').DataTable();
var table = $('#datapeserta').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf']
});

table.buttons().container()
.appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

// $('#datapeserta').DataTable();
$('.hapus-kategori').click(function(){
    // alert("hello");
    var kategoriId = $(this).attr('kategori-id');
    var kategoriName = $(this).attr('kategori-nama');
    var lombaId = $(this).attr('lomba-id');

    if(confirm("Anda Yakin Ingin Menghapus Lomba "+kategoriName+"?")){
      axios.delete('/organizer/lomba/'+lombaId+'/kategori/'+kategoriId)
        .then(function (response) {
          console.log(response);
          window.location.reload();
        })
        .catch(function(error){
            console.log(error);
        });
    }

});
</script>
@endsection
