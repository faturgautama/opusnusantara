@extends('layouts.app')

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
      <form action="" method="post">
          <!-- {{csrf_field()}} -->

          <div class="form-group">
            <label for="tanggal_end_pendaftaran">Bayar Dengan!!</label>
              <select class="form-control" name="type">
                <option>BRI</option>
                <option>MANDIRI</option>
                <option>BNI</option>
                <option>DANAMON</option>
              </select>
          </div>
          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
          <a href="#" class="btn btn-primary">Bayar</a>
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

$(document).ready(function() {

  $('#tanggal_end_pendaftaran').datepicker();
});
</script>
@endsection
