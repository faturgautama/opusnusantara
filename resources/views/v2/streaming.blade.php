@extends('layouts.opusv2')

@section('css')

@endsection

@section('content')
<div class="section-header">
    <h1>Straming Now</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Enjoy the new features of Opus Nusantara . We can see the participants performances here')}}+" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>
<div class="row"><?php
$video = \App\Article::where('type', 'live')
    ->orderBy('updated_at', 'Desc')
    ->first();
if (!isset($video)) {
    $video = array(
        'title' => 'live',
        'type' => 'live',
        'viewed' => '0',
        'content' =>
            '<video width="100%" controls> <source src="movie.mp4" type="video/mp4"> Your browser does not support the video tag. </video>'
    );
}
?>
    <div class="col-12 col-sm-12 col-md-12">
    <div class="card  card-primary">
        <div class="card-body">
        <div class="row">
            <h5 class="text-primary mb-3">{{ucwords(strtolower($video['title']))}}</h5> <b class="text-left"> &nbsp; (<i class="far fa-1x fa-eye text-danger"></i> {{$video['viewed']}})</b>
        </div>
        
        <div class="col-12">
        {!!$video['content']!!}
        </div>
        </div>
    </div>
    </div>
</div>
<hr>

<h1 class="section-title" style="cursor:pointer">Tranding</h1>

<div class="row">
    <div class="col-12">
        <?php $datas = \App\Article::where('type', 'live')
            ->orderBy('viewed', 'Desc')
            ->limit(4)
            ->get(); ?>
        @foreach($datas as $data)
        <div class="col-12 col-sm-6 col-md-3">
            <article class="article article-style-b">
                <div class="article-header">
                    <a href="/v2/live/{{$data->randuri}}">
                        <div class="article-image d-flex justify-content-center align-items-center"> <i class="far text-danger fa-5x mb-3 fa-play-circle"></i>
                        </div>
                    </a>
                <div class="article-badge">
                    <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                </div>
                </div>
                <div class="article-details">
                <div class="article-title">
                    
                </div>
                <p>#{{$data->title}}</p>
                <div class="article-cta">
                    <a href="/v2/live/{{$data->randuri}}">View <i class="fas fa-chevron-right"></i></a>
                </div>
                </div>
            </article>
        </div>
        @endforeach
    </div> 
</div>
<hr>
<h1 class="section-title" style="cursor:pointer">More All</h1>  
<div class="row">
    <div class="col-12">
        <?php 
            $datas = \App\Article::where('type','live')->orderBy('created_at','Desc')->get();
        ?>
        @foreach($datas as $data)
        <div class="col-12 col-sm-6 col-md-3">
            <article class="article article-style-b">
                <div class="article-header">
                    <a href="/v2/live/{{$data->randuri}}">
                        <div class="article-image d-flex justify-content-center align-items-center"> <i class="far text-danger fa-5x mb-3 fa-play-circle"></i>
                        </div>
                    </a>
                    <div class="article-badge">
                        <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                    </div>
                </div>
                <div class="article-details">
                    <div class="article-title">
    
                    </div>
                    <p>#{{$data->title}}</p>
                    <div class="article-cta">
                        <a href="/v2/live/{{$data->randuri}}">View <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div> 
</div>

@endsection

@section('js')

@endsection

