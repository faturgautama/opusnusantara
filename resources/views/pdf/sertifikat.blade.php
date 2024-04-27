<style>
/* table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
} */
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;}
@font-face
	{font-family:"Californian FB";
	panose-1:2 7 4 3 6 8 11 3 2 4;}
@font-face
	{font-family:Cambria;
	panose-1:2 4 5 3 5 4 6 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Segoe UI",sans-serif;}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-link:"Balloon Text";
	font-family:"Segoe UI",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:841.9pt 595.3pt;
	margin:1.0in 112.9pt 1.0in 1.0in;}
div.WordSection1
	{page:WordSection1;}

</style>

<?php
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->orderBy('juara', 'asc')
    ->get();
$jumlah_peserta = sizeof($pesertas);
?>
@foreach($pesertas as $peserta)

  <div class=WordSection1 style="page-break-before:always;">

<p  >&nbsp;</p>

<p  >&nbsp;</p>

<p  >&nbsp;</p>

<p  ><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>

<p  ><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>

<p  ><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>

<p  >&nbsp;</p>

<p   align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center'><b><u><span
style='font-size:26.0pt;line-height:107%;font-family:"Californian FB",serif'>{{strtoupper($peserta->nama)}}</span></u></b></p>

<p   align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center'><span
style='font-size:18.0pt;line-height:107%;font-family:"Cambria",serif'>{{strtoupper($peserta->sekolah_nama)}}</span><span style='font-size:18.0pt;line-height:107%;font-family:"Cambria",serif'>
</span></p>

<p   align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center'>
  <span style='font-size:18.0pt;line-height:107%;font-family:"Cambria",serif'>&nbsp;</span></p>

<p   align=center style='margin-top:12.0pt;margin-right:0in;margin-bottom:0in;margin-left:0in;margin-bottom:.0001pt;text-align:center; line-height:normal'><b><span
style='font-size:24.0pt;font-family:"Cambria",serif'>
<?php $lomba = \App\Lomba::find($kategori->lomba_id); ?>
        @if($lomba->tipe_lomba=='semifinal')
          @if($peserta->juara_final == 1) Juara I @endif
          @if($peserta->juara_final == 2) Juara II @endif
          @if($peserta->juara_final == 3) Juara III @endif
          @if($peserta->juara_final == 4) Harapan I @endif
          @if($peserta->juara_final == 5) Harapan II @endif
          @if($peserta->juara_final == 6) Harapan III @endif
        @endif
        @if($lomba->tipe_lomba=='final')
          @if($peserta->juara == 1) Juara I @endif
          @if($peserta->juara == 2) Juara II @endif
          @if($peserta->juara == 3) Juara III @endif
          @if($peserta->juara == 4) Harapan I @endif
          @if($peserta->juara == 5) Harapan II @endif
          @if($peserta->juara == 6) Harapan III @endif
        @endif
</span></b></p>
<?php $kategori = \App\LombaKategori::find($peserta->kategori_id); ?>
<p  align=center style="margin-top:12.0pt;margin-right:0in;margin-bottom:0in;margin-left:0in;margin-bottom:.0001pt;text-align:center; line-height:normal">
<span id="juara" name="juara" style='font-size:16.0pt;font-family:"Cambria",serif'>KATEGORI {{strtoupper($kategori->name)}} KELAS {{$kategori->min}} - {{$kategori->max}}</span></p>
</div>
  @endforeach
