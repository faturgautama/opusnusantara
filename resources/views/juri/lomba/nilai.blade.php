@extends('layouts.juri')

@section('css')


@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h3 class="h-block"><b> Penjurian
                @if(\Auth::user()->email=='juri1@gmail.com')
                Juri 1
                @endif
                @if(\Auth::user()->email=='juri2@gmail.com')
                Juri 2
                @endif
                @if(\Auth::user()->email=='juri3@gmail.com')
                Juri 3
                @endif
            </b></h3>
            <?php
                $kategori = \App\LombaKategori::find($lomba->kategori_id);
            ?>
            <h3 class="h-block">Peserta {{$kategori->name}}</h3>
        </div>
        <div class="col-4">
            @if (request()->get('act'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ request()->get('act') }}</strong>
            </div>
            @endif
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
                    $no=1;
                ?>
                    @foreach($pesertas as $peserta)

                    @if($peserta->song1 != null)
                    <tr>
                        <th  width="10%" scope="row">{{$peserta->no_undian}}</th>
                        <!-- <th  width="10%" scope="row">{{$no++}}</th> -->
                        <td width="60%">
                          <!-- <br>
                          <b>Lagu :</b> -->
                          <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} ">
                          <input class="form-control" name="kategori_id" type="hidden" value="{{$lomba->kategori_id}} ">

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
                        {{$song}}
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
                    @endif

                    @if($peserta->song2 != null)
                    <tr>
                        <th  width="10%" scope="row">{{$peserta->no_undian}}</th>
                        <!-- <th  width="10%" scope="row">{{$no++}}</th> -->
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
                    @endif

                    @if($peserta->song3 != null)
                    <tr>
                        <th  width="10%" scope="row">{{$peserta->no_undian}}</th>
                        <!-- <th  width="10%" scope="row">{{$no++}}</th> -->
                        <td>
                                {{-- <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} "> --}}
                                <input class="form-control" name="kategori_id" type="hidden" value="{{$lomba->kategori_id}} ">
                                <input class="form-control" name="tipe_penilaian" type="hidden" value="{{$lomba['tipe_penilaian']}} ">

                            <?php
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song3;
                                } else {
                                    $song = $kategori['song'.$peserta->song3];
                                }
                            ?>
                            <b>Nama :</b> {{$peserta->nama}}
                            <br>
                            @if($peserta->song3 == null)
                            <b>Lagu 3 :</b>
                            <span style="color:brown">tidak memasukkan lagu</span>
                            @else
                            <b>Lagu 3 :</b>
                            {{$peserta->song3}}
                            @endif

                            </td>
                            <td>
                                @if(Auth::user()->email=="juri1@gmail.com")
                                <input type="number" name="nilai7[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai7}}">
                                <input type="hidden" name="nilai8[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai8}}">
                                <input type="hidden" name="nilai9[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai9}}">
                                @endif
                                @if(Auth::user()->email=="juri2@gmail.com")
                                <input type="hidden" name="nilai7[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai7}}">
                                <input type="number" name="nilai8[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai8}}">
                                <input type="hidden" name="nilai9[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai9}}">
                                @endif
                                @if(Auth::user()->email=="juri3@gmail.com")
                                <input type="hidden" name="nilai7[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai7}}">
                                <input type="hidden" name="nilai8[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai8}}">
                                <input type="number" name="nilai9[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai9}}">
                                @endif
                            </td>
                    </tr>
                    @endif

                    @if($peserta->song4 != null)
                    <tr>
                        <th  width="10%" scope="row">{{$peserta->no_undian}}</th>
                        <!-- <th  width="10%" scope="row">{{$no++}}</th> -->
                        <td>
                                {{-- <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} "> --}}
                                <input class="form-control" name="kategori_id" type="hidden" value="{{$lomba->kategori_id}} ">
                                <input class="form-control" name="tipe_penilaian" type="hidden" value="{{$lomba['tipe_penilaian']}} ">

                            <?php
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song4;
                                } else {
                                    $song = $kategori['song'.$peserta->song4];
                                }
                            ?>
                            <b>Nama :</b> {{$peserta->nama}}
                            <br>
                            @if($peserta->song4 == null)
                            <b>Lagu 4 :</b>
                            <span style="color:brown">tidak memasukkan lagu</span>
                            @else
                            <b>Lagu 4 :</b>
                            {{$peserta->song4}}
                            @endif

                            </td>
                            <td>
                                @if(Auth::user()->email=="juri1@gmail.com")
                                <input type="number" name="nilai10[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai10}}">
                                <input type="hidden" name="nilai11[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai11}}">
                                <input type="hidden" name="nilai12[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai12}}">
                                @endif
                                @if(Auth::user()->email=="juri2@gmail.com")
                                <input type="hidden" name="nilai10[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai10}}">
                                <input type="number" name="nilai11[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai11}}">
                                <input type="hidden" name="nilai12[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai12}}">
                                @endif
                                @if(Auth::user()->email=="juri3@gmail.com")
                                <input type="hidden" name="nilai10[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai10}}">
                                <input type="hidden" name="nilai11[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai11}}">
                                <input type="number" name="nilai12[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai12}}">
                                @endif
                            </td>
                    </tr>
                    @endif

                    @if($peserta->song5 != null)
                    <tr>
                        <th  width="10%" scope="row">{{$peserta->no_undian}}</th>
                        <!-- <th  width="10%" scope="row">{{$no++}}</th> -->
                        <td>
                                {{-- <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} "> --}}
                                <input class="form-control" name="kategori_id" type="hidden" value="{{$lomba->kategori_id}} ">
                                <input class="form-control" name="tipe_penilaian" type="hidden" value="{{$lomba['tipe_penilaian']}} ">

                            <?php
                                if($kategori->song_type == 'bebas'){
                                    $song = $peserta->song5;
                                } else {
                                    $song = $kategori['song'.$peserta->song5];
                                }
                            ?>
                            <b>Nama :</b> {{$peserta->nama}}
                            <br>
                            @if($peserta->song5 == null)
                            <b>Lagu 5 :</b>
                            <span style="color:brown">tidak memasukkan lagu</span>
                            @else
                            <b>Lagu 5 :</b>
                            {{$peserta->song5}}
                            @endif

                            </td>
                            <td>
                                @if(Auth::user()->email=="juri1@gmail.com")
                                <input type="number" name="nilai13[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai13}}">
                                <input type="hidden" name="nilai14[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai14}}">
                                <input type="hidden" name="nilai15[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai15}}">
                                @endif
                                @if(Auth::user()->email=="juri2@gmail.com")
                                <input type="hidden" name="nilai13[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai13}}">
                                <input type="number" name="nilai14[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai14}}">
                                <input type="hidden" name="nilai15[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai15}}">
                                @endif
                                @if(Auth::user()->email=="juri3@gmail.com")
                                <input type="hidden" name="nilai13[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai13}}">
                                <input type="hidden" name="nilai14[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai14}}">
                                <input type="number" name="nilai15[]" max="100" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$peserta->nilai15}}">
                                @endif
                            </td>
                    </tr>
                    @endif
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
