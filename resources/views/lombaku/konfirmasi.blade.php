@extends('layouts.app')

@section('css')

<style>
    .card{
        border-radius: 8px;
    }
</style>
@endsection


@section('content')
<br>


<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Konfirmasi</h3>
            @if($errors->any())
                <h4 class="mt-3 text-danger">{{$errors->first()}}</h4>
            @endif
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
        <br>
        <div class="table-responsive">
        <table style="font-family: monospace;font-size: 14px;"class="table table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lomba->peserta as $peserta)
                <tr>
                <th scope="row">1</th>
                <td>{{$peserta->nama}} [{{$peserta->tanggal_lahir}}]</td>
                <td>{{$peserta->kategori->name}}</td>
                <td>Rp {{number_format($peserta->biaya,2)}}</td>
                </tr>
                @endforeach
                <th scope="row"></th>
                    <td align="right" colspan="3"><h5>Total: Rp {{number_format($lomba->peserta->sum('biaya'),2)}}</h5></td>
                </tr>
            </tbody>
        </table>
        </div>
        
        
        <div class="row">
            <div class="col" align="right">
               
            </div>
        </div>
       
        <br>
        <form action="/lombaku/{{$lomba->id}}/konfirmasi" method="post" id="form">
        {{csrf_field()}}
        </form>
        <br>
        <div class="row">
            <div class="col" align="right">
                <a href="/lombaku/{{$lomba->id}}/peserta" class="h-block btn btn-primary waves-effect waves-light">Back</a>    
                <button id="submit" class="h-block btn btn-success waves-effect waves-light">Pay</a>
            </div>
        </div>
       
        </div>
    </div>
</div>

<br>

@endsection


@section('js')
<script>
$('#submit').click(function(){
    $('#form').submit();
});

</script>

@endsection