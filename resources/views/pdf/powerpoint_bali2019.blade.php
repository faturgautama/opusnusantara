<html>

<head> <meta content="text/html; charset=UTF-8" http-equiv="content-type"> <link href="//db.onlinewebfonts.com/c/3c1a440c0da3e6484b92282953ca3555?family=Aharoni" rel="stylesheet" type="text/css"/> <style type="text/css"> ol{margin: 0; padding: 0}table td, table th{padding: 0}@import url(http://db.onlinewebfonts.com/c/3c1a440c0da3e6484b92282953ca3555?family=Aharoni); @font-face{font-family: "Aharoni"; src: url('/assets/fonts/aharoni.ttf');}.c1{border-right-style: solid; padding: 5pt 5pt 5pt 5pt; border-bottom-color: #000000; border-top-width: 0pt; border-right-width: 0pt; border-left-color: #000000; vertical-align: top; border-right-color: #000000; border-left-width: 0pt; border-top-style: solid; border-left-style: solid; border-bottom-width: 0pt; width: 182.2pt; border-top-color: #000000; border-bottom-style: solid}.c7{border-right-style: solid; padding: 5pt 5pt 5pt 5pt; border-bottom-color: #000000; border-top-width: 0pt; border-right-width: 0pt; border-left-color: #000000; vertical-align: top; border-right-color: #000000; border-left-width: 0pt; border-top-style: solid; border-left-style: solid; border-bottom-width: 0pt; width: 627.8pt; border-top-color: #000000; border-bottom-style: solid}.c3{color: #000000; font-weight: 400; text-decoration: none; vertical-align: baseline; font-size: 8pt; font-family: "Arial"; font-style: normal}.c11{color: #000000; font-weight: 700; text-decoration: none; vertical-align: baseline; font-size: 30pt; font-family: "Aharoni"; font-style: normal}.c6{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.15; orphans: 2; widows: 2; text-align: left; height: 11pt}.c2{color: #000000; font-weight: 700; text-decoration: none; vertical-align: baseline; font-size: 41pt; font-family: "Aharoni"; font-style: normal}.c13{color: #000000; font-weight: 400; text-decoration: none; vertical-align: baseline; font-size: 25pt; font-family: "Arial"; font-style: normal}.c4{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.0; text-align: left; height: 11pt}.c0{border-spacing: 0; border-collapse: collapse; margin-right: auto}.c8{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.0; text-align: left}.c14{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.0; text-align: center}.c5{background-color: #ffffff; max-width: 813.5pt; padding: 124.7pt 14.2pt 0pt 14.2pt}.c10{height: 66pt}.c9{height: 18pt}.c12{height: 40pt}.c15{height: 51pt}.title{padding-top: 0pt; color: #000000; font-size: 26pt; padding-bottom: 3pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}.subtitle{padding-top: 0pt; color: #666666; font-size: 15pt; padding-bottom: 16pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}li{color: #000000; font-size: 11pt; font-family: "Arial"}p{margin: 0; color: #000000; font-size: 11pt; font-family: "Arial"}h1{padding-top: 20pt; color: #000000; font-size: 20pt; padding-bottom: 6pt; font-family: "Aharoni"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h2{padding-top: 18pt; color: #000000; font-size: 16pt; padding-bottom: 6pt; font-family: "Aharoni"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h3{padding-top: 16pt; color: #000000; font-size: 14pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.6; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h4{padding-top: 14pt; color: #666666; font-size: 12pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h5{padding-top: 12pt; color: #666666; font-size: 11pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h6{padding-top: 12pt; color: #666666; font-size: 11pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; font-style: italic; orphans: 2; widows: 2; text-align: left} .page-break {page-break-after: always;}</style>
<title>PPT {{ucwords(strtolower($kategori->name))}}</title></head>
<?php
$i = 0;
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->join('lombakus', 'lombakus.id', 'lombaku_pesertas.lombaku_id')
    ->where('status', 200)
    ->select('lombaku_pesertas.*', 'lombakus.status as status')
    ->orderBy('no_undian', 'asc')
    ->get();
$jumlah_peserta = sizeof($pesertas);
$lombanama = $kategori->name;
//  dd($kategori);
$i = 0;
?>	 
<body>
    @foreach($pesertas as $peserta)
    <section class="c5">
        <p class="c6"><span class="c3"></span></p>
        <a id="t.2d775f06a08881753827c3dd113b611304b28e6b"></a>
        <a id="t.0"></a>
        <table class="c0">
            <tbody>
                <tr class="c10">
                    <td class="c7" colspan="1" rowspan="1">
                        <p class="c8"><span class="c2">{{ucwords(strtolower($peserta->nama))}}</span></p>
                    </td>
                    <td class="c1" colspan="1" rowspan="5">
                        <p class="c14"><span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 229.00px; height: 305.33px;"><img alt="" src="/uploads/{{$peserta->foto}}" style="max-width: 229.00px; max-height: 305.33px; margin-left: 0.00px; margin-top: 0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title=""></span></p>
                    </td>
                </tr>
                <tr class="c15">
                    <td class="c7" colspan="1" rowspan="1">
                        <p class="c8"><span class="c11">Category {{strtoupper($lombanama)}}</span></p>
                    </td>
                </tr>
                <tr class="c9">
                    <td class="c7" colspan="1" rowspan="2">
                        <p class="c4"><span class="c3"></span></p>
                    </td>
                </tr>
                <tr class="c12"></tr>
                <tr class="c9">
                    <?php
                    $i += 1;
                    $song = [];
                    // dd($tipe_lomba);
                    if ($tipe_lomba == 'semi_final') {
                        if ($kategori->song_type == 'bebas') {
                            // $song = $pesertas[$i]->song1;
                            for ($x = 1; $x < 11; $x++) {
                                $s = "song" . $x;
                                if ($peserta->$s !== null) {
                                    $song[$x] = $peserta->$s;
                                }
                            }
                        } else {
                            $ss = "song" . $peserta->song1;
                            $song[1] = $kategori->$ss;
                            // $dat = \App\LombaKategori::where(song[]);
                            // $song[1] =  $pesertas:
                        }
                        //dd(count($song));
                        $no = 1;
                    }
                    if ($tipe_lomba == 'final') {
                        // dd($peserta);
                        if ($kategori->song_type_final == 'bebas') {
                            // $song = $pesertas[$i]->song1;
                            for ($x = 1; $x < 11; $x++) {
                                $s = "song" . $x . "_final";
                                if ($peserta->$s !== null) {
                                    $song[$x] = $peserta->$s;
                                }
                            }
                        } else {
                            $ss = "song" . $peserta->song1 . "_final";
                            $song[1] = $kategori->$ss;
                            // $dat = \App\LombaKategori::where(song[]);
                            // $song[1] =  $pesertas:
                        }
                        // dd(count($song));
                        $no = 1;
                    }
                    ?>
                    <td class="c7" colspan="1" rowspan="1">
                        <p class="c8"><span class="c13">
                        @foreach($song as $music)
                            {{ucwords(strtolower($music))}}@if($no < count($song)), @endif
                        @php $no++ @endphp
                        @endforeach
                        </span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="c6"><span class="c3"></span></p>
        <p class="c6"><span class="c3"></span></p>
    </section>
    @if($i < count($pesertas))
    <div class="page-break"></div>	
    @endif
    @endforeach
</body>

</html>