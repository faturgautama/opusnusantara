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
    /* .cc-card{
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        transition: box-shadow 1s;
    }
    .cc-card:hover{
        box-shadow: 0 28px 36px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        color: #000000;
    } */
    .gallery.gallery-lg .gallery-item {
    width: 150px;
    height: 220px;
    margin-right: 10px;
    margin-bottom: 10px;
    }
    .gallery.gallery-md .gallery-item {
    width: 50;
    height: 50;
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
    <div class="card-header"><h4>Bali Open Piano Cimpetition 2019</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                
                <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('/stisla/assets/img/unsplash/andre-benz-1214056-unsplash.jpg');">
                  <div class="hero-inner">
                    <center>
                        <h2>Rules & Regulation</h2>
                        <!-- <p class="lead">You almost arrived, complete the information about your account to complete registration.</p> -->
                        <div class="mt-4">
                        <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                        </div>
                    </center>
                  </div>
                </div>

            </div>
            <div class="col-12 col-md-4 cc-card pt-3">
               <a href="">
                    <div class="card">
                        <center><img class="card-img-top" src="http://opusnusantara.com/uploads/2580c700-5f25-11e9-b473-45214777c690.jpg" alt="Card image cap"></center>
                    </div>
               </a>
                <h4 class="text-center">Bali Open Piano Competition 2019</h4>
            </div>

        </div>
    </div>
</div>
<hr>

<h1 class="section-title" style="cursor:pointer">Olders Competition</h1>

<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Olders Competition</code></h4>
            </div>
            <div class="card-body">
                <div class="gallery gallery-lg">
                    <div class="gallery-item" data-image="http://opusnusantara.com/uploads/2580c700-5f25-11e9-b473-45214777c690.jpg" data-title="Image 1"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img14.jpg" data-title="Image 2"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img08.jpg" data-title="Image 3"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img05.jpg" data-title="Image 4"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img11.jpg" data-title="Image 5"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img09.jpg" data-title="Image 6"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img12.jpg" data-title="Image 8"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img13.jpg" data-title="Image 9"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img14.jpg" data-title="Image 10"></div>
                    <div class="gallery-item" data-image="/stisla/assets/img/news/img15.jpg" data-title="Image 11"></div>
                    <div class="gallery-item gallery-more" onclick="alert('hai')">
                    <div>+2</div>
                    </div>
                   
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

