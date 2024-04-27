@extends('layouts.organizer')

@section('css')


@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Download Sertifikat Peserta</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

        <form id="form" action="/organizer/lomba/{{$data['lomba']->id}}/download/sertifikat" method="post">
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
                <br>
                <label for="tempat_lahir">Pilih Tempalte</label>
                 <select class="form-control" id="template" name="template" required>
                    <option value="">Select Template</option>
                        <option value="t1">Template 1</option>
                        <option value="t2">KPP 2019</option>
                        <option value="t3">OPEN Piano Bali 2019</option>
                </select>
                <br />
                <input type="hidden" name="$kat->kategori_id" value="">
                <label for="tempat_lahir">Pilih Output</label>
                 <select class="form-control" id="output" name="output" required>
                    <option value="">Select Output</option>
                        <option value="pdf">PDF</option>
                        <option value="html">HTML</option>
                </select>


            </div>



            <div class="w-block" align="right">
                <!-- <a href="/" class="h-block btn btn-primary waves-effect waves-light">Download</a> -->
                <button style="cursor:pointer;" type="submit" class="btn btn-success">Download</button>
            </div>
        </form>

        </div>
    </div>
</div>

<br>

@endsection
