@extends('layouts.app')

@section('css')

<style>
    .card{
        border-radius: 8px;
    }
</style>
@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Pembayaran</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    @if($lomba->status != '200')
    <div class="card">
        <div class="card-body">
            <center>
                <br>
                
                <h4>Pay by Click The Button Below</h4>

                <h3>Rp {{number_format($lomba->total_biaya,2)}}</h3>

                <br>
                <div>
                    <a href="{{$lomba->payment_url}}" target="_blank" class="h-block btn btn-success waves-effect waves-light">Pay Invoice</a>
                </div>

                <br>
                
                    <div class="col-lg-4 col-2 col-xs-0"></div>
                </div>
            </center>
        </div>
    </div>
    <br>
    @endif
    <div class="card">
        <div class="card-body">

        <?php $i = 1; ?>
        @forelse ($lomba->peserta as $peserta)
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-lg-2 d-none d-lg-block">
                        <img height="150" src="/uploads/{{$peserta->foto}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <div class="row">
                            <div class="col">
                                <h5>#{{$i}} {{$peserta->nama}} [{{$peserta->tanggal_lahir}}]</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <p>{{$peserta->kategori->name}}</p>
                                @if($peserta->kategori->song_type == 'pilihan' )
                                    <p>[ {{$peserta->kategori['song'.$peserta['song1']]}} ]</p>
                                @endif

                                @if($peserta->kategori->song_type == 'bebas' )
                                    <p>[
                                    @if($peserta->song1)
                                        {{$peserta->song1}}
                                    @endif
                                    @if($peserta->song2)
                                        ,&nbsp{{$peserta->song2}}
                                    @endif
                                    @if($peserta->song3)
                                        ,&nbsp{{$peserta->song3}}
                                    @endif
                                    @if($peserta->song4)
                                        ,&nbsp{{$peserta->song4}}
                                    @endif
                                    ]</p>
                                @endif
                                @if($lomba->status == '200' && $lomba->is_registration_open == 0)
                                    @if($peserta->no_undian == null)
                                        <h5>Ballot number (Please Click Balloting)</h5>
                                        <button type="button" class="h-block btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#exampleModal{{$peserta->id}}">Take</a>
                                        
                                    @endif
                                    
                                    @if($peserta->no_undian)
                                        <h5>Ballot number ({{$peserta->no_undian}})</h5>
                                    @endif

                                @endif

                                    
                               
                                
                               
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><strong>Rp {{number_format($peserta->kategori->biaya,2)}}</strong></p>
                            </div>
                        </div>
 
                 
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$peserta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 align="center" id='no-undian{{$peserta->id}}'>1</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary ambil-undian" peserta-id='{{$peserta->id}}'>Take</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
        </div>
        <script>
             setInterval(function(){ 
                var undian = Math.floor(Math.random() * 20);
                $('#no-undian{{$peserta->id}}').html(undian);
            }, 100);
        </script>
        
        <?php $i++; ?>
        @empty
            <div class="card">
                <div class="card-body">
                <center>
                    <a href="/lombaku/{{$lomba->id}}/peserta/create"><h5>Data is Empty, Click Here or Button Below to Add</h5></a>
                </center>
                </div>
            </div>
        @endforelse
      

        
        
        <br>
        <div class="w-block" align="right">
            <!-- <h5 >Total: Rp 800.000,00</h5> -->
        </div>
        <br>
       
    </div>
</div>
</div>

<br>



@endsection


@section('js')
<script src="/js/moment.js"></script> 
<script src="/js/combodate.js"></script> 
<script src="/js/axios.js"></script>
<script>
 function showImage(src, target) {
        var fr = new FileReader();
        fr.onload = function(){
            target.src = fr.result;
        }
        fr.readAsDataURL(src.files[0]);
    }
    // $("#tanggal_transfer").combodate();

     $( "#form" ).submit(function( event ) {

        if($("#tanggal_transfer").val() == ""){
            alert("Date of Transfer Empty");
            event.preventDefault();
        }

        return;

    });

    $('#foto').change(function putImage() {
        var src = document.getElementById("foto");
        var target = document.getElementById("target");
        showImage(src, target);
    });

   

    $('.ambil-undian').click(function(){
        var pesertaId = $(this).attr('peserta-id');
        axios.post('/lombaku/{{$lomba->lomba_id}}/undian/'+pesertaId)
        .then(function (response) {
            console.log(response);
            location.reload();
        })
        .catch(function (error) {
            console.log(error);
        });
    });
</script>

@endsection