@extends('layouts.organizer')

@section('css')


@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Download Hasil Kompetisi</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">



        <form id="form" action="/organizer/lomba/{{$data['lomba']->id}}/download/hasil" method="post">
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
                <input type="hidden" name="$kat->kategori_id" value="">
                <label for="tempat_lahir">Pilih Output</label>
                 <select class="form-control" id="output" name="output" required>
                    <option value="">Select Output</option>
                        <option value="pdf">PDF</option>
                        <option value="xlsx">Excel</option>
                        <option value="html">HTML</option>
                </select>
                <br>
                <label for="bahasa">Pilih Bahasa</label>
                 <select class="form-control" id="bahasa" name="bahasa" required>
                        <option value="indonesia">Indonesia</option>
                        <option value="inggris">English</option>
                </select>
                <br>
                <label for="bahasa">Order By</label>
                 <select class="form-control" id="order_by" name="order_by" required>
                        <option value="ratarata">Rata-rata</option>
                        <option value="no_undian">Nomor</option>
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
