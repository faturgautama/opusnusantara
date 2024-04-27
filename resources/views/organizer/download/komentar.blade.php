@extends('layouts.organizer')

@section('css')


@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Download Komentar</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

      

        <form id="form" action="/organizer/lomba/{{$data['lomba']->id}}/download/komentar" method="post">
            {{csrf_field()}}
            <?php
                $kategori = \App\LombaKategori::where('lomba_id', $data['lomba']->id)->get();
            ?>
            <div class="form-group">
                <label for="tempat_lahir">Pilih Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Select Category</option>
                    <option value="all">Semua</option>
                    @foreach($kategori as $kat)
                        <option value="{{$kat->id}}">{{$kat->name}}</option>
                    @endforeach
                </select>
                <br />
                 <select class="form-control" id="output" name="output" required>
                    <option value="">Select Output</option>
                        <option value="pdf">PDF</option>
                </select>
                 @if($data['lomba']->tipe_lomba == 'semifinal')
                <div class="form-group">
                    <label for="tipe_penilaian">Pilih Penilaian</label>
                    <select class="form-control" id="tipe_penilaian" name="tipe_penilaian" required>
                        <option value="">Select Category</option>
                        <option value="semifinal">Semifinal</option>
                        <option value="final">Final</option>

                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="emailHelp" placeholder="Contoh: Surabaya, 24 Maret 2018">
                </div>
            </div>


            <div class="w-block" align="right">
                <a href="/" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                <button type="submit" class="btn btn-success">Download</button>
            </div>
        </form>
            
        </div>
    </div>
</div>

<br>

@endsection

