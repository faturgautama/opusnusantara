@extends('layouts.app')


@section('css')
<style>
  .box-shadow { 
    box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); 
  }
  
  .card {
    color: #212529;
  }
  
  .card:hover {
    box-shadow: 0 28px 36px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    color: #000000;
  }

  .link-card{
    text-decoration: none;
    color: #212529;
  
  }

  .link-card:hover{
    text-decoration: none;
    color: #212529;
  }
</style>
@endsection

@section('content')
<div class="container">
  <br>
  <h2>News</h2>
  <br>

  <?php $news = \App\News::get(); ?>
  @foreach($news as $berita)
  <a class="link-card" href="/news/{{$berita->id}}">
      <div class="card">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="card-body">
              <h4 class="card-title">{{$berita->judul}}</h4>
            </div>
            <!-- <div class="card-footer text-muted">
              12 Januari 2018 by OPUS NUSANTARA
            </div> -->
          </div>
        </div>
      </div>
    </a>
    <br>
    @endforeach


</div> <!-- end container -->
@endsection

@section('js')

@endsection
