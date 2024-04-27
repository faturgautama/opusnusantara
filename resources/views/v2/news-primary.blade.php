@extends('layouts.opusv2')

@section('css')
<style>
    @media (min-width: 920px){
        .img-news{
        width :100%;
        height :250px;
        }
    }
    @media (min-width: 480px) and (max-width: 919px){
        .img-news{
        width :100%;
        height :200px;
        }
    }
    @media (max-width: 479px){
        .img-news{
        width :100%;
        height :110px;
        }
    }
</style>
@endsection

@section('content')
<div class="section-header">
    <h1>News of Opus Nusantara</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Enjoy the new features of Opus Nusantara . We can see the latest news from opus nusantara here')}}+" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>
<?php
if ($news_all != 'not') {
    $news = $news_all;
    $title = 'All';
}
if ($news_latest != 'not') {
    $news = $news_latest;
    $title = 'Latest';
}
?>
<h1 class="section-title" style="cursor:pointer">{{$title}} News</h1>

<div class="row">
    @if($news_hot != null)
    <div class="col-12 col-sm-6 col-md-3">
        <article class="article article-style-b">
            <div class="article-header">
            @if($att1['name'] != null)
            @if($att1['type'] == 'URL')
            <div class="article-image" data-background="{{$att1['name']}}">
            </div>
            @endif
            @if($att1['type'] == 'IMAGE')
            <div class="article-image" data-background="/uploads/news/{{$att1['name']}}">
            </div>
            @endif
            @else
            <div class="article-image" data-background="/stisla/assets/img/news/img13.jpg">
            </div>
            @endif
            <div class="article-badge">
                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
            </div>
            </div>
            <div class="article-details">
            <div class="article-title">
                <h2><a href="/v2/news/{{$news_hot['randuri']}}">{{$news_hot['title']}}</a></h2>
            </div>
            <p>{!!substr($news_hot['content'],0,130)!!}.... </p>
            <div class="article-cta">
                <a href="/v2/news/{{$news_hot['randuri']}}">Read More <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
        </article>
    </div>
    @endif
    @foreach($news as $data)
        <?php $att2 = \App\Attachment::where(
            'id',
            $data->attach_id
        )->first(); ?>
    @if($news_hot['id'] == $data->id)
    @else
    
    <div class="col-12 col-sm-6 col-md-3">
        <article class="article article-style-b">
            <div class="article-header">
                @if($att2['name'] != null)
                    @if($att2['type'] == 'URL')
                    <div class="article-image" data-background="{{$att2['name']}}">
                    </div>
                    @endif
                    @if($att2['type'] == 'IMAGE')
                    <div class="article-image" data-background="/uploads/news/{{$att2['name']}}">
                    </div>
                    @endif
                @else
                <div class="article-image" data-background="/stisla/assets/img/news/img13.jpg">
                </div>
                @endif
            </div>
            <div class="article-details">
                <div class="article-title">
                    <h2><a href="/v2/news/{{$data->randuri}}">{{$data->title}}</a></h2>
                </div>
                <p>{!!substr($data->content,0,130)!!}.... </p>
                <div class="article-cta">
                    <a href="/v2/news/{{$data->randuri}}">Read More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </article>
    </div>
    @endif
    @endforeach

</div>
@endsection

@section('js')

@endsection

