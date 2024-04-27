@extends('layouts.app')

@section('css')
<style>
    .card{
        border-radius: 8px;
    }
</style>
@endsection


@section('content')


<!-- <br> -->
<!-- <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="h-block">Lombaku</h3>
        </div>
        <div class="col">
            <a href="/lombaku/create" class="h-block btn btn-outline-success waves-effect waves-light float-right">Daftar Lomba Baru</a>
        </div>
    </div>
</div> -->
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" class="d-block d-lg-none">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Registration</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <div class="row">
        <div class="col-12 d-block d-lg-none">
            <div class="dropdown">
            <button class="btn btn-block btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                Menu
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="/lombaku" class="list-group-item list-group-item-action"><span class="oi oi-target"></span> &nbsp My Registration</a>
                <a href="/" class="list-group-item list-group-item-action"><span class="oi oi-pencil"></span> &nbsp Register</a>
                <a href="/user/" class="list-group-item list-group-item-action"><span class="oi oi-person"></span> &nbsp My Account</a>
                <a href="/user/gantipassword" class="list-group-item list-group-item-action"><span class="oi oi-key"></span> &nbsp Change Password</a>
                <a href="/kontak" class="list-group-item list-group-item-action"><span class="oi oi-people"></span> &nbsp Contact</a>
            </div>
            </div>
            <!-- <div class="list-group">
                <a href="'/lombaku'" class="list-group-item list-group-item-action"><span class="oi oi-target"></span> &nbsp LombaKu</a>
                <a href="/" class="list-group-item list-group-item-action"><span class="oi oi-pencil"></span> &nbsp Daftar Lomba</a>
                <a href="/user/" class="list-group-item list-group-item-action"><span class="oi oi-person"></span> &nbsp AkunKu</a>
                <a href="/user/gantipassword" class="list-group-item list-group-item-action"><span class="oi oi-key"></span> &nbsp Ganti Password</a>
                <a href="/kontak" class="list-group-item list-group-item-action"><span class="oi oi-people"></span> &nbsp Kontak Panitia</a>
            </div> -->
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4 d-none d-lg-block">
            <div class="list-group">
                <a href="/lombaku" class="list-group-item list-group-item-action"><span class="oi oi-target"></span> &nbsp My Registration</a>
                <a href="/" class="list-group-item list-group-item-action"><span class="oi oi-pencil"></span> &nbsp Register</a>
                <a href="/user/" class="list-group-item list-group-item-action"><span class="oi oi-person"></span> &nbsp My Account</a>
                <a href="/user/gantipassword" class="list-group-item list-group-item-action"><span class="oi oi-key"></span> &nbsp Change Password</a>
                <a href="/kontak" class="list-group-item list-group-item-action"><span class="oi oi-people"></span> &nbsp Contact</a>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Registration</li>
                </ol>
            </nav>
            <!-- <hr class="d-block d-lg-none mt-1"/> -->

            <?php $lombaku = \App\Lombaku::where('user_id', \Auth::id())
                ->orderBy('created_at', 'desc')
                ->get(); ?>

            @foreach($lombaku as $lomba)
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row h-100">
                        <div class="col-10 my-auto">
                            <strong>#{{$lomba->id}} {{$lomba->lomba->name}}</strong>
                        </div>
                        <div class="col-2 my-auto">
                            @if($lomba->status == 0)
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-outline-primary float-right" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="oi oi-ellipses"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Cancel Registration</a>
                                </div>
                            </div>
                            @endif
                           
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="row">
                        <div class="col">
                            {{$lomba->peserta->count()}} Participant
                        </div>
                        <div class="col" align="right">
                           Rp {{number_format($lomba->total_biaya)}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                           <a href="/lombaku/{{$lomba->id}}/peserta">Show Details</a>
                        </div>
                        <div class="col" align="right">
                            @if($lomba->status == 0)
                                <button class="btn btn-outline-danger" disabled>Unpaid</button>
                            @elseif($lomba->status == 200)
                                <button class="btn btn-outline-success" disabled>Paid</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<br>

@endsection


@section('js')


@endsection