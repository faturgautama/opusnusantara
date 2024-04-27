@extends('layouts.juri')

@section('css')


@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Peserta Semifinal</h3>
            <?php
                $kategori = \App\LombaKategori::find($lomba->kategori_id);
            ?>
            <h3 class="h-block">{{$kategori->name}}</h3>
        </div>
    </div>
</div>
<br>
<div class="container">

    <div class="card">
            <div class="card-body">
            <form id="form" action="/juri/lomba/{{$lomba->id}}/penilaian" method="post">
            {{csrf_field()}}
            <table class="table">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th width="60%">Nama</th>
                        <th width="30%">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $pesertas = \App\LombakuPeserta::where('kategori_id', $lomba->kategori_id)->orderByRaw('CAST(no_undian AS UNSIGNED) ASC')->get();
                    // dd($pesertas);
                    $kategori = \App\LombaKategori::find($lomba->kategori_id);
                ?>
                    @foreach($pesertas as $peserta)
                  
                    <tr>
                        <th width="10%" scope="row">{{$peserta->no_undian}}</th>
                        <td width="60%">
                                <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} ">
                                <input class="form-control" name="kategori_id" type="hidden" value="{{$lomba->kategori_id}} ">
                                <input class="form-control" name="tipe_penilaian" type="hidden" value="{{$lomba['tipe_penilaian']}} ">

                            <?php
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song1;
                                } else {
                                    $song = $kategori['song'.$peserta->song1];
                                }
                            ?>
                            <b>Nama :</b> {{$peserta->nama}}
                            <br>
                            @if($peserta->song1 == null)
                            <b>Lagu 1 :</b>
                            <span style="color:brown">tidak memasukkan lagu</span>
                            @else
                            <b>Lagu 1 :</b>
                            {{$peserta->song1}}
                            @endif
 
                            </td>
                            <td width="30%">
                                @if(Auth::user()->email=="juri1@gmail.com")
                                <input type="number" name="nilai1[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai1}}">
                                <input type="hidden" name="nilai2[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai2}}">
                                <input type="hidden" name="nilai3[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai3}}">
                                @endif
                                @if(Auth::user()->email=="juri2@gmail.com")
                                <input type="hidden" name="nilai1[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai1}}">
                                <input type="number" name="nilai2[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai2}}">
                                <input type="hidden" name="nilai3[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai3}}">
                                @endif
                                @if(Auth::user()->email=="juri3@gmail.com")
                                <input type="hidden" name="nilai1[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai1}}">
                                <input type="hidden" name="nilai2[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai2}}">
                                <input type="number" name="nilai3[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai3}}">
                                @endif
                            </td>
                    </tr>
                    {{-- @if(true) --}}
                    <tr>
                        <th scope="row">{{$peserta->no_undian}}</th>
                        <td>
                                {{-- <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} "> --}}
                                <input class="form-control" name="kategori_id" type="hidden" value="{{$lomba->kategori_id}} ">
                                <input class="form-control" name="tipe_penilaian" type="hidden" value="{{$lomba['tipe_penilaian']}} ">

                            <?php
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song2;
                                } else {
                                    $song = $kategori['song'.$peserta->song2];
                                }
                            ?>
                            <b>Nama :</b> {{$peserta->nama}}
                            <br>
                            @if($peserta->song2 == null)
                            <b>Lagu 2 :</b>
                            <span style="color:brown">tidak memasukkan lagu</span>
                            @else
                            <b>Lagu 2 :</b>
                            {{$peserta->song2}}
                            @endif

                            </td>
                            <td>
                                @if(Auth::user()->email=="juri1@gmail.com")
                                <input type="number" name="nilai4[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai4}}">
                                <input type="hidden" name="nilai5[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai5}}">
                                <input type="hidden" name="nilai6[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai6}}">
                                @endif
                                @if(Auth::user()->email=="juri2@gmail.com")
                                <input type="hidden" name="nilai4[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai4}}">
                                <input type="number" name="nilai5[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai5}}">
                                <input type="hidden" name="nilai6[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai6}}">
                                @endif
                                @if(Auth::user()->email=="juri3@gmail.com")
                                <input type="hidden" name="nilai4[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai4}}">
                                <input type="hidden" name="nilai5[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai5}}">
                                <input type="number" name="nilai6[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai6}}">
                                @endif
                            </td>
                    </tr>
                    {{-- @endif --}}
                    @endforeach

                    
                   
                </tbody>
                
            </table>
            <div class="w-block" align="right">
                    <a class="btn btn-primary" href="/juri/lomba/{{$lomba->id}}">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                        
                </div>
            </form>
            </div>
            
    </div>

    <br>

</div>

<br>

@endsection

