@extends('layouts.opusv2')

@section('css')
    <style>
        .boxes{
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }
        .modal-backdrop{
            position: relative;
        }
        .gallery.gallery-lg .gallery-item {
        width: 90px;
        height: 120px;
        margin-right: 5px;
        margin-bottom: 5px;
        }
        .gallery.gallery-lg-1 .gallery-item {
        width: 140px;
        height: 190px;
        /* margin-right:25px; */
        margin-top: 10px;
        }
        .unborder{
            border-radius:2px !important;
        }
        @media (min-width: 480px) and (max-width: 919px){
            img{
                visibility :hidden;
            }
        }
        @media (max-width: 479px){
            img{
                visibility :hidden;
            }
        }
    </style>
@endsection

@section('content')
<div class="section-header">
    <h1>Show Participan..</h1>
</div>
<audio autoplay>
    <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Hi , Wellcome to Opusnusantara , Keep Smile Today')}}+" type="audio/mpeg">
    Your browser does not support the audio tag.
</audio>

<div class="row">
        <?php $i = 1; ?>
    <div class="col-12">
        <div class="card">
            @foreach($peserta as $data)
            @if($data->lombaku->user_id ==\Auth::user()->id)
            @if($data->lombaku->status == 200)
            <div class="col-12 mt-3 mb-1">
                <div class="card" style="box-shadow:3px 3px 5px silver">
                    <div class="card-header">
                        <h4>#{{$no++}}</h4>
                    </div>
                    <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 col-lg-2 d-none d-lg-block">
                            <img height="150" src="/uploads/{{$data->foto}}" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="col-md-12 col-lg-10">
                            <div class="row">
                                <div class="col">
                                    <h5>{{$data->nama}} [{{$data->tanggal_lahir}}]</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <?php $cat = \App\LombaKategori::find(
                                    $data->kategori_id
                                ); ?>
                                <div class="col-md-8 col-sm-12">
                                    <p>{{$data->kategori->name}}</p>
                                    <p>                                      @if($cat->song_type == 'pilihan' && $data->song1 != null )
                                            [ {{$cat['song'.$data->song1]}} ]
                                        @endif
                                        @if($cat->song_type == 'pilihan' && $data->song2 != null)
                                            [ {{$cat['song'.$data->song2]}} ]
                                        @endif

                                        @if($data->kategori->song_type == 'bebas' )
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
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>                                        
                    
                    </div>
                    <div class="card-footer">
                    @if($data->no_undian == null || $data->no_undian ==0)
                    <h5> Ballot number (Please Click Take) </h5>
                      <div class="mt-3 col-2">
                        <input type="hidden" value="{{$data->id}}" id="data{{$i}}">
                        <a class="btn btn-danger text-white btn-block waves-effect waves-light" data-toggle="modal" data-target="#modal{{$data->id}}">Take</a>
                      </div>
                    @else
                    <h5> Ballot number : {{$data->no_undian}} </h5>
                    @endif
                      
                        <script>
                            
                        </script>
<div class="modal fade" id="modal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h1 align="center" id='no-undian{{$data->id}}'>1</h1>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary ambil-undian" peserta-id='{{$data->id}}'>Take</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
</div>
<script>
        setInterval(function(){ 
        var undian = Math.floor(Math.random() * 20);
        $('#no-undian{{$data->id}}').html(undian);
    }, 100);
</script>
                    </div>
                </div>
            </div>
            
            @else
             <script>
                window.location.assign('/v2/myregister/{{$data->lombaku_id}}/confrimation');
             </script>
            @endif
            @endif


            @endforeach
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="/js/axios.js"></script>
<script>
// var pesertaId = $('.ambil-undian').attr('peserta-id');
// console.log('/v2/myregister/{{$peserta[0]->lombaku->lomba_id}}/undian/'+pesertaId);
$('.ambil-undian').click(function(){
    var pesertaId = $(this).attr('peserta-id');
    axios.post('/v2/myregister/{{$peserta[0]->lombaku->id}}/undian/'+pesertaId)
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

