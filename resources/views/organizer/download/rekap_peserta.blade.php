@extends('layouts.organizer')

@section('css')


@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Download Rekap Peserta</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">



        <form id="form" action="/organizer/lomba/{{$data['lomba']->id}}/download/rekap_peserta" method="post">
            {{csrf_field()}}
            <?php
                $kategori = \App\LombaKategori::where('lomba_id', $data['lomba']->id)->get();
            ?>
            <div class="form-group">
                <label for="tempat_lahir">Pilih Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Select Category</option>
                    <option value="all">Semua</option>
                    {{-- @foreach($kategori as $kat)
                        <option value="{{$kat->id}}">{{$kat->name}}</option>
                    @endforeach --}}
                </select>
                <br />
                 <select class="form-control" id="output" name="output" required>
                    <option value="">Select Output</option>
                        <option value="pdf">PDF</option>
                        <option value="xlsx">Excel</option>
                </select>
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
