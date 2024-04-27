<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
.page-break {
    page-break-after: always;
}
</style>

<?php $i = 0; ?>
@foreach($kat as $kategori)
<img src="{{ base_path() }}/public/image/logo.png" height="35px" align="left">
<br />
@if($i==0)
<h1 align="center">Buku Acara</h1>
<h2 align="center">{{$lomba->name}}</h2>

@endif
<br />
<?php
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->orderByRaw('CAST(no_undian AS UNSIGNED) ASC')
    ->get();
if ($tipe_penilaian == 'final') {
    $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
        ->where('juara', 1)
        ->orderByRaw('CAST(no_undian AS UNSIGNED) ASC')
        ->get();
}
$jumlah_peserta = sizeof($pesertas);
$i++;
?>

<h3>{{$kategori->name}} ({{$jumlah_peserta}} peserta)</h3>
<table class="table table-bordered">
<tbody>
  <tr>
    <th style="width: 50px;">No</th>
    <th style="width: 200px;">Nama</th>
    <th style="width: 100px;">TTL</th>
    <th style="width: 200px;">Sekolah</th>
    <th style="width: 50px;">Kelas</th>
    @if($lomba->tipe_lomba == "semifinal" || $lomba->tipe_lomba == "final")
        <td><strong>Lagu Semifinal 1</strong></td>
        <td><strong>Lagu Semifinal 2</strong></td>
        <td><strong>Lagu Final 1</strong></td>
        <td><strong>Lagu Final 2</strong></td>
    @else

        <td><strong>Lagu</strong></td>
        
    @endif
  </tr>
  
  @foreach($pesertas as $peserta)

  <?php
  $lombaku = $peserta->lombaku;
  if ($lombaku->status == '200') {
      $status = "Lunas";
  } elseif ($lombaku->bank_bayar == null) {
      $status = "Belum Konfirmasi";
  } elseif ($lombaku->bank_bayar && $lombaku->status != '200') {
      $status = "Menunggu Konfirmasi Admin";
  }
  ?>
  <tr>
    <td>{{$peserta->no_undian}}</td>
    <td style="width: 165px">{{$peserta->nama}}</td>
    <td style="width: 50px">{{$peserta->tanggal_lahir}}</td>
    <td style="width: 165px">{{$peserta->sekolah_nama}}</td>
    <td style="width: 50px">{{$peserta->sekolah_tingkat}}</td>
    
      <?php
      //$kategori = \App\LombaKategori::find($peserta->kategori_id);
      $lomba = \App\Lomba::find($kategori->lomba_id);
      if($lomba->tipe_lomba == "semifinal" || $lomba->tipe_lomba == "final") {
          if ($kategori->song_type == 'bebas') {
              $song_semi_1 = $peserta->song1;
              $song_semi_2 = $peserta->song2;
              $song_final_1 = $peserta->song1_final;
              $song_final_2 = $peserta->song2_final;
          } else {
              $song_semi_1 = $kategori['song' . $peserta->song1];
              $song_semi_2 = "";
              $song_final_1 = $peserta->song1_final;
              $song_final_2 = $peserta->song2_final;
          }
      } else {
          if ($kategori->song_type == 'bebas') {
              $song = $peserta->song1;
          } else {
              $song = $kategori['song' . $peserta->song1];
          }
      }

// dd($song);
?>

        @if($lomba->tipe_lomba == "semifinal" || $lomba->tipe_lomba == "final")
            <td>{{$song_semi_1}}</td>
            <td>{{$song_semi_2}}</td>
            <td>{{$song_final_1}}</td>
            <td>{{$song_final_2}}</td>
        @else
            <td>{{$song}}</td>
        @endif
  </tr>
  @endforeach
  </tbody> 
</table>
<br />
<div class="page-break"></div>
@endforeach