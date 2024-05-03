<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<?php
if($order_by=='ratarata'){
  $order_by='CAST(ratarata as DECIMAL(5,2)) DESC';
} else {
  $order_by ='CAST(no_undian as UNSIGNED) ASC';
}
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->orderByRaw($order_by)
    ->get();
// song_type_final
if ($kategori->song_type_final) {
    $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
        ->where('juara', 1)
        ->orderByRaw($order_by)
        ->get();
}
$jumlah_peserta = sizeof($pesertas);
?>
@if($bahasa == 'indonesia')
<h1 align="center">Hasil Kompetisi</h1>
@endif
@if($bahasa == 'inggris')
<h1 align="center">Compotetion Results</h1>
@endif
<h2 align="center">{{$kategori->name}}</h2>
<br />


<h3>{{$kategori->name}} ({{$jumlah_peserta}} peserta)</h3>
<table>
  @if($bahasa == 'indonesia')
  <tr>
    <th>No Urut</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Sekolah</th>
    <th>Juara</th>
  </tr>
  @endif
  @if($bahasa == 'inggris')
  <tr>
    <th>Lottery Number </th>
    <th>Full Name</th>
    <th>Category</th>
    <th>School</th>
    <th>Champion</th>
  </tr>
  @endif

  @foreach($pesertas as $peserta)
  <tr>
    <td width="80px">{{$peserta->no_undian}}</td>
    <td width="200px">{{$peserta->nama}}</td>
    <?php $kategori = \App\LombaKategori::find($peserta->kategori_id); ?>
    <td width="150px">
    @if($bahasa == 'indonesia')
      Kategori {{$kategori->name}}
    @endif
    @if($bahasa == 'inggris')
      Category {{$kategori->name}}
    @endif
    </td>
    <td width="150px">{{$peserta->sekolah_nama}}</td>
    <td width="120px">
      <?php $lomba = \App\Lomba::find($kategori->lomba_id); ?>
        @if($bahasa == 'indonesia')
          @if($lomba->tipe_lomba=='semifinal')
            @if($peserta->juara_final == 1) Juara I @endif
            @if($peserta->juara_final == 2) Juara II @endif
            @if($peserta->juara_final == 3) Juara III @endif
            @if($peserta->juara_final == 4) Harapan I @endif
            @if($peserta->juara_final == 5) Harapan II @endif
            @if($peserta->juara_final == 6) Harapan III @endif
          @endif
          @if($lomba->tipe_lomba=='final' || $lomba->tipe_lomba=='')
            @if($peserta->juara == 1) Juara I @endif
            @if($peserta->juara == 2) Juara II @endif
            @if($peserta->juara == 3) Juara III @endif
            @if($peserta->juara == 4) Harapan I @endif
            @if($peserta->juara == 5) Harapan II @endif
            @if($peserta->juara == 6) Harapan III @endif
          @endif
        @endif
        @if($bahasa== 'inggris')
          @if($lomba->tipe_lomba=='final' || $lomba->tipe_lomba=='')
            @if($peserta->juara == 1) First Winner @endif
            @if($peserta->juara == 2) Second Winner @endif
            @if($peserta->juara == 3) Third Winner @endif
            @if($peserta->juara == 4) Encouragement Award 1 @endif
            @if($peserta->juara == 5) Encouragement Award 2 @endif
            @if($peserta->juara == 6) Encouragement Award 3 @endif
          @endif
          @if($lomba->tipe_lomba=='semifinal')
            @if($peserta->juara_final == 1) First Winner @endif
            @if($peserta->juara_final == 2) Second Winner @endif
            @if($peserta->juara_final == 3) Third Winner @endif
            @if($peserta->juara_final == 4) Encouragement Award 1 @endif
            @if($peserta->juara_final == 5) Encouragement Award 2 @endif
            @if($peserta->juara_final == 6) Encouragement Award 3 @endif
          @endif
        @endif
    </td>
  </tr>
  @endforeach

</table>
<br />
