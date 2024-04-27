@extends('layouts.opusv2')

@section('css')
<!-- CSS Libraries -->
<!-- <link rel="stylesheet" href="/stisla/assets/modules/chocolat/dist/css/chocolat.css"> -->
<style>
    .card-img-top {
        width: 80%;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
    .cc-card{
        box-shadow: 1px 3px 2px 0px #a09b9b;
        transition: box-shadow 0.5s;
        border-radius :10px;
    }
    .cc-card:hover{
        box-shadow: 4px 6px 8px 0px #a09b9b;
        color: #000000;
    }
    .gallery.gallery-lg .gallery-item {
    width: 150px;
    height: 220px;
    margin-right: 10px;
    margin-bottom: 10px;
    }
    .gallery.gallery-lg-1 .gallery-item {
    width: 250px;
    height: 355px;
    margin-right: 0px;
    margin-bottom: 10px;
    }
    .gallery.gallery-md .gallery-item {
    width: 50;
    height: 50;
    }
    .text-black{
        color:#212121;
    }
    table, div{
        color:#212121;
    }
</style>

@endsection

@section('content')

<div class="row">
    <div class="col-lg-10 col-md-8 offset-md-2 offset-lg-1">
        <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                <div class="invoice-title">
                    <h2>Confrimaton</h2>
                    <div class="invoice-number">Transaction #{{$lombaku_peserta[0]->lombaku_id}}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                    <address>
                        <strong>Order Name:</strong><br>
                        {{\Auth::user()->name}}<br>
                        {{\Auth::user()->no_hp}} <br>
                        {{\Auth::user()->email}} 
                    </address>
                    </div>
                    <div class="col-md-6 text-md-right">
                    <address>
                        <strong>Total :</strong><br>
                        Rp. <span id="total2">{{number_format($lombaku_peserta->sum('biaya'),2)}}</span>
                    </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        CIMB Niaga No: 702509341500<br>
                        Eleonora Aprilita Simanjuntak
                    </address>
                    </div>
                    <div class="col-md-6 text-md-right">
                    <address>
                        <strong>Transfer Date:</strong><br>
                        {{$lombaku->tanggal_bayar}}<br><br>
                    </address>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-12">
                <div class="section-title">Participant List</div>
                <p class="section-lead">All participant.</p>
                <div class="table-responsive">
                    <table id="table-list" class="table table-striped table-hover table-md">
                    <tr>
                        <th data-width="40">#</th>
                        <th>Name</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Piece</th>
                        @if($lombaku->lomba->tipe_lomba == 'semifinal')
                        <th class="text-center">Piece Final</th>
                        @endif
                        <th class="text-right">Price</th>
                    </tr>
                    @foreach($lombaku_peserta as $data)
                    <tr id="list_{{$data->id}}">
                        <?php $cat = \App\LombaKategori::find(
                            $data->kategori_id
                        ); ?>
                        <td>
                        <a href="#table-list"  id="delete_{{$data->id}}" data-toggle="tooltip" title="Delete!" data-placement="bottom" data-original-title="Delete!"><i class="fas fa-times text-danger"></i></a>
                        
                        </td>
                        <td>{{$data->nama}}</td>
                        <td class="text-center">{{$data->kategori->name}}</td>
                        <td class="text-center">
                        @if($cat->song_type == 'pilihan' && $data->song1 != null )
                            [ {{$cat['song'.$data->song1]}} ]
                        @endif
                        @if($cat->song_type == 'pilihan' && $data->song2 != null)
                            [ {{$cat['song'.$data->song2]}} ]
                        @endif

                        @if($data->song_type == 'bebas' )
                        [
                        @if($data->song1)
                            {{$data->song1}}
                        @endif
                        @if($data->song2)
                            ,&nbsp{{$data->song2}}
                        @endif
                        @if($data->song3)
                            ,&nbsp{{$data->song3}}
                        @endif
                        @if($data->song4)
                            ,&nbsp{{$data->song4}}
                        @endif
                        ] 
                        @endif
                        
                        </td>
                        @if($lombaku->lomba->tipe_lomba == 'semifinal')
                        <td>
                        @if($cat->song_type_final == 'pilihan' && $data->song1_final != null )
                            [ {{$cat['song'.$data->song1_final.'_final']}} ]
                        @endif
                        @if($cat->song_type_final == 'pilihan' && $data->song2_final != null)
                            [ {{$cat['song'.$data->song2_final.'_final']}} ]
                        @endif
                        @if($data->song_type_final == 'final' && $cat->song_type_final == 'bebas' )
                        [
                        @if($data->song1_final != null)
                            {{$data->song1_final}}
                        @endif
                        @if($data->song2_final != null)
                            ,&nbsp{{$data->song2_final}}
                        @endif
                        @if($data->song3_final != null)
                            ,&nbsp{{$data->song3_final}}
                        @endif
                        ]
                        @endif
                        </td>
                        @endif
                        <td class="text-right" id="biaya_{{$data->id}}">Rp {{number_format($data->biaya,2)}}</td>
                    </tr>
                    <script>
                    $('#delete_{{$data->id}}').click(function(){
                        var total = {{$lombaku_peserta->sum('biaya') }}- {{$data->biaya}};
                        $('#total2').html(total);
                        $('#total').html(total);
                                    
                        $("#list_{{$data->id}}").hide();
                        axios.post('/v2/myregister/delete/{{$data->id}}');
                    });
                    </script>
                    @endforeach
                    
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-8">
                    <div class="section-title">Payment Method</div>
                    <p class="section-lead">
                    <address style=""><br>
                        CIMB Niaga <br> 702509341500<br>
                        Eleonora Aprilita Simanjuntak
                    </address>
                    </p>
                    <div class="images">
                        <img src="/image/cimb.png" alt="CIMB" width="100px">
                    </div>
                    </div>
                    <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                        <!-- <div class="invoice-detail-name">Subtotal</div>
                        <div class="invoice-detail-value">$670.99</div> -->
                    </div>
                    <div class="invoice-detail-item">
                        <!-- <div class="invoice-detail-name">Shipping</div>
                        <div class="invoice-detail-value">$15</div> -->
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                        <div class="invoice-detail-name"><b>Total</b></div>
                        <div class="invoice-detail-value invoice-detail-value-lg">Rp. <span id="total">{{number_format($lombaku_peserta->sum('biaya'),2)}}</span></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <hr>
            <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
                <form action="/v2/myregister/{{$lombaku_peserta[0]->lombaku_id}}/add" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="lomba_id" value="{{\App\Lombaku::find($lombaku_peserta[0]->lombaku_id)->lomba_id}}">
                    <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="md md-person-add"></i> Add Participant</button>
                    <button class="btn btn-danger btn-icon icon-left"><i class="md md-close"></i> Cancel</button>
                </div>
                </form>
                
            </div>
            <a href="/v2/myregister/{{$lombaku_peserta[0]->lombaku_id}}/pembayaran" class="btn btn-warning btn-icon icon-left"><i class="md md-navigate-next"></i> Next</a>
            </div>
        </div>
        </div>
    </div>
</div>

    

    
@endsection

@section('js')
<!-- JS Libraies -->
<!-- <script src="/stisla/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->
<script src="/js/axios.js"></script>
@endsection

