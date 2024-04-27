@extends('layouts.juri')

@section('css')


@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Pilih Kategori</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

      

        <form id="form" action="/juri/lomba/{{$lomba->id}}/nilai" method="get">
            <?php
                $kategori = \App\LombaKategori::where('lomba_id', $lomba->id)->get();
            ?>
            <div class="form-group">
                <label for="tempat_lahir">Pilih Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Select Category</option>
                    @foreach($kategori as $kat)
                        <option value="{{$kat->id}}">{{$kat->name}}</option>
                    @endforeach
                </select>
            </div>

            @if($lomba->tipe_lomba == 'semifinal')
            <div class="form-group">
                <label for="tipe_penilaian">Pilih Penilaian</label>
                <select class="form-control" id="tipe_penilaian" name="tipe_penilaian" required>
                    <option value="">Select Category</option>
                    <option value="semifinal">Semifinal</option>
                    <option value="final">Final</option>

                </select>
            </div>
            @endif


            <div class="w-block" align="right">
                <a href="/" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                <button type="submit" class="btn btn-success">Ke Halaman Penilaian</button>
            </div>
        </form>
            
        </div>
    </div>
</div>

<br>

@endsection

