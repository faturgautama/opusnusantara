@extends('layouts.app')

@section('css')
<style media="screen">
<link href="/js/imagepreview.min.js">
<style type="text/css">
  .removeImage {  position: absolute; right: 15px; top: 10px; border-radius: 50%; padding: 5px; cursor: pointer; }
  .upldPhoto{ text-align: center; margin-bottom: 20px; }
  #preview {
  position: absolute;
  border: 1px solid #ccc;
  background: #333;
  padding: 5px;
  display: none;
  color: #fff
}
.no-gutter > [class*='col-'] {
    padding-right:10px !important;
    padding-left:10px !important;
}
</style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="h-block">
                        Gallery Photos <b>{{$lomba->name}}</b>
                    <h4>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
      <div class="card-body">
        <div class="row no-gutter">
          <!-- <div class="container"> -->
            @foreach ($images as $image)
            <div class="col imgList">
                <div class="upldPhoto">
                <!-- <span title="Delete image" data-id="{{ $image->id }}" class="alert-danger pull-right removeImage"><i class="fa fa-2x fa-trash"></i></span> -->
                <div class="row no-gutter" >
                  <div class="col">
                    <a onclick="window.open('{{url('/uploads/').'/'.$image->image }}')" class="preview">
                        <img class="intense" src="{{url('/uploads/').'/'.$image->image }}" alt="" width="400px">
                    </a>
                  </div>
                </div>
                </div>
            </div>
            @endforeach
            <!-- </div> -->
          </div>
      </div>
    </div>
</div>
<br />


@endsection

@section('js')
<script>
$('.preview').anarchytip();
</script>
@endsection
