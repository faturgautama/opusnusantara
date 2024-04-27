@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h3>Apakah anda yakin menghapus lomba "{{$lomba->name}}"?</h3>
    <p class="lead">
        <form  action="/organizer/lomba/{{$lomba->id}}" method="POST">
            {{ method_field('DELETE')}}
              {{csrf_field()}}
          <input class="btn btn-danger btn-lg" type="submit" value="YA">
          <a class="btn btn-info btn-lg" href="/lomba" role="button">Tidak</a>
        </form>
    </p>
</div>
@endsection
