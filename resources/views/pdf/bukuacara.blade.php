<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<h1 align="center">Buku Acara</h1>
<h2 align="center">{{$lomba->name}}</h2>
<br />
<?php
// dd($tipe_penilaian);
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
?>

<h3>{{$kategori->name}} ({{$jumlah_peserta}} peserta)</h3>
<table>

  <tr>
    <th>No Urut</th>
    <th>Nama</th>
    <th>TTL</th>
    <th>Sekolah</th>
    <th>Kelas</th>
    @if($lomba->tipe_lomba == "semifinal" || $lomba->tipe_lomba == "final")
        <td><strong>Lagu Semifinal 1</strong></td>
        <td><strong>Lagu Semifinal 1</strong></td>
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
    <td>{{$peserta->nama}}</td>
    <td>{{$peserta->tanggal_lahir}}</td>
    <td>{{$peserta->sekolah_nama}}</td>
    <td>{{$peserta->sekolah_tingkat}}</td>
    
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
 
</table>
<br />