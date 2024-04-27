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
                        Data News
                    <h6>
                </div>
                <div class="col">
                    <a class="btn btn-success waves-effect waves-light pull-right" href="/organizer/news/create">
                        Tambah News
                    </a>
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
              <th>Poster</th>
              <th width="150">Action</th>
              </tr>
          </thead>

          <tbody>
            <?php
                  $news = \App\News::get();
              ?>
               @for($i = 0; $i<sizeof($news); $i++)
            <tr>
              <th scope="row">{{($i+1)}}</th>
              <td>
                      {{$news[$i]->judul}}
              </td>
              <td>
                 <img height="100" src="{{$news[$i]->gambar_url}}" />
             </td>
             <td>
                <a class="btn btn-primary waves-effect waves-light" href="/organizer/news/{{$news[$i]->id}}/edit">
                    Edit
                </a>
                <a class="btn btn-danger waves-effect waves-light hapus-news" news-nama="{{$news[$i]->judul}}" news-id="{{$news[$i]->id}}" href="#">
                    Hapus
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
$('.hapus-news').click(function(){
    var newsId = $(this).attr('news-id');
    var newsNama = $(this).attr('news-nama');
    if(confirm("Anda Yakin Ingin Menghapus News "+newsNama+"?")){
      axios.delete('/organizer/news/'+newsId)
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
