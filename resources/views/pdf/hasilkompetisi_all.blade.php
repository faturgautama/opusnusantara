<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>

@foreach($kategoris as $kategori)
<div style="page-break-before:always;">


  <?php
  $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
      ->orderBy('juara', 'asc')
      ->get();
  // song_type_final
  if ($kategori->song_type_final) {
      $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
          ->where('juara', 1)
          ->orderBy('juara_final', 'asc')
          ->get();
  }
  $jumlah_peserta = sizeof($pesertas);
  $no=1;
  ?>
  <h1 align="center">Hasil Kompetisi</h1>
  <h2 align="center">{{$kategori->name}}</h2>
  <br />
  <h3>{{$kategori->name}} ({{$jumlah_peserta}} peserta)</h3>
  <table>

    <tr>
      <th>No Urut</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Sekolah</th>
      <th>Juara</th>
    </tr>

    @foreach($pesertas as $peserta)
    <tr>
      <!-- <td width="80px">{{$peserta->no_undian}}</td> -->
      <td width="80px">{{$no++}}</td>
      <td width="200px">{{$peserta->nama}}</td>
      <?php $kategori = \App\LombaKategori::find($peserta->kategori_id); ?>
      <td width="150px">Kategori {{$kategori->name}} Kelas {{$kategori->min}} - {{$kategori->max}}</td>
      <td width="150px">{{$peserta->sekolah_nama}}</td>
      <td width="120px">
      <?php $lomba = \App\Lomba::find($kategori->lomba_id); ?>
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
      </td>
    </tr>
    @endforeach

  </table>
</div>
@endforeach
