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
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->orderBy('nama', 'asc')
    ->get();
$jumlah_peserta = sizeof($pesertas);
?>

<h3>{{$kategori->name}} ({{$jumlah_peserta}} peserta)</h3>
<table>

  <tr>
    <th>No Urut</th>
    <th>Nama</th>
    <th>TTL</th>
    <th>Lagu</th>
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
    <td>
        <?php if ($kategori->song_type == 'bebas') {
            $song = $peserta->song1;
        } else {
            $song = $kategori['song' . $peserta->song1];
        } ?>

        {{$song}}
    </td> 
  </tr>
  @endforeach
 
</table>
<br />