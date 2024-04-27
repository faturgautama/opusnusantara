@extends('layouts.app')

@section('css')


@endsection


@section('content')
<br>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="h-block">Competition Registration</h4>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/lombaku/" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <!-- <label for="min">Kelas Minimal</label> -->
                    <h4>Are you sure to register <strong>{{$lomba->name}}</strong> ?</h4>
                </div>
                <input type="hidden" name="lombaId" value="{{$lomba->id}}"/>
                <div class="form-group float-right">
                    <a href="/lomba/{{$lomba->id}}" class="btn btn-primary">Back</a> &nbsp
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Yes</a>
                </div>
            </form>

        </div>
    </div>
</div>

<br>

@endsection


@section('js')


@endsection