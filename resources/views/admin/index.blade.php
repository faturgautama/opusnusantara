@extends('layouts.admin')
@section('css')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Pilih Lomba</h4></div>

        <div class="card-body">
            <?php
            $lombas = \App\Lomba::OrderBy('tanggal_lomba', 'decs')->get();
            $no = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>                                 
                    <tr>
                    <th class="text-center">#</th>
                    <th>Nama Lomba</th>
                    <th>Tanggal Lomba</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                            
                  @for($i = 0; $i< sizeof($lombas); $i++)
                  <tr>
                    <td>{{$no++}}</td>
                     <td>
                      <a class="nav-link active" href="/admin/lomba/{{$lombas[$i]->id}}">{{$lombas[$i]->name}}</a>
                     </td>
                     <td>{{$lombas[$i]->tanggal_lomba}}</td>
                     <td class="">
                      <a href="/admin/lomba/{{$lombas[$i]->id}}" class="btn btn-primary">Masuk</a>
                     </td>
                   </tr>
                  @endfor
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
@endsection