@extends('layouts.organizer')

@section('css')


@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Nilai Peserta</h3>
            <h3 class="h-block">{{$kategori->name}}</h3>
        </div>
    </div>
</div>
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <select name="ordering" id="ordering" class="btn btn-outline-primary">
                    <option value="undian" @if($order_by  == 'undian') selected @endif>Nomor</option>
                    <option value="rata2" @if($order_by  == 'rata2') selected @endif>Rata-rata</option>
                </select>
            </div>
            <div class="card-body">
            <form class="" action="/organizer/lomba/{{$lomba->id}}/download/penilaian_simpan" method="post">
              {{csrf_field()}}
              <table class="table">
                <?php
                $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)->orderByRaw('CAST(ratarata AS UNSIGNED) DESC')->get();
                // echo $pesertas;
                $isSong2 = false;

                if($pesertas[0]->song2 != null || $pesertas[1]->song2 != null || $pesertas[2]->song2 != null){
                    $isSong2 = true;
                }
                
                if($order_by == 'undian'){
                    // $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)->orderByRaw('CAST(no_undian AS UNSIGNED) ASC')->get();
                    $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)->orderByRaw('id ASC')->get();
                }
                  $i=0;
                  $nilai_count = 0;

                  
              ?>
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Juri 1 - S1</th>
                        @if($isSong2)
                        <th>Juri 1 - S2</th>
                        @endif
                        <th>Juri 2 - S1</th>
                        @if($isSong2)
                        <th>Juri 2 - S2</th>
                        @endif
                        <th>Juri 3 - S1</th>
                        @if($isSong2)
                        <th>Juri 3 - S2</th>
                        @endif
                        <th>Rata2</th>
                        <th>Juara</th>
                      </tr>
                  </thead>
                  <tbody>

                      @foreach($pesertas as $peserta)
                      
                      <tr>
                        <th scope="row"  name="undian[]">{{$peserta->no_undian}}</th>
                        <td>
                            <input max="100" class="form-control" name="nilai1[]" type="number" value="{{$peserta->nilai1}}">
                            <input class="form-control" name="id[]" type="hidden" value="{{$peserta->id}} ">
                            <input class="form-control" name="kategori_id" type="hidden" value="{{$kategori->id}} ">
                            <input class="form-control" name="tipe_penilaian" type="hidden" value="{{$tipe_penilaian}} ">

                        </td>
                         @if($isSong2)
                         <td>
                            <input max="100" class="form-control" name="nilai4[]" type="number" value="{{$peserta->nilai4}}">
                        </td>
                        @endif
                        <td>
                            <input max="100" class="form-control" name="nilai2[]" type="number" value="{{$peserta->nilai2}}">
                        </td>
                        @if($isSong2)
                        <td>
                            <input max="100" class="form-control" name="nilai5[]" type="number" value="{{$peserta->nilai5}}">
                        </td>
                        @endif
                        <td>
                            <input max="100" class="form-control" name="nilai3[]" type="number" value="{{$peserta->nilai3}}">
                        </td>
                        @if($isSong2)
                        <td>
                            <input max="100" class="form-control" name="nilai6[]" type="number" value="{{$peserta->nilai6}}">
                        </td>
                        @endif
                        <td>
                            {{number_format($peserta->ratarata,2)}}
                        </td>
                          <td>
                              <select name="juara[]" id="juara{{$peserta->id}}" class="form-control" id="exampleFormControlSelect1">
                                  <option value="">Pilih Juara</option>
                                  <option value="1">Juara 1</option>
                                  <option value="2">Juara 2</option>
                                  <option value="3">Juara 3</option>
                                  <option value="4">Juara Harapan 1</option>
                                  <option value="5">Juara Harapan 2</option>
                                  <option value="6">Juara Harapan 3</option>
                              </select>
                          </td>

                      </tr>
                      @endforeach

                  </tbody>

              </table>
              <div align="right">
                  <a href="/organizer/lomba/{{$lomba->id}}/download/penilaian" class="btn btn-primary waves-effect waves-light">Back</a>
                  <button type="submit" class="btn btn-success waves-effect waves-light" name="button"> Simpan</button>
              </div>
              </div>
            </form>


    </div>
    <br>

</div>

<br>

@endsection


@section('js')
<script type="text/javascript">
  @foreach($pesertas as $peserta)
    console.log('tes');
    $('#juara{{$peserta->id}}').val("{{$peserta->juara}}");
  @endforeach
  $('#ordering').change(()=>{
      location.href='{{Request::url()}}?kategori_id={{$kategori_id}}&tipe_penilaian={{$tipe_penilaian}}&order_by='+$('#ordering').val()
  })
</script>


@endsection
