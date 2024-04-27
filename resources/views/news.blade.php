@extends('layouts.app')


@section('css')

@endsection

@section('content')
<div class="container">
  <br>
  <h2 align="center">{{$berita->judul}}</h2>
      <div class="card">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="card-body">
                {!!$berita->konten!!}
            </div>
          </div>
        </div>
      </div>
      <br />


</div> <!-- end container -->
@endsection

@section('js')

@endsection
