@extends('layouts.organizer')

@section('css')


@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Download Powerpoint Peserta</h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

        <form id="form" action="/organizer/lomba/{{$data['lomba']->id}}/download/powerpoint" method="post">
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
                        <option value="html">HTML</option>
                </select>
                <input type="hidden" name="lomba_id" value="{{$data['lomba_id']}}">
            </div>
            <div class="form-group">
                <div id="result_tipe_lomba"></div>
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
<!-- <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="semi_final">Semi Final</option>
                    <option value="final">Final</option>
                </select> -->
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
    $('#kategori_id').change(()=>{
        let id =$('#kategori_id').val()
        axios.get('/organizer/api/category/'+id)
        .then(function(result){
            console.log(result)
            let html =` <label for="tempat_lahir">Pilih Tipe Lomba</label>
                             <select class="form-control" id='tipe_lomba' name="tipe_lomba" required>'+
                                <option value="semi_final">Semi Final</option>
                                <option value="final">Final</option>
                            </select><br />`
            if(result.data.song_type_final){
                $('#result_tipe_lomba').html(html)
            }
        })
        .catch(function(err){
        });
    })
})
</script>
@endsection