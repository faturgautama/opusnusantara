@extends('layouts.organizer')

@section('css')
<!-- <link href="/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="/organizer/lomba" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
              <label for="name">Nama</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama Lomba" required>
          </div>

          <div class="form-group">
              <label for="description">Jenis</label>
              <select class="form-control" name="tipe_konten" id="tipe_konten">
                <option value="education">Education</option>
                <option value="competition">Competition</option>
              </select>
          </div>


        <div class="form-group">
              <label for="description">Status Pendaftaran</label>
              <select class="form-control" name="status" id="status">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
                <option value="2">Sistem Custom</option>
                <option value="9">Sistem Lama</option>
              </select>
          </div>

          <div class="form-group">
              <label for="description">Link Pendaftaran Custom</label>
              <input name="url_pendaftaran" type="text" class="form-control" id="url_pendaftaran" placeholder="Masukkan Link Pendaftaran Custom, kosongi jika tidak digunakan">
          </div>

        <div class="form-group">
              <label for="description">Tipe Lomba</label>
              <select class="form-control" name="tipe_lomba" id="tipe_lomba">
                <option value="final">Final</option>
                <option value="semifinal">Semifinal</option>
              </select>
          </div>

           <div class="form-group">
              <label for="description">Tampilkan di Web</label>
              <select class="form-control" name="show" id="show">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
          </div>

          <div class="form-group">
              <label for="description">Deskripsi</label>
              <input name="description" type="text" class="form-control" id="description" placeholder="Masukkan Deskripsi Lomba" required>
          </div>

          <div class="form-group">
              <label for="tempat_lahir">Upload Photo</label>
              <input type="file" class="form-control-file" id="foto" name="foto" required>
          </div>
          <img height="200px" id="target" src="http://via.placeholder.com/150x200"/><br>

          <div class="form-group">
              <label for="tanggal_lomba">Tanggal Lomba</label>
              <input name="tanggal_lomba" type="date" class="form-control" id="tanggal_lomba" placeholder="Masukkan Tanggal Lomba" required>
          </div>


          <div class="form-group">
            <label for="tanggal_end_pendaftaran">Kategori</label>
              <select class="form-control" name="type">
                <option>umur</option>
                <option>kelas</option>
              </select>
          </div>

          <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<!-- <script src="/assets/plugins/moment/moment.js"></script> -->
<!-- <script src="/assets/plugins/timepicker/bootstrap-timepicker.js"></script> -->
<!-- <script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->
<!-- <script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->
<!-- <script src="/assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script> -->
<!-- <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script> -->
<script>
$('#target').attr('src','http://via.placeholder.com/150x200');
function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        target.src = fr.result;
    }
    fr.readAsDataURL(src.files[0]);
}
$('#foto').change(function putImage() {
    var src = document.getElementById("foto");
    var target = document.getElementById("target");
    showImage(src, target);
});
   
$(document).ready(function() {

//   $('#tanggal_end_pendaftaran').datepicker();
});
</script>
@endsection
