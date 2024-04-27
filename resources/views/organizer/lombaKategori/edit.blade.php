@extends('layouts.organizer')

@section('css')

        <!-- ION Slider -->
        <link href="/assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap Slider -->
        <link href="/assets/plugins/bootstrap-slider/css/bootstrap-slider.min.css" rel="stylesheet" type="text/css"/>

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="/assets/js/modernizr.min.js"></script>
@endsection

@section('content')
{{--  Start Container  --}}
<div class="container">
  <div class="card">
    <h2 class="m-4">Edit Kategori Lomba</h2>
    <div class="card-body">

      {{--  Start Form  --}}
      <form action="/organizer/lomba/{{$lombaKategori->lomba_id}}/kategori/{{$lombaKategori->id}}" method="POST">
        {{ method_field('PATCH')}}
        {{csrf_field()}}
          <div class="form-group">
              <label for="name">Nama Kategori</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Kategori Lomba" value="{{$lombaKategori->name}}" required>
          </div>

          <div class="form-group">
            <div class="form-group row">
              <label for="range_04" class="col-sm-1 col-xs-12 control-label">
                <span class="display-block">Min</span>
              </label>
              <div class="col-sm-10 col-xs-12">
                <input type="text" id="min">
              </div>
            </div>
          </div>

          

          <div class="form-group">
            <label for="">Pilihan Lagu</label></br>
            <div class="radio form-check-inline">
              <input type="radio" id="song_type1" value="Pilihan" name="song_type" required>
              <label for="song_type1"> Pilihan </label>
            </div>
            <div class="radio form-check-inline">
              <input type="radio" id="song_type2" value="Sendiri" name="song_type" required>
              <label for="song_type2"> Sendiri </label>
            </div>
          </div>

          <div class="form-group">
              <label for="song_set">Jumlah Lagu</label>
              <input name="song_set" type="text" class="form-control" id="song_set" placeholder="Jumlah Lagu" value="{{$lombaKategori->song_set}}" required>
          </div>

          <div class="form-group">
              <label for="song_selection">Lagu</label>
              <input name="song_selection" type="text" class="form-control" id="song_selection" placeholder="Lagu" value="{{$lombaKategori->song_selection}}" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      {{--  End Form  --}}
      
    </div>
  </div>
</div>
{{--  End Container  --}}

@endsection

@section('js')
      <script>
           var resizefunc = [];
       </script>

       <!-- jQuery  -->
       <script src="/assets/js/jquery.min.js"></script>
       <script src="/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
       <script src="/assets/js/bootstrap.min.js"></script>
       <script src="/assets/js/detect.js"></script>
       <script src="/assets/js/fastclick.js"></script>
       <script src="/assets/js/jquery.slimscroll.js"></script>
       <script src="/assets/js/jquery.blockUI.js"></script>
       <script src="/assets/js/waves.js"></script>
       <script src="/assets/js/wow.min.js"></script>
       <script src="/assets/js/jquery.nicescroll.js"></script>
       <script src="/assets/js/jquery.scrollTo.min.js"></script>

       <!-- ION Slider -->
       <script src="/assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
       <!-- Bootstrap Slider -->
       <script src="/assets/plugins/bootstrap-slider/js/bootstrap-slider.min.js"></script>
       <!-- Init slider -->
       <script src="/assets/pages/jquery.ui-sliders.js"></script>


       <script src="/assets/js/jquery.core.js"></script>
       <script src="/assets/js/jquery.app.js"></script>
@endsection
