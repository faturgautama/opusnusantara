@extends('layouts.organizer')

@section('css')
<!-- <link href="/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->

@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <div class="container">
      <form action="/organizer/lomba/{{$konten->lomba_id}}/konten/{{$konten->id}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PATCH')}}
          <div class="form-group">
            <label for="judul">Judul</label>
            <input name="judul" type="text" class="form-control" id="judul" placeholder="Masukkan Judul" value="{{$konten->judul}}" required>
          </div>

          
          <div class="form-group">
              <label for="tipe_konten">Tipe Konten</label>
                <select class="form-control" id="tipe_konten" name="tipe">
                  <option>html</option>
                  <option>image</option>
                  <option>pdf</option>
                </select>
            </div>

           <div class="form-group photo-div">
              <label for="image">Upload Photo</label>
              <input type="file" class="form-control-file" id="image" name="image">
          </div>

           <img class="photo-div" height="200px" id="target" src="{{$konten->image}}"/><br>

           <div class="form-group image-div">
            <label for="link">Link</label>
            <input name="link" type="text" class="form-control" id="link" placeholder="Masukkan Link" value="{{$konten->link}}">
          </div>

          <div class="form-group pdf-div">
              <label for="pdf">Upload Pdf</label>
              <input type="file" class="form-control-file" id="pdf" name="pdf">
          </div>

          <div class="form-group" id="konten">
            <label for="konten">Konten</label>
            <textarea name="konten" id="summernote">{{$konten->konten}}</textarea>
          </div>

          <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

var tipe = '{!!$konten->tipe!!}';
 $(document).ready(function() {
      $('#summernote').summernote({
          height: 350,                 // set editor height
          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor
          focus: false                 // set focus to editable area after initializing summernote
      });
      $('#tipe_konten').val(tipe);
      render();
  });

  $('#tipe_konten').change(function(){
    tipe = $(this).val()
    render();
  });

  function render(){
    
     
    if(tipe == 'image'){

      $('#konten').hide();
      $('.photo-div').show();
      $('.pdf-div').hide();
      $('.image-div').show();
      return;
    }

    if(tipe == 'html'){

      $('#konten').show();
      $('.photo-div').hide();
      $('.pdf-div').hide();
      $('.image-div').hide();
      return;
    }

    if(tipe == 'pdf'){

      $('#konten').hide();
      $('.photo-div').show();
      $('.pdf-div').show();
      $('.image-div').hide();
      return;
    }


  }

  function showImage(src, target) {
        var fr = new FileReader();
        fr.onload = function(){
            target.src = fr.result;
        }
        fr.readAsDataURL(src.files[0]);
    }

    $('#image').change(function putImage() {
        var src = document.getElementById("image");
        var target = document.getElementById("target");
        showImage(src, target);
    });

</script>
@endsection
