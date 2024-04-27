@extends('layouts.app')


@section('css')


@endsection


@section('content')
<br>
<div class="container">
  <div class="form-group">
    <label for="tanggal_end_pendaftaran">Pilih Lomba</label>
      <select class="form-control" name="type">
        <option>Umur</option>
        <option>Kelas</option>
      </select>
      <br>
      <!-- <button type="button" class="btn btn-primary" name="button">Login</button> -->
      <a href="daftar/create" class="btn btn-primary">Login</a>
  </div>
</div>

@endsection


@section('js')

@endsection
