@extends('layouts.app')

@section('css')

<style>
    .card{
        border-radius: 8px;
    }
</style>
@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Add Participant</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

      

        <form id="form" action="/lombaku/{{$lomba->id}}/peserta" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Participant</label>
                <select class="form-control" id="peserta_id" name="peserta_id">

                    <option value="">Add New Participant</option>

                    <?php
                        $pesertas = \App\LombaPeserta::where('user_id',\Auth::id())->get();
                    ?>

                    @foreach($pesertas as $peserta)
                    <option value="{{$peserta->id}}">{{$peserta->nama}}</option>
                    @endforeach

                </select>
                <small id="emailHelp" class="form-text text-muted">You can select previously added Participant here</small>
            </div>
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="nama" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Place of Birth</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="emailHelp" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Date of Birth</label>
                <!-- <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="emailHelp" placeholder="" required> -->
                <br>
                <input type="text" data-format="YYYY-MM-DD" data-template="D MMM YYYY" id="tanggal_lahir" name="tanggal_lahir">
            </div>

           
            <div class="form-group">
                <label for="nohp">Phone Number</label>
                <input type="text" class="form-control" name="nohp" id="nohp" aria-describedby="emailHelp" placeholder="" required>
            </div>

             <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">School Grade</label>
                <select class="form-control" id="sekolah_tingkat" name="sekolah_tingkat" required>
                    <option value="">Select Grade</option>
                    <option value="0">Pre School</option>
                    <option value="1">Grade 1st</option>
                    <option value="2">Grade 2nd</option>
                    <option value="3">Grade 3rd</option>
                    <option value="4">Grade 4th</option>
                    <option value="5">Grade 5th</option>
                    <option value="6">Grade 6th</option>
                    <option value="7">Grade 7th</option>
                    <option value="8">Grade 8th</option>
                    <option value="9">Grade 9th</option>
                    <option value="10">Grade 10th</option>
                    <option value="11">Grade 11th</option>
                    <option value="12">Grade 12th</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sekolah_nama">School Name</label>
                <input type="text" class="form-control" name="sekolah_nama" id="sekolah_nama" aria-describedby="emailHelp" placeholder="" required>
            </div>

            <div class="form-group">
                
                <label for="foto">Upload Photo</label>
                <input type="file" class="form-control-file" id="foto" name="foto" required>
            </div>
            <img height="200px" id="target" src="http://via.placeholder.com/150x200"/><br><br />

            <div class="form-group">
                <label for="akte">Upload Repertoire</label>
                <input type="file" class="form-control-file" id="akte" name="akte" accept="application/pdf">
            </div>
            <img height="200px" id="target_akte" src="http://via.placeholder.com/150x200"/><br>
            
            <br>
            <h4>Category</h4>
            <hr>
            <!-- <h5>Kategori #1</h5> -->
            <div class="form-group">
                <label for="tempat_lahir">Select Category</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Select Category</option>
                    @foreach($lomba->lomba->kategori as $kategori)
                    <option id="kategori{{$kategori->id}}" value="{{$kategori->id}}">{{$kategori->name}}</option>   
                    @endforeach
                </select>
            </div>

            <div id="piece_template">
            </div>
            
            @if($lomba->lomba->tipe_lomba == 'semifinal')
            <div id="piece_template_final">
              
            </div>
            @endif

           

            <div class="w-block" align="right">
                <a href="/lombaku/{{$lomba->id}}/peserta" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
            
        </div>
    </div>
</div>

<br>

@endsection


@section('js')

<script src="/js/moment.js"></script> 
<script src="/js/combodate.js"></script> 
<script src="/js/axios.js"></script>
<script>
    $( "#form" ).submit(function( event ) {
        if($("#tanggal_lahir").val() == ""){
            alert("Date of Birth Empty");
            event.preventDefault();
        }
        return;
        
    });
    console.log("hello");
    $("#tanggal_lahir").combodate();
    var dataPeserta = {!!$pesertas!!}
    var dataPesertaSelected;
    // var dataPesertaKu = {!!$pesertas!!}
    var kategoriReserved = null;
    var dataKategori = {!!$lomba->lomba->kategori!!}
    $('#peserta_id').change(function(){
        // alert('hello');
        
        var peserta_id = $(this).val();
        dataKategori.forEach(function(kategori){
                // $('#kategori'+kategori.id).prop('disabled', false);
                $('#kategori'+kategori.id).html(kategori.name);
            });
        if(peserta_id){
            axios.get('/pesertaku/'+peserta_id)
                 .then(function(resp){
                    console.log(resp);
                        
                        if(resp.data.length > 0){
                            dataPesertaSelected = resp.data;
                            // dataPesertaSelected.forEach(function(data){
                            //     console.log(data);
                            //     $('#kategori'+data.kategori_id).prop('disabled', true);
                            //     // $('#kategori'+data.kategori_id).html($('#kategori'+data.kategori_id).html() + " (Already Registered)");
                            // });
                        }
                        dataPeserta.forEach(function(data){
                            if(data.id == peserta_id){
                                // console.log(data);
                                changeData(data);
                                @if($lomba->lomba->type == 'kelas')
                                        
                                    renderTingkatSekolah();
                                @endif
                                // @if($lomba->lomba->type == 'umur')
                                        
                                //     renderUmur();
                                // @endif
                                return;
                            
                            }
                        });
                    
                    
                 })
                 .catch(function(err){
                 })
        }
       
        $('#foto').attr('required', true);
        $('#target').attr('src','http://via.placeholder.com/150x200');
        $('#target_akte').attr('src','http://via.placeholder.com/150x200');
        // http://via.placeholder.com/150x200
        // $("#tanggal_lahir").combodate('setValue','0000-00-00');
        if(peserta_id == ''){
            $('#nama').val('');
            $('#tanggal_lahir').val('');
            $('#tempat_lahir').val('');
            $('#alamat').val('');
            $('#nohp').val('');
            $('#email').val('');
            $('#sekolah_tingkat').val('');
            $('#sekolah_nama').val('');
           
            return;
        }
     
        // console.log(peserta);
    });
    function changeData(data){
        $('#nama').val(data.nama);
        // $('#tanggal_lahir').val(data.tanggal_lahir);
        $("#tanggal_lahir").combodate('setValue',data.tanggal_lahir);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#alamat').val(data.alamat);
        $('#kota').val(data.kota);
        $('#provinsi').val(data.provinsi);
        $('#nohp').val(data.nohp);
        $('#email').val(data.email);
        $('#sekolah_tingkat').val(data.sekolah_tingkat);
        $('#sekolah_nama').val(data.sekolah_nama);
        $('#target').attr('src','/uploads/'+data.foto);
        $('#target_akte').attr('src','/uploads/'+data.akte);
        $('#foto').removeAttr('required');
        console.log(data);
    }
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
     $('#akte').change(function putImage() {
        var src = document.getElementById("akte");
        var target = document.getElementById("target_akte");
        showImage(src, target);
    });
    
    var generateSongPilihan = function(data){
        var html = "";
        
        // for(var i = 1; i <= data.song_set; i++){
            html = html + 
            `<div class="form-group">
                <label for="song1">Select Piece</label>
                <select class="form-control" id="song1" name="song1" required>
                    <option value="">Select Piece</option>
                    ${data['song1'] ? '<option value="1">'+data['song1']+'</option>' : ''}
                    ${data['song2'] ? '<option value="2">'+data['song2']+'</option>' : ''}
                    ${data['song3'] ? '<option value="3">'+data['song3']+'</option>' : ''}
                    ${data['song4'] ? '<option value="4">'+data['song4']+'</option>' : ''}
                    ${data['song5'] ? '<option value="5">'+data['song5']+'</option>' : ''}
                    ${data['song6'] ? '<option value="6">'+data['song6']+'</option>' : ''}
                    ${data['song7'] ? '<option value="7">'+data['song7']+'</option>' : ''}
                    ${data['song8'] ? '<option value="8">'+data['song8']+'</option>' : ''}
                    ${data['song9'] ? '<option value="9">'+data['song9']+'</option>' : ''}
                    ${data['song10'] ? '<option value="10">'+data['song10']+'</option>' : ''}
                </select>
            </div>`;
        // }
        return html;
        
    }
    var generateSongBebas = function(data){
        var html = "";
        for(var i = 1; i <= data.song_set; i++){
            html = html +  
            `<div class="form-group">
                <label for="song${i}">Piece ${i}</label>
                <input type="text" class="form-control" name="song${i}" id="song${i}" aria-describedby="emailHelp" placeholder="" required>
            </div>`;
        }
        return html;
       
    }
    var generateSongPilihanFinal = function(data){
        var html = "";
        
        // for(var i = 1; i <= data.song_set; i++){
            html = html + 
            `<div class="form-group">
                <label for="song1">Select Piece for Final</label>
                <select class="form-control" id="song1_final" name="song1_final" required>
                    <option value="">Select Piece</option>
                    ${data['song1_final'] ? '<option value="1">'+data['song1_final']+'</option>' : ''}
                    ${data['song2_final'] ? '<option value="2">'+data['song2_final']+'</option>' : ''}
                    ${data['song3_final'] ? '<option value="3">'+data['song3_final']+'</option>' : ''}
                    ${data['song4_final'] ? '<option value="4">'+data['song4_final']+'</option>' : ''}
                    ${data['song5_final'] ? '<option value="5">'+data['song5_final']+'</option>' : ''}
                    ${data['song6_final'] ? '<option value="6">'+data['song6_final']+'</option>' : ''}
                    ${data['song7_final'] ? '<option value="7">'+data['song7_final']+'</option>' : ''}
                    ${data['song8_final'] ? '<option value="8">'+data['song8_final']+'</option>' : ''}
                    ${data['song9_final'] ? '<option value="9">'+data['song9_final']+'</option>' : ''}
                    ${data['song10_final'] ? '<option value="10">'+data['song10_final']+'</option>' : ''}
                </select>
            </div>`;
        // }
        return html;
        
    }
    var generateSongBebasFinal = function(data){
        var html = "";
        for(var i = 1; i <= data.song_set_final; i++){
            html = html +  
            `<div class="form-group">
                <label for="song${i}_final">Piece ${i} Final</label>
                <input type="text" class="form-control" name="song${i}_final" id="song${i}_final" aria-describedby="emailHelp" placeholder="" required>
            </div>`;
        }
        return html;
       
    }
    $('#kategori_id').change(function(){
        // alert('hello');
        $('#piece_template').html('');
        var kategori_id = $(this).val();
        dataKategori.forEach(function(data){
            if(data.id == kategori_id){
                // console.log(data);
                changeDataKategori(data);
                return;
            }
        });
        // console.log(peserta);
    });
    function changeDataKategori(data){
        var html = '';
        console.log("Change: "+data.song_type);
        if(data.song_type == 'pilihan'){
            html = generateSongPilihan(data);
            $('#piece_template').html(html);
            if(data.song_type_final == 'pilihan'){
                html2 = generateSongPilihanFinal(data);
                $('#piece_template_final').html(html2);
                return;
            }
             if(data.song_type_final == 'bebas'){
                html2 = generateSongBebasFinal(data);
                $('#piece_template_final').html(html2);
                return;
            }
            return;
        }
        
        if(data.song_type == 'bebas'){
            html = generateSongBebas(data);
            $('#piece_template').html(html);
             if(data.song_type_final == 'pilihan'){
                html2 = generateSongPilihanFinal(data);
                $('#piece_template_final').html(html2);
                return;
            }
             if(data.song_type_final == 'bebas'){
                html2 = generateSongBebasFinal(data);
                $('#piece_template_final').html(html2);
                return;
            }
            return;
        }             

        return;    
    }
     
    @if($lomba->lomba->type == 'umur')
        // alert('umur');
        $('#tanggal_lahir').change(function(){
            
            renderUmur();
        });
        
    @endif
    @if($lomba->lomba->type == 'kelas')
        // alert('kelas');
        $('#sekolah_tingkat').change(function(){
            
            renderTingkatSekolah();
        });
        
    @endif
    function renderTingkatSekolah(){
        // alert('kelas');
        // console.log(dataKategori);
        dataKategori.forEach(function(kategori){
            // $('#kategori'+kategori.id).prop('disabled', false);
            $('#kategori'+kategori.id).html(kategori.name);
        });
        var tingkatX = $('#sekolah_tingkat').val();
        dataKategori.forEach(function(kategori){
            console.log(kategori.name);
            console.log(tingkatX);
            console.log(kategori);
            if(tingkatX < kategori.min || tingkatX > kategori.max){
                // $('#kategori'+kategori.id).prop('disabled', true);
                // $('#kategori'+kategori.id).html(kategori.name+ " (Not Met Criteria Min: "+kategori.min+")");
            }
        });
         dataPesertaSelected.forEach(function(data){
            console.log(data);
            // $('#kategori'+data.kategori_id).prop('disabled', true);
            // $('#kategori'+data.kategori_id).html($('#kategori'+data.kategori_id).html() + " (Already Registered)");
        });
    }
    function renderUmur(){
        // alert('umur');
        dataKategori.forEach(function(kategori){
            // $('#kategori'+kategori.id).prop('disabled', false);
            $('#kategori'+kategori.id).html(kategori.name);
        });
        
        var umurX = $('#tanggal_lahir').val();
        var tanggal_lahir = moment(umurX);
        var tanggal_lomba = moment("{!!$lomba->lomba->tanggal_lomba!!}");
        var umur = tanggal_lomba.diff(tanggal_lahir, 'years');
        console.log(umur);
        dataKategori.forEach(function(kategori){
            console.log(kategori);
            if(umur < kategori.min || umur > kategori.max){
                // $('#kategori'+kategori.id).prop('disabled', true);
                // $('#kategori'+kategori.id).html(kategori.name+ " (Not Met Criteria Min: "+kategori.min+")");
            }
        });
        dataPesertaSelected.forEach(function(data){
            console.log(data);
            // $('#kategori'+data.kategori_id).prop('disabled', true);
            // $('#kategori'+data.kategori_id).html($('#kategori'+data.kategori_id).html() + " (Already Registered)");
        });
    }
    var x ="{!!$lomba->lomba->tanggal_lomba!!}";
  
</script>


@endsection