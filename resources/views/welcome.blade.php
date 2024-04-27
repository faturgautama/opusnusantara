@extends('layouts.app')

@section('css')
<!-- Custom styles for this template -->
<style>
  :root {
    --jumbotron-padding-y: 3rem;
  }

  .jumbotron {
    padding-top: var(--jumbotron-padding-y);
    padding-bottom: var(--jumbotron-padding-y);
    margin-bottom: 0;
    background-color: #fff;
    background: url(https://flypaper.soundfly.com/wp-content/uploads/2016/02/sheet-music-ft.jpeg);
    font-family: "Times New Roman";
  }
  @media (min-width: 768px) {
    .jumbotron {
      padding-top: calc(var(--jumbotron-padding-y) * 2);
      padding-bottom: calc(var(--jumbotron-padding-y) * 2);
      background-size: cover;
    }
  }

  .jumbotron p:last-child {
    margin-bottom: 0;
  }

  .jumbotron-heading {
    font-weight: 300;
  }

  .jumbotron .container {
    max-width: 40rem;
  }

  footer {
    padding-top: 3rem;
    padding-bottom: 3rem;
  }

  footer p {
    margin-bottom: .25rem;
  }

  .box-shadow {
    box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
  }

  .card {
    color: #212529;
  }

  .card:hover {
    box-shadow: 0 28px 36px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    color: #000000;
  }

  .link-card{
    text-decoration: none;

  }
  
  .text{
    color: #ff0000;
  }

  .card-bar:hover{
    box-shadow: none;
  }

  .card-bar{

    border-radius: 8px;

  }


</style>
@endsection

@section('content')

<div class="jumbotron">
<center>
  <br/>
  <br/>
  <h1 class="display-4" style="color:  white;"><strong>OPUS NUSANTARA</strong></h1>
  <p class="lead" style="color:  white;"><i>for music & beyond...</i></p>
  <hr class="my-4" style="color:  white;">
  <p></p>
  <p class="lead">
    <a class="btn btn-secondary btn-lg" style="width:150px;opacity: 0.8;" href="/education" role="button">Education</a>
    <a class="btn btn-secondary btn-lg" style="width:150px;opacity: 0.8;" href="/competition" role="button">Competition</a>
  </p>
  <br/>
</center>
</div>

@endsection


@section('js')
<script>

</script>
@endsection
