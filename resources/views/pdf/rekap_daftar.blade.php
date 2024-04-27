<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<h1 align="center">Rekap Pendaftaran</h1>
<h2 align="center">{{$lomba->name}}</h2>
<br />

<?php
$lombaku = DB::table('lombakus')
    ->join('users', 'users.id', '=', 'lombakus.user_id')
    ->join('lombaku_pesertas', 'lombaku_pesertas.lombaku_id', '=', 'lombakus.id')
    ->where('lomba_id', $lomba->id)
    ->where('lombaku_pesertas.kategori_id', $kategori->id)
    ->groupBy('user_id')
    ->orderBy('name', 'asc')
    ->get();
// dd($lomba);
$i = 1;
?>

<h3>{{$kategori->name}}</h3>
<table>

    <tr>
        <th >No</th>
        <th >Guru Pembimbing/Sekolah Musik</th>
        <th >Alamat</th>
        <th >No HP</th>
        <th >Email</th>
        <!-- <th >Peserta</th> -->
        <th >Daftar</th>
        <th >Nominal</th>
    </tr>
    @foreach($lombaku as $x)

    <tr>
        <td width="25px">{{$i}}</td>
        <td width="165px">{{$x->name}}</td>
        <td width="25px"></td>
        <td width="75px">{{$x->nohp}}</td>
        <td width="115px">{{$x->email}}</td>
        <?php $pesertaX = DB::table('lombaku_pesertas')
            ->join(
                'lombakus',
                'lombakus.id',
                '=',
                'lombaku_pesertas.lombaku_id'
            )
            ->where('lombakus.lomba_id', $lomba->id)
            ->select('lombaku_pesertas.*', 'lombakus.user_id')
            ->where('user_id', $x->user_id)
            ->distinct()
            ->get();
// dd($pesertaX);
?>
        <!-- <td width="25px"> -->
            <?php
// for($s=0;$s<count($pesertaX);$s++){
//     echo $pesertaX[$s]->nama .",";
// }
?>
                
        <!-- </td> -->
        <td width="25px">
            {{count($pesertaX)}}
        </td>
        <?php $total_biaya = \App\Lombaku::where('user_id', $x->user_id)
            ->join('lombaku_pesertas', 'lombaku_pesertas.lombaku_id', '=', 'lombakus.id')
            ->where('lomba_id', $lomba->id)
            ->where('lombaku_pesertas.kategori_id', $kategori->id)
            ->sum('total_biaya');
            ?>
        <td width="100px" align="right">{{number_format($total_biaya,0)}}</td>
    </tr>

    <?php $i++; ?>
    @endforeach
    <tr>
        <td width="25px"></td>
        <td width="165px"></td>
        <td width="25px"></td>
        <td width="25px"></td>
        <td width="75px"></td>
        <td width="115px"></td>
        <?php
// $pesertaX = DB::table('lombaku_pesertas')
//     ->join('lombakus', 'lombakus.id', '=', 'lombaku_pesertas.lombaku_id')
//     ->select('lombaku_pesertas.*', 'lombakus.user_id')
//     ->where('user_id', $x->user->id)
//     ->distinct()
//     ->get();
?>
        <td width="25px"></td>
        <td width="25px"></td>
        <?php $total_biaya_sum = \App\Lombaku::where(
            'lomba_id',
            $lomba->id
        )
        ->join('lombaku_pesertas', 'lombaku_pesertas.lombaku_id', '=', 'lombakus.id')
        ->where('lombaku_pesertas.kategori_id', $kategori->id)
        ->sum('total_biaya'); ?>
        <td width="100px" align="right"><strong>{{number_format($total_biaya_sum,0)}}</strong></td>
    </tr>

 
</table>
<br />
