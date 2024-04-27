@extends('layouts.opusv2')

@section('css')
<!-- CSS Libraries -->
<!-- <link rel="stylesheet" href="/stisla/assets/modules/chocolat/dist/css/chocolat.css"> -->
<link rel="stylesheet" href="/stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<style>
    
    .text-black{
        color:#212121;
    }
    table, div{
        color:#212121;
    }
</style>
@endsection

@section('content')
<?php
// dd($lombaku_peserta);
?>
<div class="row">
    <div class="col-lg-10 col-md-8 offset-md-2 offset-lg-1">
        <div class="section-body">
            <div class="card card-success">
                @if($lombaku->status ==201 || $lombaku->status ==0)
                <div class="card-body">
                    <p style="font-size:24px" class="text-center text-black mt-5">
                    Please Pay the Selected Amount with 3 Unique Digit for Identification <br>
                    <b>Rp {{number_format($lombaku->total_biaya,2)}}</b> <br>
                    <br>
                    CIMB Niaga Cabang Sultan Agung Semarang <br>
                    No: 702509341500 <br>
                    Eleonora Aprilita Simanjuntak
                    </p>
                    <div class="row pt-3">
                        <div class="col-md-6 offset-md-3">
                            <div class="card p-3">
                                <form method="post" action="/v2/myregister/{{$lombaku->id}}/paid" id="form">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="tgl_transfer">Date of Transfer</label>
                                        <!-- <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="emailHelp" placeholder="" required> -->
                                        <br>
                                        <div class="input-group">                                            
                                            <input type="text" class="form-control datepicker" id="tgl_transfer" name="tgl_transfer" required>
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Sender's Bank</label>
                                        <input type="text" class="form-control" name="bank" id="bank" aria-describedby="emailHelp" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Sender's Name</label>
                                        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="">
                                    </div>


                                    <button type="submit" class="h-block btn btn-success waves-effect waves-light">Confirm Payment</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($lombaku->status==202)
                <div class="card-body">
                    <p style="font-size:24px" class="text-center text-black mt-5">
                    Thanks, your payment process. Now, please confrim your payment <a href="#" onclick="window.open('https://wa.me/628156609612?text=*Konfirmasi%20Pembayaran*%0A*{{$lombaku->lomba->name}}*%0A%0AAtas%20nama%3A%20{{\Auth::user()->name}}%20%0Atelah%20membayar%20sebesar%20Rp.{{number_format($lombaku->total_biaya,2)}}%20pada%20tanggal%{{$lombaku->tanggal_bayar}}.%20Untuk%20segera%20dikonfrimasi.')">click hire.</a>
                    </p>
                </div>
                @elseif($lombaku->status == 200)
                <div class="card-body">
                    <p style="font-size:24px" class="text-center text-black mt-5">
                    Thanks, your payment successed
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

    

    
@endsection

@section('js')
<!-- JS Libraies -->
<!-- <script src="/stisla/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->
<script src="/stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
@endsection

