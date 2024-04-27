@extends('layouts.opusv2')

@section('css')
<link rel="stylesheet" href="/stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<style>
    .form-control{
        border-radius:0px !important;
    }
    img{
        height: 200px;
    }
</style>
@endsection

@section('content')
<?php
// dd($lombas);
$pesertas = \App\LombaPeserta::where('user_id', \Auth::user()->id)->get();
$x = json_encode($pesertas);

// $lomba = \App\Lombaku::find($lombaId);
?>
<div class="section-header">
    <h1>{{$lombas->name}}</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Enjoy the new features of Opus Nusantara . We can see the latest news from opus nusantara here')}}+" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>
<div class="row">
    <div class="col-12 col-md-12">
        <form id="form" action="/v2/myregister/{{$lombaku}}/create" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="lombaku" value="{{$lombaku}}">
        <input type="hidden" name="lombaId" value="{{$lombas['id']}}">
        <div class="card">
            <div class="card-body">
                <h4 class="text-dark">Participant</h4>
            <hr>
                <div class="form-group">
                    <label for="">Select Participant</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                        
                        <select name="peserta_id" id="peserta_id" class="form-control">
                            <option value="">Add New Participant</option>
                            @foreach($pesertas as $peserta)
                                <option value="{{$peserta->id}}">{{$peserta->nama}}</option>
                            @endforeach
                        </select>
                        
                    </div> 
                    <small id="emailHelp" class="form-text text-muted">You can select previously added Participant here</small>                  
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 form-group">
                        <label for="name">Name Participant <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text" id="icon-name">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">Place of Birth <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>  
                            </div>
                            <input type="text" class="form-control"name="tempat_lahir" id="tempat_lahir" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">Date of Birth <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>  
                            </div>
                            <input type="text" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">Email <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                @
                            </div>  
                            </div>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">Phone Number <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                            </div>  
                            </div>
                            <input type="text" class="form-control" name="nohp" id="nohp" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="">Address <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="">Street</i>
                            </div>  
                            </div>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="">City <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="">City</i>
                            </div>  
                            </div>
                            <input type="text" class="form-control" name="kota" id="kota" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="">Province <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="">Province</i>
                            </div>  
                            </div>
                            <input type="text" class="form-control" name="provinsi" id="provinsi" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">School Name <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-school"></i>
                            </div>  
                            </div>
                            <input type="text" class="form-control" name="sekolah_nama" id="sekolah_nama" required>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">School Grade <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-arrow-down"></i>
                            </div>  
                            </div>
                            
                            <select id="sekolah_tingkat" name="sekolah_tingkat" class="form-control">
                                <option value="">Select Grade <code>*</code></option>
                                <option value="0">Pre School</option>
                                @for($i=1;$i< 13;$i++)
                                <option value="{{$i}}">Grade {{$i}}st</option>
                                @endfor
                            </select>
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">Upload Photo <i style="font-size:10px">(Max size 3Mb)</i><code>*</code></label>
                        
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-image"></i>
                            </div>  
                            </div>
                            <input type="file" class="form-control" name="foto" id="foto" required>
                            <div class="col-12 mt-3">
                            <img id="target" src="" alt="">
                            </div>

                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 form-group">
                        <label for="">Upload Birth Certificate/Passport</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-image"></i>
                            </div>  
                            </div>
                            <input type="file" class="form-control" name="akte" id="akte">
                            <div class="col-12 mt-3">
                            <img id="target_akte" src="" alt="">
                            </div>
                        </div>                   
                    </div>
                </div>
                <h4 class="text-dark">Category</h4>
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 form-group">
                        <label for="">Select Category <code>*</code></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-arrow-down"></i>
                            </div>  
                            </div>
                            
                            <!-- <div class="sss"> -->
                            <select id="kategori_id" name="kategori_id" class="form-control" data-depandent="piece_template">
                                <option value="">Select Category</option>
                                @foreach($lomba_kat as $kategori)
                                <option id="kat{{$kategori->id}}" data-type="{{$kategori->song_type}}" value="{{$kategori->id}}">{{$kategori->name}}</option>   
                                @endforeach
                            </select>
                            <!-- </div> -->
                        </div>                   
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 form-group">        
                            <div id="piece_template"></div>
                            @if($lombas->tipe_lomba == 'semifinal')
                            <div id="piece_template_final"></div>
                            @endif
                        </div>                   
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 form-group">
                    <div class="w-block" align="right">
                        <a href="/v2/myregister" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                        <button id="btnSubmit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<hr>

@endsection

@section('js')
<script src="/js/moment.js"></script> 
<script src="/js/combodate.js"></script> 
<!-- <script src="/js/axios.js"></script> -->
<script src="/stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
// $('#peserta_id').change(function(){
//     var data = <?php echo $x; ?>;
//     console.log(data);
//     $('#nama').val("{{str_replace("'","", $peserta->nama)}}");
//     $('#tanggal_lahir').val('{{$peserta->tanggal_lahir}}');
//     // $("#tanggal_lahir").combodate('setValue',data.tanggal_lahir);
//     // $('#tempat_lahir').val($peserta->mpat_lahir);
//     $('#tempat_lahir').val('{{$peserta->tempat_lahir}}');
//     $('#alamat').val('{{$peserta->alamat}}');
//     $('#kota').val('{{$peserta->kota}}');
//     $('#provinsi').val('{{$peserta->provinsi}}');
//     $('#nohp').val('{{$peserta->nohp}}');
//     $('#email').val('{{$peserta->email}}');
//     $('#sekolah_tingkat').val('{{$peserta->sekolah_tingkat}}');
//     $('#sekolah_nama').val('{{$peserta->sekolah_nama}}');
//     $('#target').attr('src','/uploads/'+'{{$peserta->foto}}');
//     $('#target_akte').attr('src','/uploads/'+'{{$peserta->akte}}');
//     $('#foto').removeAttr('required');
    
// });
</script>
<script>
    // console.log(data);
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
//    INI AJAX
var dataPeserta;
var dataKategori = {!!$lombas->kategori!!}
$(document).ready(function(){
    $('#btnSubmit').click(function(){
        if($('#nama').val() == '') {
            $('#icon-name').attr('class','input-group-text bg-danger')
        }
    });
    $('#peserta_id').change(function(){
        if($(this).val() != ''){
            var value = $(this).val();
            var _token = $('input[name="_token"]').val();
            // console.log(value);
            $.ajax({
                url :"/v2/api/peserta",
                method : "POST",
                data :{
                    _token:_token,
                    value:value,
                    
                }, success:function(result){
                    dataPeserta = JSON.parse(result);
                    console.log(result.nama);
                    $('#nama').val(dataPeserta.nama);
                    $('#tanggal_lahir').val(dataPeserta.tanggal_lahir);
                    // $("#tanggal_lahir").combodate('setValue',data.tanggal_lahir);
                    // $('#tempat_lahir').val($peserta->mpat_lahir);
                    $('#tempat_lahir').val(dataPeserta.tempat_lahir);
                    $('#alamat').val(dataPeserta.alamat);
                    $('#kota').val(dataPeserta.kota);
                    $('#provinsi').val(dataPeserta.provinsi);
                    $('#nohp').val(dataPeserta.nohp);
                    $('#email').val(dataPeserta.email);
                    $('#sekolah_tingkat').val(dataPeserta.sekolah_tingkat);
                    $('#sekolah_nama').val(dataPeserta.sekolah_nama);
                    $('#target').attr('src','/uploads/'+dataPeserta.foto);
                    $('#target_akte').attr('src','/uploads/'+dataPeserta.akte);
                    $('#foto').removeAttr('required');
                }
                
            }); 
        }
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

    @if($lombas->type == 'umur')
        // alert('umur');
        $('#tanggal_lahir').change(function(){
            
            renderUmur();
        });
        
    @endif
    @if($lombas->type == 'kelas')
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
        var tanggal_lomba = moment("{!!$lombas->tanggal_lomba!!}");
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
    var x ="{!!$lombas->tanggal_lomba!!}";

});

</script>
@endsection

