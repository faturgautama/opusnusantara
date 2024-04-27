<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Guru Pembimbing</th>
        <th>Sekolah Musik</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Email</th>
        <th>Peserta</th>
        <th>Daftar</th>
        <th>Nominal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lombaku as $x)

    <tr>
        <td>{{$i}}</td>
        <td>{{$x->name}}</td>
        <td></td>
        <td></td>
        <td>{{$x->nohp}}</td>
        <td>{{$x->email}}</td>
        <?php
// $pesertaX = DB::table('lombaku_pesertas')
//     ->join('lombakus', 'lombakus.id', '=', 'lombaku_pesertas.lombaku_id')
//     ->select('lombaku_pesertas.*', 'lombakus.user_id')
//     ->where('user_id', $x->user->id)
//     ->distinct()
//     ->get();
?>
        <td></td>
        <td></td>
        <?php $total_biaya = \App\Lombaku::where('user_id', $x->user_id)
            ->where('lomba_id', $lomba->id)
            ->sum('total_biaya'); ?>
        <td>Rp {{number_format($total_biaya,2)}}</td>
    </tr>

    <?php $i++; ?>
    @endforeach
    </tbody>
</table>