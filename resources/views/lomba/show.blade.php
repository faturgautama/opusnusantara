@extends('layouts.app')

@section('css')
<style>
.pdfobject-container { height: 750px;}
.pdfobject { border: 1px solid #666; }
</style>
@endsection


@section('content')
<br>
<div class="container">
    <h4>{{$lomba->name}}</h4>
    <hr>
    <div class="row d-block d-lg-none">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img class="img-fluid" src="{{$lomba->poster}}" alt="{{$lomba->name}}">
                        @if($lomba->status=='9')
                        <a class="btn btn-block btn-success mt-2" href="http://globie-soft.com/opus">Register Here</a>
                        @endif

                        @if($lomba->status=='0')
                        <button class="btn btn-block btn-success mt-2" href="/" disabled>Register Here</button>
                        @endif

                        @if($lomba->status == '1')
                        <a class="btn btn-block btn-success mt-2" href="/lombaku/create?lombaId={{$lomba->id}}">Register Here</a>
                        @endif

                        @if($lomba->status == '2')
                        <a class="btn btn-block btn-success mt-2" href="{{$lomba->url_pendaftaran}}">Register Here</a>
                        @endif
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                 
                    <?php $kontens = \App\LombaKonten::where(
                        'lomba_id',
                        $lomba->id
                    )
                        ->where('tipe', 'image')
                        ->get(); ?>
                    @foreach($kontens as $konten)
                    <tr>
                       <a href="{{$konten->link}}" target="_blank">
                            <img class="img-fluid" style="max-height: 250px;" src="{{$konten->image}}"/>
                        </a>

                        <br /><br />
                    </tr>
                    @endforeach  

                    <?php $kontens = \App\LombaKonten::where(
                        'lomba_id',
                        $lomba->id
                    )
                        ->where('tipe', 'pdf')
                        ->get(); ?>
                    @foreach($kontens as $konten)
                    <tr>
                       <a href="{{$konten->pdf}}" target="_blank">
                            <img class="img-fluid" style="max-height: 250px;" src="{{$konten->image}}"/>
                        </a>

                        <br /><br />
                    </tr>
                    @endforeach  

                </div>
            </div>

                    <?php $kontens = \App\LombaKonten::where(
                        'lomba_id',
                        $lomba->id
                    )
                        ->where('tipe', 'html')
                        ->get(); ?>
                    @foreach($kontens as $konten)
                    <div class="card mt-4">
                            <div class="card-body">

                                <h3>{{$konten->judul}}</h3>
                                {!!$konten->konten!!}

                            </div>
                    </div>
                    @endforeach   

                   
                  
           
        </div>

        <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid" src="{{$lomba->poster}}" alt="{{$lomba->name}}">
                    @if($lomba->status=='9')
                    <a class="btn btn-block btn-success mt-2" href="http://globie-soft.com/opus">Register Here</a>
                    @endif

                    @if($lomba->status=='0')
                    <button class="btn btn-block btn-success mt-2" href="/" disabled>Register Here</button>
                    @endif

                    @if($lomba->status == '1')
                    <a class="btn btn-block btn-success mt-2" href="/lombaku/create?lombaId={{$lomba->id}}">Register Here</a>
                    @endif

                     @if($lomba->status == '2')
                    <a class="btn btn-block btn-success mt-2" href="{{$lomba->url_pendaftaran}}">Register Here</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection


@section('js')
<script src="/js/pdfobject.min.js"></script>


@endsection
