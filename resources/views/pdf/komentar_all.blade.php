<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .page-break {page-break-after: always;}
    </style>
  </head>
  <body>
    @foreach($kat as $kategori)
  <?php
  if ($tipe_penilaian == "final") {
      $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
          ->where('juara', 1)
          ->orderBy('no_undian', 'asc')
          ->get();
  } else {
      $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
          ->orderBy('no_undian', 'asc')
          ->get();
  }

  $jumlah_peserta = sizeof($pesertas);
  $a = 1;
  ?>
    @for($i=0;$i<(count($pesertas)-1);$i++)
    <table style="border-top:1px" width="100%">
      <tr>
        <td>
          
          <table border="0px" width="100%">
            <tr>
              <td><img src="{{ base_path() }}/public/image/logo.png" height="35px"></td>
            </tr>

            <tr>
              <td class="text-center"><h3>{{$lomba->name}}</h3></td>
            </tr>
            <tr>
              <td class="text-center"><i>
                @if($keterangan != null)
                {{$keterangan}} 
                @else
                &nbsp;
                @endif
            </i></td>
            </tr>
            <tr>
              <td>
                <table table border="1px" width="100%">
                  <tr>
                    <td>{{$kategori->name}}</td>
                    <td>{{$pesertas[$i]->nama}}</td>
                  </tr>
                  <tr>
                    <td>{{$pesertas[$i]->no_undian}}</td>
                    <td>
                      <?php if ($tipe_penilaian == "final") {
                          if ($kategori->song_type_final == 'bebas') {
                              $song = $pesertas[$i]->song1_final;
                          } else {
                              $song =
                                  $kategori[
                                      'song' . $pesertas[$i]->song1 . '_final'
                                  ];
                          }
                      } else {
                          if ($kategori->song_type == 'bebas') {
                              $song = $pesertas[$i]->song1;
                          } else {
                              $song = $kategori['song' . $pesertas[$i]->song1];
                          }
                      } ?>

                    {{$song}}
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <br><br><br><br><br><br><br>
              </td>
            </tr>
          </table>
        
          <?php $a++; ?>
        </td>
        <td>
          @if($a % 2 == 0 )
          <table border="0px" width="100%">
            <tr>
              <td><img src="{{ base_path() }}/public/image/logo.png" height="35px"></td>
            </tr>

            <tr>
              <td class="text-center"><h3>{{$lomba->name}}</h3></td>
            </tr>
            <tr>
              <td class="text-center"><i>
                @if($keterangan != null)
                {{$keterangan}} 
                @else
                &nbsp;
                @endif</i></td>
            </tr>
            <tr>
              <td>
                <table table border="1px" width="100%">
                  <tr>
                    <td>{{$kategori->name}}</td>
                    <td>{{$pesertas[$i+1]->nama}}</td>
                  </tr>
                  <tr>
                    <td>{{$pesertas[$i+1]->no_undian}}</td>
                    <td>
                      <?php if ($tipe_penilaian == "final") {
                          if ($kategori->song_type_final == 'bebas') {
                              $song = $pesertas[$i + 1]->song1_final;
                          } else {
                              $song =
                                  $kategori[
                                      'song' .
                                          $pesertas[$i + 1]->song1 .
                                          '_final'
                                  ];
                          }
                      } else {
                          if ($kategori->song_type == 'bebas') {
                              $song = $pesertas[$i + 1]->song1;
                          } else {
                              $song =
                                  $kategori['song' . $pesertas[$i + 1]->song1];
                          }
                      } ?>

                    {{$song}}
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <br><br><br><br><br><br><br>
              </td>
            </tr>
          </table>
          @else
          <table border="0px" width="100%">
            <tr>
              <td><img src="{{ base_path() }}/public/image/logo.png" height="35px"></td>
            </tr>

            <tr>
              <td class="text-center"><h3> &nbsp; </h3></td>
            </tr>
            <tr>
              <td class="text-center"><i>&nbsp;</i></td>
            </tr>
            <tr>
              <td>
                <table table border="1px" width="100%">
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                      &nbsp;
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <br><br><br><br><br><br><br>
              </td>
            </tr>
          </table>
          @endif
        </td>
      </tr>
    </table>

    @if($a % 2 == 0)
    <div style="page-break-after:always;"></div>
    @endif
    @endfor

@endforeach
  </body>
</html>
