@extends('layouts.opusv2')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="/stisla/assets/modules/chocolat/dist/css/chocolat.css">
<style>
    .box{
      -webkit-overflow-scrolling: touch;
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
    }
    .box-1{
      display:inline-block;
    }
    .my-custom-scrollbar {
    position: relative;
    height: 200px;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
    }
    .gallery.gallery-lg{
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
    }
    .gallery-item{
        display: inline-block;
    }
    .gallery.gallery-lg .gallery-item {
    width: 150px;
    height: 200px;
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
    <h1>Gallery of Opus Nusantara</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q=Enjoy+the+new+features+of+Opus+Nusantara+.+We+can+see+the+photo+gallery+of+participants+here+" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>
<div class="card">
    <div class="card-header"><h4>Organizer Of Opus Nusantara</h4></div>
    <div class="card-body">
        <div class="row">

            <div class="card col-md-8">
                <div class="scrolling-wrapper gallery gallery-lg no-gutter box">
                    <div class="box-1">
                        <div class="gallery-item" data-image="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/40192434_10213686403420563_1208856521560031232_n.jpg?_nc_cat=108&_nc_ht=scontent.fcgk6-1.fna&oh=5c744dac3b218a43ef05729291ccff45&oe=5D5F5FE2" data-title="Eleonora Aprilita"></div>
                    </div>
                    <div class="box-1">
                        <div class="gallery-item" data-image="/stisla/assets/img/news/img03.jpg" data-title="Aity Santoso"></div>
                    </div>
                    <div class="box-1">
                        <div class="gallery-item" data-image="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/53060141_10156696135848127_1084266173207412736_n.jpg?_nc_cat=108&_nc_ht=scontent.fcgk6-1.fna&oh=5938dd32c2a8040f78e200cafddfd669&oe=5D5CCB59" data-title="Glenn Cahyo"></div>
                    </div>
                    <div class="box-1">
                        <div class="gallery-item" data-image="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/56675260_10214012955783494_4539849529305858048_n.jpg?_nc_cat=107&_nc_ht=scontent.fcgk6-1.fna&oh=cc7cf16c13fbd21a7592cd575f633ec0&oe=5D77EED3" data-title="Yetty Tri Susanty"></div>
                    </div>
                    <div class="box-1">
                        <div class="gallery-item" data-image="/stisla/assets/img/news/img03.jpg" data-title="Adhe"></div>
                    </div>
                    <div class="box-1">
                        <div class="gallery-item" data-image="/stisla/assets/img/news/img03.jpg" data-title="Vita Vitrada"></div>
                    </div>
                    {{-- <div class="box-1">
                        <div class="gallery-item" data-image="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/59913563_2307232526187509_8504744886346448896_n.jpg?_nc_cat=107&_nc_ht=scontent.fcgk6-1.fna&oh=34bd9c992a5d381ff7c62c2805a78826&oe=5D291FAC" data-title="Dawam Raja"></div>
                    </div> --}}
                    <div class="box-1">
                        <div class="gallery-item" data-image="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/992995_10201180331101148_708740436_n.jpg?_nc_cat=110&_nc_ht=scontent.fcgk6-1.fna&oh=2a3f23a308c0d0c7569fa51661b657f9&oe=5D714C7F" data-title="Vega Viditama Yanuar"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <b class="text-center">Post Description</b>
                <?php $datas = [['Eleonora Aprilita',''],['Aity Santoso', ''],['Glenn Cahyo',''],['Yetty Tri Susanty',''],['Adhe',''],['Vita Vitrada'],['Vega Viditama Yanuar','']] ?>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-responsive table-striped">
                        <thead>
                            <th>Name</th>
                            <th></th>
                            <th>Position</th>
                        </thead>
                        @foreach($datas as $data)
                        
                        <tr>
                            <td width="40%">{{$data[0]}}</td>
                            <td>:</td>
                            <td width="65%"></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<h1 class="section-title" style="cursor:pointer">Gallery of {{$lomba->name}}</h1>
@if($lomba->tipe_konten=="competition")
<div class="row">
    @foreach($lomba_kategori as $data)
        <div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{$data->name}}</code></h4>
                </div>
                <div class="card-body">
                    <div class="gallery gallery-md">
                        <?php $gallery = \App\GalleryPro::join(
                            'lombaku_pesertas',
                            'lombaku_pesertas.id',
                            'gallery_pros.peserta_id'
                        )
                            ->where('kategori_id', $data->id)
                            ->select(
                                'gallery_pros.id as id',
                                'gallery_pros.foto as foto',
                                'gallery_pros.type as type',
                                'lombaku_pesertas.nama as nama',
                                'sekolah_nama',
                                'kategori_id'
                            )
                            ->get(); ?>
                        @for($i=0; $i< count($gallery) ;$i++)
                            @if($gallery[$i]->foto != null)
                                @if($i < 10)
                                    @if($gallery[$i]->type == 'URL')
                                    <div class="gallery-item" data-image="{{$gallery[$i]->foto}}" data-title="{{$gallery[$i]->nama}}"></div>
                                    @endif
                                    @if($gallery[$i]->type == 'GAMBAR')
                                    <div class="gallery-item" data-image="/uploads/{{$gallery[$i]->foto}}" data-title="{{$gallery[$i]->nama}}"></div>
                                    @endif
                                @endif
                            
                                @if($i == 10)
                                    @if($gallery[$i]->type == 'URL')
                                    <div class="gallery-item gallery-more" data-image="{{$gallery[$i]->foto}}">
                                    <div>{{count($gallery)-1}}</div></div>
                                    @endif
                                    @if($gallery[$i]->type == 'GAMBAR')
                                    <div class="gallery-item gallery-more" data-image="/uploads/{{$gallery[$i]->foto}}">
                                    <div>{{count($gallery)-1}}</div></div>
                                    @endif
                                @endif

                                @if($i> 10)
                                    @if($gallery[$i]->type == 'URL')
                                    <div class="gallery-item" data-image="{{$gallery[$i]->foto}}" data-title="{{$gallery[$i]->nama}}"></div>
                                    @endif
                                    @if($gallery[$i]->type == 'GAMBAR')
                                    <div class="gallery-item" data-image="/uploads/{{$gallery[$i]->foto}}" data-title="{{$gallery[$i]->nama}}"></div>
                                    @endif
                                @endif
                            @endif
                        @endfor
    
                    
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif
@if($lomba->tipe_konten=="education")
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4></h4>
            </div>
            <div class="card-body">
                <div class="gallery gallery-md">
                @foreach($foto as $data)
                    @if($data->type == 'URL')
                    <div class="gallery-item" data-image="{{$data->foto}}" data-title="{{$data->nama}}"></div>
                    @endif
                    @if($data->type == 'GAMBAR')
                    <div class="gallery-item" data-image="/uploads/{{$data->foto}}" data-title="{{$data->nama}}"></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('js')
<!-- JS Libraies -->
<script src="/stisla/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

@endsection

