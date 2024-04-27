@extends('layouts.organizer') 
@section('css')
<!-- <link href="/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->
@endsection
 
@section('content')
{{--  Start Container  --}}
<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="/organizer/lomba/{{$lomba->id}}/kategori" method="post">
          {{csrf_field()}}
          <div class="form-group">
              <label for="name">Nama</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama Kategori" required>
          </div>

          <div class="form-group">
                <label for="biaya">Biaya Pendaftaran</label>
                <input name="biaya" type="number" class="form-control" id="biaya" placeholder="Masukkan Biaya Pendaftaran" required>
          </div>

				{{--  Start Kategori Umur  --}}
				@if($lomba->type == "umur")
					<div class="form-group">
						<label for="min">Min Umur</label>
						<input name="min" type="number" class="form-control" id="min" placeholder="Masukkan Minimal Umur" required>
					</div>

                    <div class="form-group">
						<label for="min">Max Umur</label>
						<input name="max" type="number" class="form-control" id="max" placeholder="Masukkan Maksimal Umur" required>
					</div>
					
				@endif
				{{--  End Kategori Umur  --}}
				
				{{--  Start Kategori Kelas  --}}
				@if($lomba->type=="kelas")
					{{--  Start Kategori Kelas Min  --}}
					<div class="form-group">
						<label for="min">Kelas Minimal</label>
						<select class="form-control" name="min" id="min">
							<option value="0">Kelas TK</option>
							<option value="1">Kelas 1</option>
							<option value="2">Kelas 2</option>
							<option value="3">Kelas 3</option>
							<option value="4">Kelas 4</option>
							<option value="5">Kelas 5</option>
							<option value="6">Kelas 6</option>
							<option value="7">Kelas 7</option>
							<option value="8">Kelas 8</option>
							<option value="9">Kelas 9</option>
							<option value="10">Kelas 10</option>
							<option value="11">Kelas 11</option>
							<option value="12">Kelas 12</option>
						</select>
                    </div>

                    <div class="form-group">
						<label for="max">Kelas Maksimal</label>
						<select class="form-control" name="max" id="max">
							<option value="0">Kelas TK</option>
							<option value="1">Kelas 1</option>
							<option value="2">Kelas 2</option>
							<option value="3">Kelas 3</option>
							<option value="4">Kelas 4</option>
							<option value="5">Kelas 5</option>
							<option value="6">Kelas 6</option>
							<option value="7">Kelas 7</option>
							<option value="8">Kelas 8</option>
							<option value="9">Kelas 9</option>
							<option value="10">Kelas 10</option>
							<option value="11">Kelas 11</option>
							<option value="12">Kelas 12</option>
						</select>
                    </div>
                    
                @endif
					{{--  End Kategori Kelas Min  --}}

            <div class="form-group">
                <label for="song_type">Tipe Lagu @if($lomba->tipe_lomba=="semifinal") (Semifinal) @endif</label>
                <select class="form-control" name="song_type" id="song_type">
                    <option value="pilihan">Pilihan</option>
                    <option value="bebas">Bebas</option>
                </select>
            </div>

          

            <div class="form-group">
                <label for="song_set">Jumlah Lagu @if($lomba->tipe_lomba=="semifinal") (Semifinal) @endif</label>
                <select class="form-control" name="song_set" id="song_set" required>
                    <option value="" selected>Pilih Jumlah Lagu</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>

                </select>
            </div>

            <div id="song1" class="form-group" >
                <label for="description">Lagu 1</label>
                <input name="song1" type="text" class="form-control" placeholder="Masukkan Lagu 1">
            </div>
            <div id="song2" class="form-group" >
                <label for="description">Lagu 2</label>
                <input name="song2" type="text" class="form-control" placeholder="Masukkan Lagu 2">
            </div>
            <div id="song3" class="form-group" >
                <label for="description">Lagu 3</label>
                <input name="song3" type="text" class="form-control" placeholder="Masukkan Lagu 3">
            </div>
            <div id="song4" class="form-group" >
                <label for="description">Lagu 4</label>
                <input name="song4" type="text" class="form-control" placeholder="Masukkan Lagu 4">
            </div>
            <div id="song5" class="form-group" >
                <label for="description">Lagu 5</label>
                <input name="song5" type="text" class="form-control" placeholder="Masukkan Lagu 5">
            </div>
            <div id="song6" class="form-group" >
                <label for="description">Lagu 6</label>
                <input name="song6" type="text" class="form-control" placeholder="Masukkan Lagu 6">
            </div>
            <div id="song7" class="form-group" >
                <label for="description">Lagu 7</label>
                <input name="song7" type="text" class="form-control" placeholder="Masukkan Lagu 7">
            </div>
            <div id="song8" class="form-group" >
                <label for="description">Lagu 8</label>
                <input name="song8" type="text" class="form-control" placeholder="Masukkan Lagu 8">
            </div>
            <div id="song9" class="form-group" >
                <label for="description">Lagu 9</label>
                <input name="song9" type="text" class="form-control" placeholder="Masukkan Lagu 9">
            </div>
            <div id="song10" class="form-group" >
                <label for="description">Lagu 10</label>
                <input name="song10" type="text" class="form-control" placeholder="Masukkan Lagu 10">
            </div>

            @if($lomba->tipe_lomba=="semifinal")

            <div class="form-group">
                <label for="song_type_final">Tipe Lagu (Final)</label>
                <select class="form-control" name="song_type_final" id="song_type_final">
                    <option value="pilihan">Pilihan</option>
                    <option value="bebas">Bebas</option>
                </select>
            </div>

            <div class="form-group final">
                <label for="song_set_final">Jumlah Lagu (Final)</label>
                <select class="form-control" name="song_set_final" id="song_set_final" required>
                    <option value="" selected>Pilih Jumlah Lagu Final</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>

                </select>
            </div>
            

            <div id="song1_final" class="form-group final" >
                <label for="description">Lagu 1 Final</label>
                <input name="song1_final" type="text" class="form-control" placeholder="Masukkan Lagu 1">
            </div>
            <div id="song2_final" class="form-group final" >
                <label for="description">Lagu 2 Final</label>
                <input name="song2_final" type="text" class="form-control" placeholder="Masukkan Lagu 2">
            </div>
            <div id="song3_final" class="form-group final" >
                <label for="description">Lagu 3 Final</label>
                <input name="song3_final" type="text" class="form-control" placeholder="Masukkan Lagu 3">
            </div>
            <div id="song4_final" class="form-group final" >
                <label for="description">Lagu 4 Final</label>
                <input name="song4_final" type="text" class="form-control" placeholder="Masukkan Lagu 4">
            </div>
            <div id="song5_final" class="form-group final" >
                <label for="description">Lagu 5 Final</label>
                <input name="song5_final" type="text" class="form-control" placeholder="Masukkan Lagu 5">
            </div>
            <div id="song6_final" class="form-group final" >
                <label for="description">Lagu 6 Final</label>
                <input name="song6_final" type="text" class="form-control" placeholder="Masukkan Lagu 6">
            </div>
            <div id="song7_final" class="form-group final" >
                <label for="description">Lagu 7 Final</label>
                <input name="song7_final" type="text" class="form-control" placeholder="Masukkan Lagu 7">
            </div>
            <div id="song8_final" class="form-group final" >
                <label for="description">Lagu 8 Final</label>
                <input name="song8_final" type="text" class="form-control" placeholder="Masukkan Lagu 8">
            </div>
            <div id="song9_final" class="form-group final" >
                <label for="description">Lagu 9 Final</label>
                <input name="song9_final" type="text" class="form-control" placeholder="Masukkan Lagu 9">
            </div>
            <div id="song10_final" class="form-group final" >
                <label for="description">Lagu 10 Final</label>
                <input name="song10_final" type="text" class="form-control" placeholder="Masukkan Lagu 10">
            </div>
            @endif

				<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
			</form>
			{{--  End Form  --}}
		</div>
	</div>
</div>
{{--  End Container  --}}
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
for(var i = 1; i<=10;i++){
    $(`#song${i}`).prop('hidden',true);
    $(`#song${i}_final`).prop('hidden',true);
}

$('#song_type_final').change(function(){

    refreshFormLaguFinal();
});

$('#song_type').change(function(){
    refreshFormLagu();

});

$('#song_set').change(function(){
    refreshFormLagu();
});

$('#song_set_final').change(function(){
    refreshFormLaguFinal();
});

@if($lomba->type=="kelas")
//   $('#tanggal_end_pendaftaran').datepicker();
  
  $('#min').change(function(){
    //   alert($(this).val());
    var minValue = $(this).val();
    for(var i = (minValue-1); i>=0; i--){
        $("#max option[value=" + i + "]").attr('disabled','disabled');
    }

    $('#max').val(minValue);
  });

@endif

@if($lomba->type=="umur")


 $('#min').change(function(){
    //   alert($(this).val());
    var minValue = $(this).val();
    $('#max').val(minValue);
    // if(maxValue < minValue){
    //     alert("Umur Max kurang dari Min, minimal harus umur "+minValue);
    //     var maxValue = $('#max').val(minValue);
    // }
 });

 $('#max').change(function(){
    //   alert($(this).val());
    var minValue = $('#min').val();
    var maxValue = $('#max').val();
    if(maxValue < minValue){
        alert("Umur Max kurang dari Min, minimal harus umur "+minValue);
        var maxValue = $('#max').val(minValue);
    }
 });

@endif
});

var refreshFormLagu = ()=>{
    if($('#song_type').val() != 'pilihan'){
        for(var i = 1; i<=10;i++){
            $(`#song${i}`).prop('hidden',true);
        }
        return;
    }

    var set = $('#song_set').val();

    $('#song_set').prop('required',true);
    for(var i = 1; i<=10;i++){
        $(`#song${i}`).prop('hidden',true);
    }

    for(var i = 1; i<=set;i++){
        $(`#song${i}`).prop('hidden',false);
        $('input[name=song'+i+']').prop('required',true);
        //$(`'input[name=song${i}]'`).prop('required',true);
    }
}

var refreshFormLaguFinal = ()=>{
    if($('#song_type_final').val() != 'pilihan'){
        for(var i = 1; i<=10;i++){
            $(`#song${i}_final`).prop('hidden',true);
        }
        return;
    }

    var set = $('#song_set_final').val();

    $('#song_set_final').prop('required',true);
    for(var i = 1; i<=10;i++){
        $(`#song${i}_final`).prop('hidden',true);
    }

    for(var i = 1; i<=set;i++){
        $(`#song${i}_final`).prop('hidden',false);
        $('input[name=song'+i+'_final]').prop('required',true);
        //$(`'input[name=song${i}]'`).prop('required',true);
    }
}
</script>
@endsection