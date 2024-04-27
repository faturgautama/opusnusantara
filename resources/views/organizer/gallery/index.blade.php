@extends('layouts.organizer')


@section('css')

@endsection


@section('content')
<div class="card">
    <div class="card-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h6 class="h-block">
                        Data Lomba
                    <h6>
                </div>
            </div>
        </div>
    </div>
  <div class="card-body">
    <div class="container">
      <table class="table table-responsive" id="datatable">
          <thead>
              <tr>
              <th scope="col">No</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Poster</th>
              <th>Tanggal</th>
              <th>Kategori</th>
              <th>Action</th>
              </tr>
          </thead>

          <tbody>
            <?php
                  $lombas = \App\Lomba::get();
              ?>
               @for($i = 0; $i<sizeof($lombas); $i++)
            <tr>
              <th scope="row">{{($i+1)}}</th>
              <td>
                  <a href="/organizer/gallery/{{$lombas[$i]->id}}">
                      {{$lombas[$i]->name}}
                  </a>
              </td>
              <td>
                @if($lombas[$i]->status == '1')
                    Aktif
                @endif
                @if($lombas[$i]->status == '0')
                    Tidak Aktif
                @endif
                @if($lombas[$i]->status == '9')
                    Sistem Lama
                @endif
              </td>
              <td>
                 <img height="100" src="{{$lombas[$i]->poster}}" />
             </td>
             <td>{{$lombas[$i]->tanggal_lomba}}</td>
             <td>{{ucfirst($lombas[$i]->type)}}</td>
             <td>
               <a href="/organizer/gallery/{{$lombas[$i]->id}}" class="btn btn-primary">Pilih</a>
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

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
// $('#datatable').DataTable();
$('.hapus-lomba').click(function(){
    var lombaId = $(this).attr('lomba-id');
    var lombaName = $(this).attr('lomba-nama');
    if(confirm("Anda Yakin Ingin Menghapus Lomba "+lombaName+"?")){
      axios.delete('/organizer/lomba/'+lombaId)
        .then(function (response) {
          console.log(response);
          window.location.reload();
        })
        .catch(function (error) {
          console.log(error);
        });
    }

});
</script>
@endsection
