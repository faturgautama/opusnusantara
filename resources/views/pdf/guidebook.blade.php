<style>
/* table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
} */
</style>
<h1 align="center">Buku Acara</h1>
<h2 align="center">{{$lomba->name}}</h2>
<br />


<h3>{{$kategori->name}}</h3>
<table>
  <?php $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
      ->orderBy('nama', 'asc')
      ->get(); ?>
  @foreach($pesertas as $peserta)
  <tr>
    <td>
        @if($peserta->foto)
            <img src="{{ base_path() }}/public/uploads/{{$peserta->foto}}" height="250px">
        @endif
    </td>
    <td></td>
    <td>
        <?php if ($kategori->song_type == 'bebas') {
            $song = $peserta->song1;
        } else {
            $song = $kategori['song' . $peserta->song1];
        } ?>
        <h2>{{$peserta->nama}}</h2>
        <h2>{{$peserta->tempat_lahir}}, {{$peserta->tanggal_lahir}}</h2>
        <br />
        <h2>{{$song}}</h2>
    </td> 
  </tr>
  @endforeach
 
</table>
<br />