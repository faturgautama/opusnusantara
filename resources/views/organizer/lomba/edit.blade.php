@extends('layouts.organizer')

@section('css')

@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="/organizer/lomba/{{$lomba->id}}" method="post" enctype="multipart/form-data">
        {{ method_field('PATCH')}}
          {{csrf_field()}}
          <div class="form-group">
              <label for="name">Nama</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama Lomba" value="{{$lomba->name}}" required>
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
              <select class="form-control" name="status" id="status" value="{{$lomba->status}}">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
                <option value="2">Sistem Custom</option>
                <option value="9">Sistem Lama</option>
              </select>
          </div>

           <div class="form-group">
              <label for="description">Link Pendaftaran Custom</label>
              <input name="url_pendaftaran" type="text" class="form-control" id="url_pendaftaran" placeholder="Masukkan Link Pendaftaran Custom, kosongi jika tidak digunakan" value="{{$lomba->url_pendaftaran}}">
          </div>

           <div class="form-group">
              <label for="description">Tipe Lomba</label>
              <select disabled class="form-control" name="tipe_lomba" id="tipe_lomba">
                <option value="final">Final</option>
                <option value="semifinal">Semifinal</option>
              </select>
          </div>

          <div class="form-group">
              <label for="description">Tampilkan di Web</label>
              <select class="form-control" name="show" id="show" value="{{$lomba->show}}">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
          </div>

          <div class="form-group">
              <label for="description">Deskripsi</label>
              <input name="description" type="text" class="form-control" id="description" placeholder="Masukkan Deskripsi Lomba" value="{{$lomba->description}}" required>
          </div>

          <div class="form-group">

              <label for="tempat_lahir">Upload Photo</label>
              <input type="file" class="form-control-file" id="foto" name="foto">
          </div>
          <img height="100px" id="target" src="{{$lomba->poster}}"/><br>

          <div class="form-group">
              <label for="tanggal_lomba">Tanggal Lomba</label>
              <input name="tanggal_lomba" type="date" class="form-control" id="tanggal_lomba" placeholder="Masukkan Tanggal Lomba" value="{{$lomba->tanggal_lomba}}" required>
          </div>

          <div class="form-group">
            <label for="tanggal_end_pendaftaran">Kategori</label>
              <select class="form-control" name="type" id="type" value="{{$lomba->type}}">
                <option value="umur">Umur</option>
                <option value="kelas">Kelas</option>
              </select>
          </div>

          <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
      </form>
    </div>

  </div>
  <br>
  <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h6 class="h-block">Kategori Lomba "{{$lomba->name}}"<h6>
                    </div>
                    <div class="col" >
                        <div class=" pull-right btn-group">
                            <a class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalKategori">
                                Import Kategori
                            </a>
                            <a class="btn btn-success waves-effect waves-light" href="/organizer/lomba/{{$lomba->id}}/kategori/create">
                                Tambah Kategori & Lagu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="container">

                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Nama</th>
                            <th>Min {{ucwords($lomba->type)}}</th>
                            <th>Max {{ucwords($lomba->type)}}</th>
                            <th>Song Type</th>
                            <th>Song Set</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // dd($lomba['kategori']);
                        ?>
                        @for($i = 0; $i<sizeof($lomba['kategori']); $i++) <tr>

                            <th scope="row">{{($i+1)}}</th>
                            <td>{{$lomba['kategori'][$i]->name}}</td>
                            <td>{{$lomba['kategori'][$i]->min}}</td>
                            <td>{{$lomba['kategori'][$i]->max}}</td>
                            <td>{{$lomba['kategori'][$i]->song_type}}</td>
                            <td>{{$lomba['kategori'][$i]->song_set}}</td>
                            <td>
                                <a href="/organizer/lomba/{{$lomba->id}}/kategori/{{$lomba['kategori'][$i]->id}}/edit">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Edit</button>
                                </a>
                                <a lomba-id="{{$lomba->id}}" kategori-nama="{{$lomba['kategori'][$i]->name}}" kategori-id="{{$lomba['kategori'][$i]->id}}" class="hapus-kategori">
                                    <button type="button" class="btn btn-danger waves-effect waves-light">Hapus</button>
                                </a>
                            </td>
                            </tr>

                        @endfor
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <h6 class="h-block">Konten Lomba <h6>
                  </div>
                  <div class="col">		
                       <!-- <a class="btn btn-success waves-effect waves-light pull-right" href="/organizer/lomba/{{$lomba->id}}/konten/create">		
                           Tambah Konten		
                       </a>		 -->
                 </div>
              </div>
          </div>
      </div>
      <div class="card-body">
        <div class="container">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $kontens = \App\LombaKonten::where('lomba_id', $lomba->id)->get();
                ?>
                @foreach($kontens as $konten)
                <tr>
                    <td>{{$konten->judul}}</td>
                    <td>{{$konten->tipe}}</td>
                    <td>
                        <a href="/organizer/lomba/{{$lomba->id}}/konten/{{$konten->id}}/edit" class="btn btn-primary">Edit</a>
                        <!-- <a href="#" konten-id="{{$konten->id}}" class="btn btn-danger konten-hapus">Hapus</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

@endsection

@section('js')
<!-- Modal -->
<script src="{{asset('js/axios.js')}}"></script>
@php
    $allLomba = \App\lomba::get();
    
@endphp
<div class="modal fade" id="modalKategori" tabindex="-1" width="" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Lomba</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <select class="form-control" id="modalSelectLomba">
                    <option  value="" selected>Choose...</option>
                    @foreach ($allLomba as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <br>
                Lomba Kategori :
                <div style="height: 15em; overflow-y: scroll;">
                    <ol id="listDataKategori"></ol>
                </div>
                <script>
                    async function getData(id){
                        await axios.get('/v2/api/lomba/'+id+'/kategori')
                        .then(function (response) {
                            $( "#listDataKategori").html(
                                response.data.map(function(res){
                                    return `<li>${res.name}</li>`
                                })
                            );
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                    }
                    $('#modalSelectLomba').change(()=>{
                        str = $('#modalSelectLomba').val()
                        getData(str);
                        // $( "#listDataKategori" ).text( str );
                        
                    })
                    .trigger( "change" );
                </script>
        </div>
        <div class="modal-footer">
            @csrf
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="importCategory()" class="btn btn-primary">Import</button>
            <script>
                var _token = $('input[name="_token"]').val();
                
                async function importCategory(){
                    axios.post('/v2/lomba/{{$lomba->id}}/import/'+$('#modalSelectLomba').val()+'/category', {
                        _token: $('input[name="_token"]').val(),
                    })
                    .then(function (response) {
                        console.log(response);
                        alert('import success !')
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                        alert('error !');
                        window.location.reload();
                    });
                }
            </script>
        </div>
        </div>
    </div>
</div>
  <script>
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
  </script>
  <script>
    function showImage(src, target) {
        var fr = new FileReader();
        fr.onload = function(){
            target.src = fr.result;
        }
        fr.readAsDataURL(src.files[0]);
    }

    $(function() {
      $('textarea#froala-editor').froalaEditor()
    });

    $('#foto').change(function putImage() {
        var src = document.getElementById("foto");
        var target = document.getElementById("target");
        showImage(src, target);
    });
    $('#type').val("{{$lomba->type}}");
    $('#show').val("{{$lomba->show}}");
    $('#status').val("{{$lomba->status}}");
    $('#tipe_lomba').val("{{$lomba->tipe_lomba}}");
    $('#tipe_konten').val("{{$lomba->tipe_konten}}");
    $('.konten-hapus').click(function(){
        var konten_id = $(this).attr('konten-id');
        if(confirm("Yakin dihapus?")){
            axios.delete('/organizer/lomba/{{$lomba->id}}/konten/'+konten_id)
                .then(function(){
                    window.location.reload();
                });
        }
    });

    $('.hapus-kategori').click(function(){
        var kategori_id = $(this).attr('kategori-id');
        var lomba_id = $(this).attr('lomba-id');
        // alert(lomba_id);
        // alert(kategori_id);
        if(confirm("Yakin dihapus?")){
            axios.delete('/organizer/lomba/{{$lomba->id}}/kategori/'+kategori_id)
                 .then(function(){
                     window.location.reload();
                 });
        }
    });

  </script>
@endsection
