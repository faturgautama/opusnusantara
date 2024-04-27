<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<h1 align="center">Rekap Peserta</h1>
<h2 align="center">{{$lomba->name}}</h2>
<br />

<?php
$lombaku = DB::table('lombakus')
    ->join('users', 'users.id', '=', 'lombakus.user_id')
    ->where('lomba_id', $lomba->id)
    ->select('lombakus.*', 'users.name')
    ->orderBy('name', 'asc')
    ->get();
$i = 1;

// dd($lombaku);
?>

<table>

    <tr>
        <th  ><b>Nama</b></th>
        <th  ><b>Tgl lahir</b> </th>
        <th  ><b>Email</b> </th>
        <th  ><b>WA</b> </th>
        <th  ><b>Alamat rumah</b> </th>
        <th  ><b>Kategori</b> </th>
        <th  ><b>Judul lagu semifinal 1</b> </th>
        <th  ><b>Judul lagu semifinal 2</b> </th>
        <th  ><b>Judul lagu final 1</b> </th>
        <th  ><b>Judul lagu final 2</b> </th>
        <th  ><b>Foto</b> </th>
    </tr>
    @foreach($lombaku as $lomba)

    <?php
    $pesertas = \App\LombakuPeserta::where('lombaku_id', $lomba->id)
        ->groupBy('lomba_peserta_id')
        ->select('*', DB::raw('count(*) as total'))
        ->orderBy('nama', 'asc')
        ->get();
        
        
        $i = 0;
        $total = 0;
        ?>

@foreach($pesertas as $peserta)
    <?php
    $kategori = \App\LombaKategori::where('id', $peserta->kategori_id)->first();

    // check $peserta->foto ada atau tidak
    ?>
            <tr>
                <td width="165px">{{$peserta->nama}}</td>
                <td width="25px">{{$peserta->tanggal_lahir}}</td>
                <td width="25px">{{$peserta->email}}</td>
                <td width="100px">{{$peserta->nohp}}</td>
                <td width="50px">{{$peserta->alamat}}</td>
                <?php
// $pesertaX = DB::table('lombaku_pesertas')
//     ->join('lombakus', 'lombakus.id', '=', 'lombaku_pesertas.lombaku_id')
//     ->select('lombaku_pesertas.*', 'lombakus.user_id')
//     ->where('user_id', $x->user->id)
//     ->distinct()
//     ->get();
?>
                <td width="125px">{{$kategori->name}}</td>
                <td width="25px">{{$peserta->song1}}</td>
                <td width="25px">{{$peserta->song2}}</td>
                <td width="25px">{{$peserta->song1_final}}</td>
                <td width="25px">{{$peserta->song2_final}}</td>
                <td width="25px">{{ "https://opusnusantara.id/uploads/".$peserta->foto }}</td>
              
            </tr>
        @endforeach

    @endforeach


 
</table>
<br />
