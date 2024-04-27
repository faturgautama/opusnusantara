@extends('layouts.opusv2')

@section('css')
    <style>
        .boxes{
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.125);
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
        .btn-circle{
            border-radius:30px !important;
        }
        @media (min-width: 480px) and (max-width: 919px){
            #desktop{
                visibility :hidden;
            }
        }
        @media (max-width: 479px){
            #desktop{
                visibility :hidden;
            }
        }
    </style>
@endsection

@section('content')
<div class="section-header">
    <h1>Wellcome Back..</h1>
</div>
<audio autoplay>
    <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Hi , Wellcome to Opusnusantara , Keep Smile Today')}}+" type="audio/mpeg">
    Your browser does not support the audio tag.
</audio>
    <?php $lombaku = \App\Lombaku::where('user_id', \Auth::id())
        ->orderBy('created_at', 'desc')
        ->paginate(10);
// dd($lombaku);
?>
    
    @if(count($lombaku) >0)
    <div class="row">
        <div class="col-3">
        
        </div>
        <div class=" col-5">
            <div class="" >
                <form action="/" method="post">
                    <div class="form-group">
                        <label for="">PENCARIAN : </label>
                        <input type="text" value="" class="form-control input-block">
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="col-4">
        <label for="">Page :</label><br>
        {{$lombaku->links()}}
        </div>
    </div>
    @foreach($lombaku as $data)
    <div class="row">
        <div class="col-12" id="list-{{$data->id}}">
            <div class="col-3 float-left" id="desktop">
            <div class="gallery gallery-lg-1 pl-5 float-right">
                <div class="gallery-item"  data-image="{{asset($data->lomba->poster)}}" data-title="Image 1"></div>
            </div>
            </div>
            <div class="card boxes col-9 float-right">
                <div class="card-header">
                    <h4><b id="list-reg-{{$data->id}}">#{{$data->id}} {{$data->lomba->name}}</b></h4>
                    @if($data->status ==201 || $data->status == 0)
                    <a id="close-{{$data->id}}" class="btn btn-danger btn-circle"><i  style="font-size:12px" st class="ion-ios7-trash-outline text-white"></i></a>
                    @endif
                    <script>
                        $('#close-{{$data->id}}').click(function(){
                            if(confirm("Delete Registrasi "+ $('#list-reg-{{$data->id}}').html())){
                                // alert(pesertaId);
                                $('#list-{{$data->id}}').hide();
                                axios.post('/v2/myregister/{{$data->id}}/delete')                                
                                .then(function(data){
                                    location.reload();
                                })
                                .catch(function(err){
                                    location.reload();
                                });
                            }
                        });
                    </script>
                </div>
                <div class="card-body">
                    <p class="float-left"> {{$data->peserta->count()}} Participant</p>
                    <div class="float-right">Rp {{number_format($data->total_biaya)}}</div>
                </div>
                <div class="card-footer">
                    @if($data->status == 200)
                    <a href="/v2/myregister/{{$data->id}}/show" style="font-wight:600"> Show Details</a>
                    @endif
                    @if($data->status == 202)
                    <a href="/v2/myregister/{{$data->id}}/pembayaran" style="font-wight:600"> Show Details</a>
                    @endif
                    @if($data->status == 201 || $data->status == 0)
                    <a href="/v2/myregister/{{$data->id}}/confrimation" style="font-wight:600"> Show Details</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    @else
        <hr>
        <p class="text-center">
            Nothing registration list.
        </p>
        <hr>
    @endif
    

@endsection

@section('js')
<script src="/js/axios.js"></script>
@endsection

