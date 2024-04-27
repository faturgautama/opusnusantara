@extends('layouts.opusv2')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="/stisla/assets/modules/chocolat/dist/css/chocolat.css">
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
</style>
@endsection

@section('content')
<div class="section-header">
    <h1>Competition of Opus Nusantara</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q=Enjoy+the+new+features+of+Opus+Nusantara+.+We+can+see+the+photo+gallery+of+participants+here+" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>
<div class="card">
    <div class="card-header"><h4>Competition Of Opus Nusantara {{date('Y')}}</h4></div>
    <div class="card-body">
    
        <div class="row">
        
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('/image/bglogin0.jpg');">
                    <div class="hero-inner">
                    <h2 class="text-white">Elleonora Aprillita</h2>
                    <p class="lead">Semangat berkompetisi</p>
                    <div class="mt-4">
                        <!-- <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a> -->
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                
                <div class="hero hero-bg-image hero-bg-parallax" style="background-image: url('/image/bglogin0.jpg');">
                    <div class="row">
                    <div class="col-sm-4">                   
                        <div class="lead ">
                            <div class="gallery gallery-lg-1">
                                <div class="gallery-item"  data-image="http://opusnusantara.com/uploads/2580c700-5f25-11e9-b473-45214777c690.jpg" data-title="Image 1"></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="card text-black">
                            <div class="card-header">
                                <h3>{{$selected['name']}}</h3>
                                <hr>
                            </div>
                            <?php
                            $price_low = \App\LombaKategori::where(
                                'lomba_id',
                                $selected['id']
                            )
                                ->orderBy('biaya', 'Asc')
                                ->first();
                            $price_high = \App\LombaKategori::where(
                                'lomba_id',
                                $selected['id']
                            )
                                ->orderBy('biaya', 'Desc')
                                ->first();
                            $konten = \App\LombaKonten::where(
                                'lomba_id',
                                $selected['id']
                            )->get();
                            ?>
                            <div class="card-body">
                            <span><b>Description</b>: {{$selected['description']}}</span><br>
                                <span> <b>Start</b>: {{$selected['tanggal_lomba']}}</span> <br>
                                <span><b>Tickect</b>: Rp.{{ number_format($price_low['biaya'],2,',','.')}} s/d Rp.{{number_format($price_high['biaya'],2,',','.')}} </span> 
                                
                                <a href="/v2/myregister/{{$selected['id']}}/create" class="btn btn-block btn-primary mt-5"> Register Here</a>
                            </div>
                            <div class="card-footer">
                                <hr>
                                
                                <div class="row no-gutter">
                                @for($i=0; $i< count($konten); $i++)
                                    @if($i %2 == 0)
                                    <div class="col-md-6 text-right">
                                        <a href="{{$konten[$i]->pdf}}">{{$konten[$i]->judul}} |</a>
                                    </div>
                                    @endif
                                    <?php $i += 1; ?>
                                    @if($i %2 == 1)
                                    <div class="col-md-6 text-left">
                                        <a href="{{$konten[$i]->pdf}}">| {{$konten[$i]->judul}}</a>
                                    </div>
                                    @endif
                                @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
              
            </div>

        </div>
    </div>
</div>
<hr>

<h1 class="section-title" style="cursor:pointer">Competition & Education</h1>

<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>ALL {{strtoupper($url)}}</code></h4>
            </div>
            <div class="card-body">
                <div class="gallery gallery-lg">
                    @foreach($show as $data)
                       <div onclick="location.href='/v2/{{strtolower($url)}}/{{str_replace(' ','_',$data->name)}}'" class="gallery-item" data-image="{{$data->poster}}" data-title="{{$data->name}}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- JS Libraies -->
<script src="/stisla/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

@endsection

