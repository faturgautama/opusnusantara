@extends('layouts.juri')


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
              <th scope="col">Poster</th>
              <th>Nama</th>
              <th width="150">Action</th>
              </tr>
          </thead>

          <tbody>
            <?php $lombas = \App\Lomba::get(); ?>
               @for($i = 0; $i<sizeof($lombas); $i++)
            <tr>
                <td>
                 <img height="100" src="{{$lombas[$i]->poster}}" />
             </td>
              <td>
                  <a href="/juri/lomba/{{$lombas[$i]->id}}">
                      {{$lombas[$i]->name}}
                  </a>
              </td>
             
             <td>
                <a class="btn btn-primary waves-effect waves-light" href="/juri/lomba/{{$lombas[$i]->id}}/">
                    Nilai
                </a>
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
