@extends('layouts.app')


@section('css')


@endsection


@section('content')
<div class="card">
  <div class="card-body">
    <div class="container">
      <span class="label label-default">Peserta</span><br>
      <a href="add">
          <button class="btn btn-success">Tambah Peserta</button>
      </a>
      <table class="table">
          <thead>
              <tr>
              <th scope="col">No</th>
              <th scope="col">Full Name</th>
              <th scope="col">Tanggal Lahr</th>
              <th scope="col">Alamat</th>
              <th scope="col">No hp</th>
              <th scope="col">Email</th>
              <th scope="col">Asal Sekolah</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
              </tr>
          </thead>

          <tbody>
            <!-- <?php $lombas = \App\Lomba::get(); ?>
               @for($i = 0; $i<sizeof($lombas); $i++)
            <tr>
              <th scope="row">{{($i+1)}}</th>
              <td>
                  <a href="/organizer/lomba/{{$lombas[$i]->id}}">
                      {{$lombas[$i]->name}}
                  </a>
              </td>
              <td>{{$lombas[$i]->description}}</td>
              <td>
                 <img height="100" src="{{$lombas[$i]->poster}}" />
             </td>
             <td>{{$lombas[$i]->tanggal_start_pendaftaran}}</td>
             <td>{{$lombas[$i]->tanggal_end_pendaftaran}}</td>
             <td>{{$lombas[$i]->type}}</td>
             <td>
                      <a href="/organizer/lomba/{{$lombas[$i]->id}}/edit">
                          <button type="button" class="btn btn-primary">Edit</button>
                      </a>
                      <a lomba-nama="{{$lombas[$i]->name}}" lomba-id="{{$lombas[$i]->id}}" class="hapus-lomba" href="#">
                          <button type="button" class="btn btn-danger">Hapus</button>
                      </a>
                  </td>
            </tr>

            @endfor -->

            <tr>
            <th scope="col">1</th>
            <th scope="col">Coba</th>
            <th scope="col">10-06-2000</th>
            <th scope="col">Semarang</th>
            <th scope="col">123456789</th>
            <th scope="col">example@gmail.com</th>
            <th scope="col">SMA SEMARANG</th>
            <th scope="col">Rp 123456789</th>
            <th scope="col">
                <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </th>
            </tr>

            <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Rp 99999999</th>
            <th scope="col">
                <!-- <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Hapus</button> -->

              <a href="bayar"  class="btn btn-primary float-right">Bayar</a>
            </th>

            </tr>
        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection


@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
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
