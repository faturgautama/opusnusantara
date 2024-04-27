@extends('layouts.opusv2')

@section('css')

@endsection

@section('content')
<div class="section-header">
    <h1>Wellcome Back..</h1>
</div>
<audio autoplay>
    <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Hi , Wellcome to Opusnusantara , Keep Smile Today')}}+" type="audio/mpeg">
    Your browser does not support the audio tag.
</audio>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-6 ">
    <div class="card author-box card-primary">
        <div class="card-body">
            <div class="author-box-left">
                <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                <div class="clearfix"></div>
                <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a>
            </div>
            <div class="author-box-details">
                    <div class="author-box-name">
                    <a href="#">{{strtoupper('Eleonora Aprilita')}}</a>
                    </div>
                    <div class="author-box-job">CEO OPUSNUSANTARA</div>
                    <div class="author-box-description">
                        <p>Puji syukur senantiasa kita panjatkan kepada Tuhan Yang Maha Esa atas berkat dan anugerahNya-lah, Opus Nusantara berhasil menggelar berbagai event kompetisi piano pelajar.</p>
                        <summary id="ToRead_1" onclick="toRead()" data-toggle="collapse" data-target="#read_1" aria-expanded="false" aria-controls="collapseExample" class="text-primary">Read More.</summary>
                        <p id="read_1" class="collapse">Opus Nusantara berkomitmen untuk menciptakan ruang bagi para pianis-pianis muda Indonesia bertalenta untuk berkompetisi secara sehat dan <i>fair</i> serta terutama lebih mempopulerkan alat musik piano ke generasi muda.</p>
                        <script>
                            function toRead(){
                                console.log("click");
                                document.getElementById("ToRead_1").style.visibility = "hidden";
                            };
                        </script>
                    </div>
                        <!-- <div class="mb-2 mt-3"><div class="text-small font-weight-bold">Follow Hasan On</div></div>
                        <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                        </a>
                        <div class="w-100 d-sm-none"></div>
                        <div class="float-right mt-sm-0 mt-3">
                            <a href="#" class="btn">View Posts <i class="fas fa-chevron-right"></i></a>
                        </div> -->
                </div>
            </div>
    </div>
    <!-- <div class="card card-danger">
        <div class="card-header">
        <h4>Users</h4>
        <div class="card-header-action">
            <a href="#" class="btn btn-danger btn-icon icon-right">View All <i class="fas fa-chevron-right"></i></a>
        </div>
        </div>
        <div class="card-body">
        <div class="owl-carousel owl-theme" id="users-carousel">
            <div>
            <div class="user-item">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid">
                <div class="user-details">
                <div class="user-name">Hasan Basri</div>
                <div class="text-job text-muted">Web Developer</div>
                <div class="user-cta">
                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Follow</button>
                </div>
                </div>  
            </div>
            </div>
            <div>
            <div class="user-item">
                <img alt="image" src="assets/img/avatar/avatar-2.png" class="img-fluid">
                <div class="user-details">
                <div class="user-name">Kusnaedi</div>
                <div class="text-job text-muted">Mobile Developer</div>
                <div class="user-cta">
                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user2 followed');" data-unfollow-action="alert('user2 unfollowed');">Follow</button>
                </div>
                </div>  
            </div>
            </div>
            <div>
            <div class="user-item">
                <img alt="image" src="assets/img/avatar/avatar-3.png" class="img-fluid">
                <div class="user-details">
                <div class="user-name">Bagus Dwi Cahya</div>
                <div class="text-job text-muted">UI Designer</div>
                <div class="user-cta">
                    <button class="btn btn-danger following-btn" data-unfollow-action="alert('user3 unfollowed');" data-follow-action="alert('user3 followed');">Following</button>
                </div>
                </div>  
            </div>
            </div>
            <div>
            <div class="user-item">
                <img alt="image" src="assets/img/avatar/avatar-4.png" class="img-fluid">
                <div class="user-details">
                <div class="user-name">Wildan Ahdian</div>
                <div class="text-job text-muted">Project Manager</div>
                <div class="user-cta">
                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user4 followed');" data-unfollow-action="alert('user4 unfollowed');">Follow</button>
                </div>
                </div>  
            </div>
            </div>
            <div>
            <div class="user-item">
                <img alt="image" src="assets/img/avatar/avatar-5.png" class="img-fluid">
                <div class="user-details">
                <div class="user-name">Deden Febriansyah</div>
                <div class="text-job text-muted">IT Support</div>
                <div class="user-cta">
                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user5 followed');" data-unfollow-action="alert('user5 unfollowed');">Follow</button>
                </div>
                </div>  
            </div>
            </div>
        </div>
        </div>
    </div> -->
    </div>
    <div class="col-12 col-sm-12 col-lg-6">
    <div class="card  card-primary">
        <div class="card-body">
            <h5 class="text-center text-primary mb-3">Register Now</h5>
            <div class="mr-3 ml-3">
                <?php $lomba = \App\Lomba::where('show', 1)
                    ->orderBy('updated_at', 'Desc')
                    ->limit(1)
                    ->get(); ?>
                <h4 class="text-center">{{$lomba[0]->name}}</h4>
                <a href="/v2/myregister/{{$lomba[0]->id}}/create" class="btn btn-block btn-primary">Register Here</a>
                
                <br>
                <div class="row no-gutter">
                    <div class="col-md-6"><a href="/v2/competition"><h6 class="text-right">Others Competition &nbsp |</h6></a></div>
                    <div class="col-md-6"><a href="/v2/education"><h6 class="text-left">| &nbsp Others Education</h6></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="card mt-4">
        <div class="card-header">
        <h4>Authors</h4>
        </div>
        <div class="card-body pb-0">
        <div class="row">
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid" data-toggle="tooltip" title="Syahdan Ubaidillah">
                <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
            </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-2.png" class="img-fluid" data-toggle="tooltip" title="Danny Stenvenson">
                <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
            </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-3.png" class="img-fluid" data-toggle="tooltip" title="Riko Huang">
                <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
            </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-4.png" class="img-fluid" data-toggle="tooltip" title="Luthfi Hakim">
                <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
            </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-4.png" class="img-fluid" data-toggle="tooltip" title="Egi Ferdian">
                <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
            </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid" data-toggle="tooltip" title="Jaka Ramadhan">
                <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
            </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
            <div class="avatar-item">
                <img alt="image" src="assets/img/avatar/avatar-2.png" class="img-fluid" data-toggle="tooltip" title="Ryan">
                <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
            </div>
            </div>
        </div>
        </div>
    </div> -->
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
<script src="/js/axios.js"></script>
<script>
    // $(document).ready(function(){
    //     window.open("https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Hi , Wellcome to Opusnusantara , Keep Smile Today')}}+");
    // })
  </script>
@endsection

