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
            <h3 class="h-block">Edit Participant</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

      

        <form id="form" action="/lombaku/{{$peserta->lombaku->id}}/peserta/{{$peserta->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')

            <div class="form-group" hidden>
                <label for="exampleFormControlSelect1">Select Participant</label>
                <input type="hidden" class="form-control" id="peserta_id" name="peserta_id" value="{{$peserta->id}}">
            </div>
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="nama" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="" value="{{$peserta->nama}}" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Place of Birth</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="emailHelp" placeholder="" value="{{$peserta->tempat_lahir}}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Date of Birth</label>
                <!-- <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="emailHelp" placeholder="" required> -->
                <br>
                <input type="text" data-format="YYYY-MM-DD" data-template="D MMM YYYY" id="tanggal_lahir" name="tanggal_lahir" value="{{$peserta->tanggal_lahir}}">
            </div>

            <div class="form-group">
                <label for="alamat">Address</label>
                <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="emailHelp" placeholder="" value="{{$peserta->alamat}}" required>
            </div>

            <div class="form-group">
                <label for="nohp">Phone Number</label>
                <input type="text" class="form-control" name="nohp" id="nohp" aria-describedby="emailHelp" placeholder="" value="{{$peserta->nohp}}" required>
            </div>

             <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="" value="{{$peserta->email}}" required>
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
                <input type="text" class="form-control" name="sekolah_nama" id="sekolah_nama" aria-describedby="emailHelp" value="{{$peserta->sekolah_nama}}" placeholder="" required>
            </div>

            <div class="form-group">
                
                <label for="tempat_lahir">Upload Photo</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <img height="200px" id="target" src="/uploads/{{$peserta->foto}}"/><br><br />

            <div class="form-group">
                <label for="akte">Upload Repertoire</label>
                <input type="file" class="form-control-file" id="akte" name="akte" accept="application/pdf">
            </div>
            <img height="200px" id="target_akte" src="/uploads/{{$peserta->akte}}"/><br>
            
            <br>
            <h4>Category</h4>
            <hr>
            <!-- <h5>Kategori #1</h5> -->
            <div class="form-group">
                <label for="tempat_lahir">Select Category</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Select Category</option>
                    @foreach($peserta->lombaku->lomba->kategori as $kategori)
                        <option id="kategori{{$kategori->id}}" value="{{$kategori->id}}">{{$kategori->name}}</option>   
                    @endforeach
                </select>
            </div>

            <div id="piece_template">

                <?php
                    // dd($peserta->kategori);
                ?>
                @if($peserta->kategori->song_type=="pilihan")
                    <!-- <h1>Pilihan</h1> -->
                    <div class="form-group">
                        <label for="song1">Select Piece</label>
                        <select class="form-control" id="song1" name="song1" required>
                            <option value="">Select Piece</option>
                            @if($peserta->kategori->song1)
                            <option value="1">{{$peserta->kategori->song1}}</option>
                            @endif
                            @if($peserta->kategori->song2)
                            <option value="2">{{$peserta->kategori->song2}}</option>
                            @endif
                            @if($peserta->kategori->song3)
                            <option value="3">{{$peserta->kategori->song3}}</option>
                            @endif
                            @if($peserta->kategori->song4)
                            <option value="4">{{$peserta->kategori->song4}}</option>
                            @endif
                            @if($peserta->kategori->song5)
                            <option value="5">{{$peserta->kategori->song5}}</option>
                            @endif
                            @if($peserta->kategori->song6)
                            <option value="6">{{$peserta->kategori->song6}}</option>
                            @endif
                            @if($peserta->kategori->song7)
                            <option value="7">{{$peserta->kategori->song7}}</option>
                            @endif
                            @if($peserta->kategori->song8)
                            <option value="8">{{$peserta->kategori->song8}}</option>
                            @endif
                        </select>
                    </div>
                @endif
                @if($peserta->kategori->song_type=="bebas")
                    @for($i=1; $i<=$peserta->kategori->song_set; $i++)
                        <div class="form-group">
                            <label for="song{{$i}}">Piece {{$i}}</label>
                            <input type="text" class="form-control" name="song{{$i}}" id="song{{$i}}" value="{{$peserta['song'.$i]}}" aria-describedby="emailHelp" placeholder="" required>
                        </div>
                    @endfor
                @endif
            </div>

            <div class="w-block" align="right">
                <a href="/lombaku/{{$peserta->lombaku->id}}/peserta" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
            
        </div>
    </div>
</div>

<br>

@endsection


@section('js')
<script src="/js/axios.js"></script>
<script src="/js/moment.js"></script> 
<script src="/js/combodate.js"></script> 
<script>
    $( "#form" ).submit(function( event ) {

        if($("#tanggal_lahir").val() == ""){
            alert("Date of Birth Empty");
            event.preventDefault();
        }

        return;
        
    });
    var dataPesertaSelected;

    $("#tanggal_lahir").combodate();

     axios.get('/pesertaku/' + {{$peserta->lomba_peserta_id}})
          .then(function(resp){
            console.log(resp);
                
                if(resp.data.length > 0){
                    dataPesertaSelected = resp.data;
                    // resp.data.forEach(function(data){
                    //     console.log(data);
                        
                    //     if(data.kategori_id != {{$peserta->kategori_id}}){
                    //         $('#kategori'+data.kategori_id).prop('disabled', true);
                    //         $('#kategori'+data.kategori_id).html($('#kategori'+data.kategori_id).html() + " (Already Registered)");
                    //         console.log("disable "+data.kategori_id);
                    //     }
                       
                    // });
                }

            
            })
            .catch(function(err){

            })

    @if($peserta->kategori->song_type == 'pilihan')

        $('#song1').val("{{$peserta->song1}}");

    @endif
    var peserta = {!!$peserta!!};
    $('#kategori_id').val(peserta.kategori_id);
    $('#sekolah_tingkat').val(peserta.sekolah_tingkat);
    // changeDataKategori(peserta.kategori_id);
    console.log(peserta.kategori_id);

    var dataKategori = {!!$peserta->lombaku->lomba->kategori!!}
    $('#peserta_id').change(function(){
        // alert('hello');
        
        var peserta_id = $(this).val();
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

        dataPeserta.forEach(function(data){
            if(data.id == peserta_id){
                // console.log(data);
                changeData(data);
                return;
            }
        });
        // console.log(peserta);
    });

    function changeData(data){
        $('#nama').val(data.nama);
        // $('#tanggal_lahir').val(data.tanggal_lahir);
        $("#tanggal_lahir").combodate('setValue',data.tanggal_lahir);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#alamat').val(data.alamat);
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
            return;
        }

        if(data.song_type == 'bebas'){
            html = generateSongBebas(data);
            $('#piece_template').html(html);
            return;
        }
        
       
        return;
       
        
    }

    @if($peserta->lombaku->lomba->type == 'umur')
        // alert('umur');
        $('#tanggal_lahir').change(function(){
            
            renderUmur();

        });
        

    @endif

    @if($peserta->lombaku->lomba->type == 'kelas')
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
        var tanggal_lomba = moment("{!!$peserta->lombaku->lomba->tanggal_lomba!!}");
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



    @if($peserta->lombaku->lomba->type == 'kelas')
                                        
        renderTingkatSekolah();

    @endif

    @if($peserta->lombaku->lomba->type == 'umur')
                                        
        renderUmur();

    @endif

  
</script>


@endsection