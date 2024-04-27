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
            <h3 class="h-block"></h3>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">



        <?php
            $i=1;
        ?>
        @forelse ($lomba->peserta as $peserta)
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-lg-2 d-none d-lg-block">
                        <img height="150" src="/uploads/{{$peserta->foto}}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <div class="row">
                            <div class="col">
                                <h5>#{{$i}} {{$peserta->nama}} [{{$peserta->tanggal_lahir}}]</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <p>{{$peserta->kategori->name}}</p>
                                @if($peserta->kategori->song_type == 'pilihan' )
                                    <p>[ {{$peserta->kategori['song'.$peserta['song1']]}} ]</p>
                                @endif

                                @if($peserta->kategori->song_type == 'bebas' )
                                    <p>[
                                    @if($peserta->song1)
                                        {{$peserta->song1}}
                                    @endif
                                    @if($peserta->song2)
                                        ,&nbsp{{$peserta->song2}}
                                    @endif
                                    @if($peserta->song3)
                                        ,&nbsp{{$peserta->song3}}
                                    @endif
                                    @if($peserta->song4)
                                        ,&nbsp{{$peserta->song4}}
                                    @endif
                                    ]</p>
                                @endif


                                    
                               
                                
                               
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><strong>Rp {{number_format($peserta->kategori->biaya,2)}}</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" align="right">
                                <button peserta-id="{{$peserta->id}}" peserta-nama="{{$peserta->nama}}" class="btn btn-danger hapus-peserta">Delete</button>
                                <a href="/lombaku/{{$lomba->id}}/peserta/{{$peserta->id}}/edit" class="h-block btn btn-secondary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $i++;
        ?>
        @empty
            <div class="card">
                <div class="card-body">
                <center>
                    <a href="/lombaku/{{$lomba->id}}/peserta/create"><h5>Data is Empty, Click Here or Button Below to Add</h5></a>
                </center>
                </div>
            </div>
        @endforelse
      

        
        
        <br>
        <div class="w-block" align="right">
            <!-- <h5 >Total: Rp 800.000,00</h5> -->
        </div>
        <br>
        <div class="row">
            <div class="col" align="left">
                <a href="/lombaku/{{$lomba->id}}/peserta/create" class="h-block btn btn-outline-success waves-effect waves-light float-left tambah-peserta">Add Participant</a>
            </div>
            <div class="col" align="right">
                <a href="/lombaku/" class="h-block btn btn-primary waves-effect waves-light">Back</a>
                @if($lomba->peserta->count()>0)
                <a href="/lombaku/{{$lomba->id}}/konfirmasi" class="h-block btn btn-success waves-effect waves-light">Next</a>
                @endif
            </div>
        </div>
        </div>
    </div>
</div>

<br>

@endsection


@section('js')
<script src="/js/axios.js"></script>
<script>
    let tour = new Shepherd.Tour({
        defaults: {
            classes: 'shepherd-theme-arrows'
        }
    });

    tour.addStep('example', {
        title: 'Tambah Peserta',
        text: 'Peserta Masih Kosong, Klik Link Ini untuk Tambah Peserta',
        attachTo: '.tambah-peserta left'
        // advanceOn: '.docs-link click'
    });

    // tour.start();
    $('.hapus-peserta').click(function(){
        var id = $(this).attr('peserta-id');
        var nama = $(this).attr('peserta-nama');
        if(confirm("Do you really want to delete "+nama+"?")){
            axios.delete('/lombaku/{{$lomba->id}}/peserta/'+id)
                .then(function(resp){
                    window.location.reload();
                })
                .catch(function(err){

                });
        }
    });
</script>

@endsection