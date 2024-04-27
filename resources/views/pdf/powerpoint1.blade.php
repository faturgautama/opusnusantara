<html><head> 
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link href="//db.onlinewebfonts.com/c/3c1a440c0da3e6484b92282953ca3555?family=Aharoni" rel="stylesheet" type="text/css"/>
 <style> 
 /*sup {
	top: -0.4em;
	vertical-align: baseline;
	position: relative;
}
sub {
	top: 0.4em;
	vertical-align: baseline;
	position: relative;
}
a:link {text-decoration:none;}
a:visited {text-decoration:none;}*/
@media  screen and (min-device-pixel-ratio:0), (-webkit-min-device-pixel-ratio:0), (min--moz-device-pixel-ratio: 0) {.stl_view{ font-size:10em; transform:scale(0.1); -moz-transform:scale(0.1); -webkit-transform:scale(0.1); -moz-transform-origin:top left; -webkit-transform-origin:top left; } }
.layer { }.ie { font-size: 1pt; }
.ie body { font-size: 12em; }
/*. {
	position: absolute;
	white-space: nowrap;
}
*/
	@import url(http://db.onlinewebfonts.com/c/3c1a440c0da3e6484b92282953ca3555?family=Aharoni);
  .page-break {page-break-after: always;}

.stl_02 {
	height: 45em;
	font-size: 1em;
	margin: 0em;
	line-height: 0.0em;
	display: block;
	border-style: none;
	width: 60em;
}
@font-face {
  font-family: "aharoni";
  src: url('/assets/fonts/aharoni.ttf');
}
.aharoni{
	font-family: "Aharoni" !important;
	font-size: 4em;
}
body{
	font-family: inherit;
}

@supports(-ms-ime-align:auto) { .stl_02 {width: auto; overflow: hidden;}}
.stl_03 {
	position: relative;
}
.stl_04 {
	width: 100%;
	clip: rect(-0.041667em,60.04167em,45.04166em,-0.041667em);
	position: absolute;
	pointer-events: none;
}
/*.{
	position: relative;
	width: 60em;
}*/
/*. {
	height: 4.5em;
}
.ie . {
	height: 45em;
}*/

/*. {
	font-size: 2em;
	font-family: "IAOIJI+NotoSans-Identity-H";
	color: #000000;
	line-height: 1.361816em;
}*/
/*. {
	font-size: 2.67em;
	font-family: "IAOIJI+NotoSans-Identity-H";
	color: #000000;
	line-height: 1.365229em;
}*/

 </style> 

		<meta charset="utf-8">
		<title>
		</title>
		
	</head>
	<?php $i = 0;
// $tipe_penilaian ="dd";
// dd($lomba);
?>
	@foreach($kategori as $kategoris)
	  <?php
   $pesertas = \App\LombakuPeserta::where('kategori_id', $kategoris->id)
       ->join('lombakus', 'lombakus.id', 'lombaku_pesertas.lombaku_id')
       ->where('status', 200)
       ->select('lombaku_pesertas.*', 'lombakus.status as status')
       ->orderBy('no_undian', 'asc')
       ->get();
   $jumlah_peserta = sizeof($pesertas);
   $kategori = $kategoris->name;

// dd($pesertas);
?>
<body>		  	  		
		@foreach($pesertas as $peserta)
		<section>
			<div class="col-md-12">
				<div class="row">
					<div class="stl_03">
						@if($lomba->id == 11)
						<img src="/image/template.jpg" alt="" class="stl_04">
						@endif
						@if($lomba->id == 12)
						<img src="/image/lomba12.jpg" alt="" class="stl_04">
						@endif
					</div>
					<div class="col-md-12">
						<div  style="margin-left: 22%" class="container">
							<br>

							<h2>Kategori {{$kategori}}</h2>
						</div>
						<div style="margin-left: 22%">
							<br>
							<h1 class="text-center aharoni"><b>{{$peserta->nama}}</b></h1>
							<h2 class="text-center">
								<?php
        $song = [];
        // dd($pesertas);
        if ($kategoris->song_type == 'bebas') {
            // $song = $pesertas[$i]->song1;
            for ($x = 1; $x < 11; $x++) {
                $s = "song" . $x;
                if ($peserta->$s !== null) {
                    $song[$x] = $peserta->$s;
                }
            }
        } else {
            $ss = "song" . $peserta->song1;
            $song[1] = $kategoris->$ss;
            // $dat = \App\LombaKategori::where(song[]);
            // $song[1] =  $pesertas:
        }
        //dd(count($song));
        $no = 1;
        ?>

								<i>
									@foreach($song as $music)
									{{$music}}@if($no < count($song)), @endif
									@php $no++ @endphp
									@endforeach
								</i>
							</h2>
							<br>
							<div>
								<center><img class="img-responsive" style="width: 210px; height: 310px; border-radius: 2px" src="/uploads/{{$peserta->foto}}" alt="{{$peserta->foto}}"></center>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<div class="page-break"></div>	
		@endforeach
</body>
	@endforeach
</html>