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
  }
  @media (min-width: 768px) {
    .jumbotron {
      padding-top: calc(var(--jumbotron-padding-y) * 2);
      padding-bottom: calc(var(--jumbotron-padding-y) * 2);
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



<div class="album py-5 bg-light">
  <div class="container">

    {{--  <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Well done!</h4>
      <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>  --}}

    <div class="row">
      <?php $lombas = \App\Lomba::where('show', '1')
          ->where('tipe_konten', 'competition')
          ->orderBy('tanggal_lomba', 'desc')
          ->get(); ?>
      @for($i=0; $i<sizeof($lombas); $i++)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <a class="card-link" href="/lomba/{{$lombas[$i]->id}}">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{$lombas[$i]->poster}}" alt="Card image cap">
            <div class="card-body">
              <h3 class="card-text">{{$lombas[$i]->name}}</h3>
           
            </div>
          </div>
        </a>
      </div>
      @endfor

    </div>
  </div>
</div>

@endsection


@section('js')
<script>

</script>
@endsection
