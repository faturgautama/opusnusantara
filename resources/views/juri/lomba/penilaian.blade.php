@extends('layouts.juri')

@section('css')


@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Pilih Kategori</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <?php
        // $kategori = \App\LombaKategori::where('lomba_id', $lomba->id)->get();
        $peserta = \App\LombakuPeserta::find($lomba->peserta_id);
        // dd($peserta);
        $kategori = \App\LombaKategori::find($lomba->kategori_id);
        
        
    ?>

    <div class="card">
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">No</th>
                        <td>{{$peserta->no_undian}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Foto</th>
                        <td>
                            <img height="250px" src="/uploads/{{$peserta->foto}}" >
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Judul Lagu</th>
                        <td>
                            <?php
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song1;
                                } else {
                                    $song = $kategori['song'.$peserta->song1];
                                }
                            ?>
                            {{$song}} 
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">

      

        <form id="form" action="/juri/lomba/{{$lomba->id}}/penilaian" method="post">
            
        {{csrf_field()}}
             
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col">Keterangan</th>
                        <td scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                      $pesertas = \App\LombakuPeserta::where('kategori_id', $data['kategori']->id)->orderBy('rata2', 'desc')->get();
                      // dd($pesertas);x
                  ?>
                   @foreach($pesertas as $peserta)
                      <tr>
                            <th scope="row"  name="undian[]">{{$peserta->no_undian}}</th>
                            <td>
                                <input min="0" max="100" class="form-control" name="nilai1[]" type="number" value="{{$peserta->nilai1}}">
                                <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} ">
                                <input class="form-control" name="kategori_id" type="hidden" value="{{$data['kategori']->id}} ">

                            </td>
                            <td>
                                @if(Auth::user()->email=="juri1@gmail.com")
                                <input type="number" name="nilai1[]" min="1" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai1}}">
                                @endif
                                @if(Auth::user()->email=="juri2@gmail.com")
                                <input type="number" name="nilai2[]" min="1" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai2}}">
                                @endif
                                @if(Auth::user()->email=="juri3@gmail.com")
                                <input type="number" name="nilai3p[]" min="1" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai3}}">
                                @endif
                            </td>

                      </tr>
                      @endforeach
                    
                    <input type="hidden" class="form-control" name="peserta_id" value="{{$lomba->peserta_id}}" aria-describedby="emailHelp">
                    <input type="hidden" class="form-control" name="lomba_id" value="{{$lomba->lomba_id}}" aria-describedby="emailHelp">
                    <input type="hidden" class="form-control" name="kategori_id" value="{{$lomba->kategori_id}}" aria-describedby="emailHelp">
                    <!-- <tr>
                        <th>Nilai 2</th>
                        <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Nilai 3</th>
                        <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        </td>
                    </tr> -->
                    
                   
                </tbody>
            </table>


            <div class="w-block" align="right">
                <a href="/juri/lomba/{{$lomba->id}}/nilai?kategori_id={{$lomba->kategori_id}}" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
            
        </div>
    </div>
</div>

<br>

@endsection

