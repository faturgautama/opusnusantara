<html>

<head>

<style>

 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536859905 1073786111 1 0 511 0;}
@font-face
	{font-family:"Yu Mincho";
	panose-1:2 2 4 0 0 0 0 0 0 0;
	mso-font-alt:\6E38\660E\671D;
	mso-font-charset:128;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-2147482905 717749503 18 0 131231 0;}
@font-face
	{font-family:Constantia;
	panose-1:2 3 6 2 5 3 6 3 3 3;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1073750091 0 0 415 0;}
@font-face
	{font-family:"\@Yu Mincho";
	mso-font-charset:128;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-2147482905 717749503 18 0 131231 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"Yu Mincho";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing
	{mso-style-priority:1;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	mso-style-link:"No Spacing Char";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"Yu Mincho";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
span.NoSpacingChar
	{mso-style-name:"No Spacing Char";
	mso-style-priority:1;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"No Spacing";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"Yu Mincho";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:8.0pt;
	line-height:107%;}
@page Wordection1
	{size:841.9pt 595.3pt;
	mso-page-orientation:landscape;
	margin:0cm 0cm 0cm 0cm;
	mso-header-margin:35.45pt;
	mso-footer-margin:35.45pt;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}

</style>

<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin-top:0cm;
	mso-para-margin-right:0cm;
	mso-para-margin-bottom:8.0pt;
	mso-para-margin-left:0cm;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
  .container{
    padding-top: 400px;
  }
   .page-break {page-break-after: always;}
</style>
</head>

<body lang=IN style='tab-interval:36.0pt'>

<?php
$pesertas = \App\LombakuPeserta::where('kategori_id', $kategori->id)
    ->join('lombakus', 'lombakus.id', 'lombaku_pesertas.lombaku_id')
    ->where('status', 200)
    ->select('lombaku_pesertas.*', 'lombakus.status as status')
    ->orderBy('juara', 'asc')
    ->get();
$jumlah_peserta = sizeof($pesertas);

// dd(count($pesertas));
?>
@foreach($pesertas as $peserta)

<section>
  <div class=WordSection1>

    @if($kategori->lomba_id == 11)
	<p class=MsoNormal><span style='mso-ignore:vglayout;position:
    relative;z-index:-1895825408'><span style='position:absolute;left:-10px;
    top:-15px;width:1250px;height:870px'><img width="1100px" height="870px"
    src="/image/4sertifikatkpp2019.jpg" v:shapes="Picture_x0020_1"></span></span></p>
		@endif
		@if($kategori->lomba_id == 12)
		<p class=MsoNormal><span style='mso-ignore:vglayout;position:
    relative;z-index:-1895825408'><span style='position:absolute;left:-10px;
    top:-15px;width:1250px;height:870px'><img width="1100px" height="870px"
    src="/image/6sertifikatkpp2019.jpg" v:shapes="Picture_x0020_1"></span></span></p>
		@endif
		@if($kategori->lomba_id == 13)
		<p class=MsoNormal><span style='mso-ignore:vglayout;position:
    relative;z-index:-1895825408'><span style='position:absolute;left:-10px;
    top:-15px;width:1250px;height:870px'><img width="1100px" height="870px"
    src="/image/7sertifikatkpp2019.jpg" v:shapes="Picture_x0020_1"></span></span></p>
		@endif
		@if($kategori->lomba_id == 14)
		<p class=MsoNormal><span style='mso-ignore:vglayout;position:
    relative;z-index:-1895825408'><span style='position:absolute;left:-10px;
    top:-15px;width:1250px;height:870px'><img width="1100px" height="870px"
    src="/image/9sertifikatkpp2019.jpg" v:shapes="Picture_x0020_1"></span></span></p>
		@endif
		@if($kategori->lomba_id == 16)
		<p class=MsoNormal><span style='mso-ignore:vglayout;position:
    relative;z-index:-1895825408'><span style='position:absolute;left:-10px;
    top:-15px;width:1250px;height:870px'><img width="1100px" height="870px"
    src="/image/10sertifikatkpp2019.jpg" v:shapes="Picture_x0020_1"></span></span></p>
		@endif
		
    <div class="container">

      <p class=MsoNormal style='margin-left:173.0pt;text-indent:36.0pt'><b
      style='mso-bidi-font-weight:normal'><span style='font-size:32.0pt;mso-bidi-font-size:
      11.0pt;line-height:107%'>{{strtoupper($peserta->nama)}}</span></b></p>

      <p class=MsoNormal style='margin-left:173.0pt;text-indent:36.0pt'><span
      style='font-size:20.0pt;mso-bidi-font-size:11.0pt;line-height:107%'>{{strtoupper($peserta->sekolah_nama)}}</span></p>

      <br><br>


      <p class=MsoNormal style='margin-left:173.0pt;text-indent:36.0pt;line-height:
      normal'><span style='font-size:24.0pt;font-family:"Constantia",serif;
      mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>
			<?php
   $lomba = \App\Lomba::find($kategori->lomba_id);
   $kategori = \App\LombaKategori::find($peserta->kategori_id);
   ?>
			@if($jumlah_peserta ==1)
			PENGHARGAAN KHUSUS
			@else
			Sebagai
		    @if($lomba->tipe_lomba=='semifinal')
		      @if($peserta->juara_final == 1) Juara I @endif
		      @if($peserta->juara_final == 2) Juara II @endif
		      @if($peserta->juara_final == 3) Juara III @endif
		      @if($peserta->juara_final == 4) Juara Harapan I @endif
		      @if($peserta->juara_final == 5) Juara Harapan II @endif
		      @if($peserta->juara_final == 6) Juara Harapan III @endif
		    @endif
		    @if($lomba->tipe_lomba=='final')
		      @if($peserta->juara == 1) Juara I @endif
		      @if($peserta->juara == 2) Juara II @endif
		      @if($peserta->juara == 3) Juara III @endif
		      @if($peserta->juara == 4) Juara Harapan I @endif
		      @if($peserta->juara == 5) JuaraHarapan II @endif
		      @if($peserta->juara == 6) Juara Harapan III @endif
		    @endif
		    Kategori {{$kategori->name}}
			@endif
      </span></p>
    </div>


  </div>
</section>
<div class="page-break"></div>

@endforeach
</body>

</html>
