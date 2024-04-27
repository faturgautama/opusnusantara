<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<?php
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->orderBy('juara', 'asc')
    ->get();
$jumlah_peserta = sizeof($pesertas);
?>

<table>
  <tr>
    <td colspan="5" style="text-align:center">Hasil Kompetisi</td>
  </tr>
  <tr>
      <td colspan="5" style="text-align:center">{{$kategori->name}}></td>
  </tr>
  <tr>
      <td  colspan="5" style="text-align:center">{{$kategori->name}} ({{$jumlah_peserta}} peserta)></td>
  </tr>
  <tr>
    <th>No Urut</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Sekolah</th>
    <th>Juara</th>
  </tr>

  @foreach($pesertas as $peserta)
  <tr>
    <td width="80px">{{$peserta->no_undian}}</td>
    <td width="200px">{{$peserta->nama}}</td>
    <?php $kategori = \App\LombaKategori::find($peserta->kategori_id); ?>
    <td width="150px">Kategori {{$kategori->name}} Kelas {{$kategori->min}} - {{$kategori->max}}</td>
    <td width="150px">{{$peserta->sekolah_nama}}</td>
    <td width="120px">
      @if($peserta->juara == 1) Juara I @endif
      @if($peserta->juara == 2) Juara II @endif
      @if($peserta->juara == 3) Juara III @endif
      @if($peserta->juara == 4) Harapan I @endif
      @if($peserta->juara == 5) Harapan II @endif
      @if($peserta->juara == 6) Harapan III @endif
    </td>
  </tr>
  @endforeach

</table>
<br />
