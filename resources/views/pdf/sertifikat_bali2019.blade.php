<html>
<head> <meta content="text/html; charset=UTF-8" http-equiv="content-type"> <style type="text/css"> @import url('https://themes.googleusercontent.com/fonts/css?kit=fpjTOVmNbO4Lz34iLyptLdg_0OBQpvzTOylVLiJfHYB09yszp7OhJoOvEOC18Phx'); ol{margin: 0; padding: 0}table td, table th{padding: 0}.c12{-webkit-text-decoration-skip: none; color: #000000; font-weight: 700; text-decoration: underline; vertical-align: baseline; text-decoration-skip-ink: none; font-size: 26pt; font-family: "Cambria Math"; font-style: normal}.c9{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.5; orphans: 2; widows: 2; text-align: left; height: 11pt}.c1{color: #000000; font-weight: 400; text-decoration: none; vertical-align: baseline; font-size: 9pt; font-family: "Arial"; font-style: normal}.c7{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.5; orphans: 2; widows: 2; text-align: center; height: 11pt}.c3{color: #000000; font-weight: 400; text-decoration: none; vertical-align: baseline; font-size: 11pt; font-family: "Arial"; font-style: normal}.c0{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.15; orphans: 2; widows: 2; text-align: left; height: 11pt}.c6{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.15; orphans: 2; widows: 2; text-align: center; height: 11pt}.c11{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.25; orphans: 2; widows: 2; text-align: center}.c10{padding-top: 0pt; padding-bottom: 0pt; line-height: 1.15; orphans: 2; widows: 2; text-align: center}.c4{color: #000000; text-decoration: none; vertical-align: baseline; font-style: normal}.c5{font-weight: 700; font-size: 26pt; font-family: "Calibri"}.c13{font-weight: 700; font-size: 18pt; font-family: "Calibri"}.c2{font-size: 20pt; font-family: "Calibri"; font-weight: 400}.c8{background-color: #ffffff; max-width: 841.9pt; padding: 0pt 0pt 0pt 0pt}.title{padding-top: 0pt; color: #000000; font-size: 26pt; padding-bottom: 3pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}.subtitle{padding-top: 0pt; color: #666666; font-size: 15pt; padding-bottom: 16pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}li{color: #000000; font-size: 11pt; font-family: "Arial"}p{margin: 0; color: #000000; font-size: 11pt; font-family: "Arial"}h1{padding-top: 20pt; color: #000000; font-size: 20pt; padding-bottom: 6pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h2{padding-top: 18pt; color: #000000; font-size: 16pt; padding-bottom: 6pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h3{padding-top: 16pt; color: #000000; font-size: 14pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.6; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h4{padding-top: 14pt; color: #666666; font-size: 12pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h5{padding-top: 12pt; color: #666666; font-size: 11pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; orphans: 2; widows: 2; text-align: left}h6{padding-top: 12pt; color: #666666; font-size: 11pt; padding-bottom: 4pt; font-family: "Arial"; line-height: 1.15; page-break-after: avoid; font-style: italic; orphans: 2; widows: 2; text-align: left}.page-break{page-break-after: always;}</style> <title>Sertifikat{{ucwords(strtolower($kategori->name))}}</title></head>
<body class="c8">
    <?php
    $pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
        ->where('juara', 1)
        ->join('lombakus', 'lombakus.id', 'lombaku_pesertas.lombaku_id')
        ->where('status', 200)
        ->select('lombaku_pesertas.*', 'lombakus.status as status')
        ->orderBy('juara_final', 'asc')
        ->get();
    $jumlah_peserta = sizeof($pesertas);
    $i = 0;
    ?>
    @foreach($pesertas as $peserta)
    <p style="margin-top:5.5em" class="c0"><span class="c3"></span></p>
    <p class="c0"><span class="c3"></span></p>
    <p class="c0"><span class="c3"></span></p>
    <p class="c0"><span class="c3"></span></p>
    <p class="c0"><span class="c3"></span></p>
    <p class="c0"><span class="c1"></span></p>
    <p class="c0"><span class="c1"></span></p>
    <p class="c6"><span class="c3"></span></p>
    <p class="c6"><span class="c3"></span></p>
    <p class="c6"><span class="c3"></span></p>
    <p class="c6"><span class="c3"></span></p>
    <p class="c9"><span class="c3"></span></p>
    <p class="c7"><span class="c3"></span></p>
    <p class="c11"><span class="c12" >{{strtoupper($peserta->nama)}}</span></p>
    <?php
    $i = +1;
    $lomba = \App\Lomba::find($kategori->lomba_id);
    $kategori = \App\LombaKategori::find($peserta->kategori_id);
    ?>
    <p class="c11"><span class="c4 c5">
        @if($lomba->tipe_lomba=='final')
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
    </span></p>
    <p class="c6"><span class="c4 c13"></span></p>
    <br>
    <p class="c10"><span class="c2">Category : {{strtoupper($kategori->name)}}</span></p>
    <p class="c6"><span class="c3"></span></p>
    
    @if($i < count($pesertas))
    <div class="page-break"></div>	
    @endif
    @endforeach
</body>

</html>