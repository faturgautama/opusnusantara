@extends('layouts.admin')
@section('css')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/stisla/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><a href="/admin/lomba/{{$lomba_id}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a></div>
        <div class="card-header"><h4>Filter Kategori</h4></div>

        <div class="card-body">
            <div class="form-group">
                <form action="/admin/lomba/{{$lomba_id}}/kategori" method="get">
                    <div class="input-group">
                        <select class="form-control" name="kid" >
                            <option selected>Pilih Kat...</option>
                            <option value="all">Semua</option>
                            @foreach($kategoris as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="tipe_lomba">
                            <option selected value="semifinal">Semifinal</option>
                            <option value="final">Final</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">&nbsp &nbsp Tampilkan &nbsp &nbsp</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card card-primary mt-5">
        <div class="card-header"><h4><b>Semua Peserta</b></h4></div>

        <div class="card-body">
                
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>                                 
                    <tr>
                    <th class="text-center">#</th>
                    <th>Nama</th>
                    <th>No Undi</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>  
                @foreach($kategoris as $kategori)
                    <?php $pesertas = \App\LombakuPeserta::where(
                        'kategori_id',
                        $kategori->id
                    )
                        ->orderBy('no_undian', 'Asc')
                        ->get(); ?>
                    @foreach($pesertas as $data)
                    <tr>
                        <td>{{str_replace(['Bebas ','Pilihan '],['B','P'],$kategori->name)}}_</td>
                        <td>
                            {{$data->no_undian}} -
                            <a id="nama_{{$data->id}}" href="#nama_{{$data->id}}" class="nama_{{$data->id}}">
                            {{ucwords(strtolower($data->nama))}}
                            </a>
                        </td>
                        <td>{{$data->no_undian}}</td>
                        <td>
                            @if($data->absen == 0) 
                            <a href="#hadir_{{$data->id}}" class="absen_{{$data->id}}" id="hadir_{{$data->id}}">
                                <button class="btn btn-danger" type="submit">Hadir</button>
                            </a> 
                            <button id="hadir1_{{$data->id}}" class="badge badge-info" type="submit">Hadir</button>
                            <a href="#hapus_{{$data->id}}" id="hapus_{{$data->id}}" class="hapus_{{$data->id}}">
                                <i class="fas fa-eraser text-danger"></i>
                            </a>                     
                            @else
                                <a href="#hadir3_{{$data->id}}" class="hadir3_{{$data->id}}" id="hadir3_{{$data->id}}">
                                    <button class="btn btn-danger" type="submit">Hadir</button>
                                </a> 
                                <button id="hadir2_{{$data->id}}" class="badge badge-info" type="submit">Hadir</button> &nbsp
                                <a href="#hapus1_{{$data->id}}" id="hapus1_{{$data->id}}" class="hapus1_{{$data->id}}">
                                    <i class="fas fa-eraser text-danger"></i>
                                </a>   
                            @endif
                            
                            <script>
                                                                   
                                    $("#hadir1_{{$data->id}}").hide();
                                    $("#hadir3_{{$data->id}}").hide();
                                    $("#hapus_{{$data->id}}").hide();
                                    
                                    $('.absen_{{$data->id}}').click(function(){
                                    $("#hadir_{{$data->id}}").hide();
                                        $("#hadir1_{{$data->id}}").show();
                                        $("#hapus_{{$data->id}}").show();
                                        axios.post('/admin/lomba/{{$data->id}}/cek')
                                    });

                                    $('.nama_{{$data->id}}').click(function(){            
                                        $("#hadir_{{$data->id}}").hide();
                                        $("#hadir1_{{$data->id}}").show();
                                        $("#hapus_{{$data->id}}").show();
                                        axios.post('/admin/lomba/{{$data->id}}/cek')
                                    });

                                    $('.hadir3_{{$data->id}}').click(function(){            
                                        $("#hadir3_{{$data->id}}").hide();
                                        $("#hadir2_{{$data->id}}").show();
                                        $("#hapus1_{{$data->id}}").show();
                                        axios.post('/admin/lomba/{{$data->id}}/cek')
                                    });

                                    $('.hapus1_{{$data->id}}').click(function(){
                                        $("#hapus1_{{$data->id}}").hide();            
                                        $("#hadir2_{{$data->id}}").hide();
                                        $("#hadir3_{{$data->id}}").show();
                                        axios.post('/admin/lomba/{{$data->id}}/uncek')
                                    });

                                    $('.hapus_{{$data->id}}').click(function(){            
                                        $("#hadir_{{$data->id}}").show();
                                        $("#hadir1_{{$data->id}}").hide();
                                        $("#hapus_{{$data->id}}").hide();
                                        axios.post('/admin/lomba/{{$data->id}}/uncek')
                                    });
                               
                                
                            </script>

                        </td>
                        
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
                </table>
            </div>
           
        </div>
    </div>
@endsection
@section('js')

 <!-- JS Libraies -->
  <script src="/stisla/assets/modules/datatables/datatables.min.js"></script>
  <script src="/stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="/stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="/stisla/assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script>

    $("#table-1").dataTable({
    "columnDefs": [
        { "sortable": true, "targets": [2,3] }
    ]
    }); 
  </script>
  <script src="/stisla/assets/modules/select2/dist/js/select2.js" type="text/javascript"></script>
<script src="/js/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "/admin/api/qPeserta";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    var path2 = "/admin/api/searchDudi";
    $('input.typeahead2').typeahead({
        source:  function (query, process) {
        return $.get(path2, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
<script src="/js/axios.js"></script>

@endsection