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

// dd($pesertas);
?>
    @for($i=0;$i<(count($pesertas));$i++)
   
  <body>

    <table width="100%">
      <tr>
        <td>
          @if($a % 2 == 1 )
          <table class="table width="100%">
            <thead>
            <tr>
              <th><img src="{{ base_path() }}/public/image/logo.png" height="35px"></th>
            </tr>
            </thead>
            <thead>
            <tr>
              <th class="text-center"><h4>{{$lomba->name}}</h4></th>
            </tr>
            </thead>
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
                <table class="table" width="100%">
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
                  <tr>
                      <td colspan="2">
                          <br><br><br><br><br><br><br>
                      </td>
                  </tr>
                </table>
              </td>
            </tr>
            
          </table>
        
        @endif
        </td>
        <?php
        $a = $a + 1;
        if ($i + 1 == count($pesertas)) {
            $i = $i - 1;
        }
        ?>
        <td>
        @if($a % 2 == 0 )
          <table table class="table width="100%">
            <thead>
            <tr> 
              <th><img src="{{ base_path() }}/public/image/logo.png" height="35px"></th>
            </tr>
            </thead>
            <thead>
            <tr>
              <th class="text-center"><h4>{{$lomba->name}}</h4></th>
            </tr>
            </thead>
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
                <table class="table" width="100%">
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
                  <tr>
                      <td colspan="2">
                          <br><br><br><br><br><br><br>
                      </td>
                  </tr>
                </table>
              </td>
            </tr>
            
          </table>
          @elseif(i+1 == count($pesertas))
          @endif

        </td>
        <?php
        $a = $a + 1;
        $i = $i + 1;
        ?>
      </tr>
    </table>


  </body>
    
    @endfor

</html>
