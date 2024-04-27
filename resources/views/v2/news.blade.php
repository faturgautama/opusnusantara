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
<div class="row">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="card  card-primary">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-8 col-md-8">
                        @if($att1['name'] != null)
                        @if($att1['type'] == 'URL')
                        <img class="img-responsive img-news" src="{{$att1['name']}}" alt="">
                        @endif
                        @if($att1['type'] == 'IMAGE')
                        <img class="img-responsive img-news" src="/uploads/news/{{$att1['name']}}" alt="">
                        @endif
                        @else
                        <img class="img-responsive img-news" src="/stisla/assets/img/news/img08.jpg" alt="">
                        @endif
                        
                        
                            <div class="article-title mt-5">
                                <h2><a onclick="alert('{{$news_view['title']}}')">{{$news_view['title']}}</a></h2>
                            </div>
                        <hr>
                            <div class="article-details">
                            {!!$news_view['content']!!}
                            </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-4 col-md-4">
                        <b class="text-center">Post Description</b>
                        <hr>
                        <div class="row no-gutter">
                            <div class="col-sm-4"><b>Title &nbsp; :</b></div>
                            <div class="col-sm-8">{{$news_view['title']}}</div>

                            <div class="col-sm-4"><b>Posted &nbsp; :</b></div>
                            <div class="col-sm-8">{{$news_view['created_at']}}</div>

                            <div class="col-sm-4"><b>Author &nbsp; :</b></div>
                            <div class="col-sm-8">{{$news_view['name']}}</div>

                            <div class="col-sm-4"><b>Read &nbsp; :</b></div>
                            <div class="col-sm-8">{{$news_view['viewed']}}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <h1 class="section-title" style="cursor:pointer">News</h1>
</div>
<div class="row">
    @if($news_hot != null)
    <div class="col-12 col-sm-6 col-md-3">
        <article class="article article-style-b">
            <div class="article-header">
                <?php $att1 = \App\Attachment::where(
                    'id',
                    $news_hot['attach_id']
                )->first();
//  dd($news_hot);
?>
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
                    <div class="article-image" data-background="/stisla/assets/img/news/img14.jpg">
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
                <?php $konten = $news_hot['content']; ?>
                <p>{!!substr($konten,0,150)!!}.... </p>
                <div class="article-cta">
                    <a href="/v2/news/{{$news_hot['randuri']}}">Read More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </article>
    </div>
    @endif

    @foreach($news_new as $data)
        <?php $att2 = \App\Attachment::where('id', $data['attach_id'])->first();
//  dd($att2);
?>
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
                    <?php $content = substr($data->content, 0, 200); ?>
                    <p>{!!$data->content!!}.... </p>
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

