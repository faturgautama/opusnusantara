@extends('layouts.opusv2')

@section('css')
<link href="/css/dropzone.css" rel="stylesheet">
<link href="/js/imagepreview.min.js">
<style>
    .removeImage {  position: absolute; right: 15px; top: 10px; border-radius: 50%; padding: 5px; cursor: pointer; }
    .upldPhoto{ text-align: center; margin-bottom: 20px; }
    #preview {
    position: absolute;
    border: 1px solid #ccc;
    background: #333;
    padding: 5px;
    display: none;
    color: #fff

    @media (min-width: 920px){
        .img-news{
        width :100%;
        height :250px;
        }
    }
    @media (min-width: 480px) and (max-width: 919px){
        .img-news{
        width :100%;
        height :200px;
        }
        
    }
    @media (max-width: 479px){
        .img-news{
        width :100%;
        height :110px;
        }
        .btn-post{
            display: block;
            width: 100%;
        }
    }
    img{
        height: 200px;
    }
</style>
<!-- CSS Libraries -->
    <script>
        $(document).ready(function(){
            $('#forUrl').hide();
            $('#forImage').hide();
        });
    </script>
@endsection

@section('content')
<div class="section-header">
    <h1>Create Content by Opus Nusantara v2</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','','Enjoy the new features of Opus Nusantara . We can see the latest news from opus nusantara here')}}" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>

<div class="row">
    <div class="col-12" id="createformData">
        <div class="card">
            <div class="card-header">
            <h4>Create Content</h4>
            </div>
            <div class="col-12">
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                        {{$message}}
                    </div>
                </div>
                @endif
                @if($message = Session::get('wrong'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                        {{$message}}
                    </div>
                </div>
                @endif
            </div>
            <form action="/v2/gallery/create" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                <div class="col-sm-12 col-md-8">
                <select name="type" id="type" class="form-control selectric">
                    <option value="">-- Select Type Upload --</option>
                    <option value="url">Link URL</option>
                    <option value="image">Image File</option>
                </select>
                <script>
                    $('#type').change(function(){
                        if($(this).val() == 'url'){
                            $('#forUrl').show();
                            $('#forImage').hide();
                        }
                        if($(this).val() == 'image'){
                            $('#forImage').show();
                            $('#forUrl').hide();
                        }
                    });
                </script>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                <div class="col-sm-12 col-md-8">
                <select name="lombas" id="lombas" class="form-control selectric">
                    <option value="">-- Select Lomba --</option>
                    @foreach($lombas as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
                <script>
                    $('#lombas').change(function(){
                        var lomba_id = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url :"/v2/api/ketegori",
                            method : "GET",
                            data :{
                                _token:_token,
                                lomba_id:lomba_id,
                                
                            }, success:function(result){
                                $('#kategori').html(result);
                                // console.log(result);
                                
                            }
                            
                        }); 
                    });

                </script>
                </div>
            </div>
            <div id="kategori"></div>
            
            </form> 
        </div>
    </div>
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Insert Photos</h4>
            </div>
            <div class="card-body" id="forUrl">
                @for($i=0;$i< 10;$i++)
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">LINK {{$i}}</label>
                    
                    <div class="col-sm-12 col-md-8">
                    <input name="url[]" id="url{{$i}}" type="url" class="form-control">
                    <!-- <i id="forInfo"></i> -->
                    </div>
                </div>
                @endfor
            </div>
            <div class="card-body" id="forImage">
                
                <form method="POST" action="/organizer/gallery/storeImage/17" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                	<div class="fallback">
                        <input name="file" type="file" />
                    </div>                    
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script async src="/js/dropzone.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        var token = $('meta[name="csrf-token"]').attr('content');
        var baseUrl = "/";

        $(document).on("click",".removeImage", function(e){
            e.preventDefault();
            var imageId = $(this).data('id');
            $.ajax({
                // url: baseUrl + '/deleteImage/'+imageId,
                type: 'delete',
                data: {'_token': token},
                success: function (result) {
                    $('.allImages').html(result.html);
                }
            });
        });


        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 3, // MB
            init: function () {
            var self = this;
            // config
            self.options.addRemoveLinks = true;
            self.options.dictRemoveFile = "Remove";
            // bind events

            /*
            * Success file upload
            */
            self.on("success", function (file, response) {
                file.serverId = response.id;
                location.reload();
            });

            /*
            * On delete file
            */
            self.on("removedfile", function (file) {
                $.ajax({
                    // url : baseUrl + '/deleteImage/'+file.serverId,
                    type: 'delete',
                    data: {'_token': token},
                    success: function (result) {
                        $('.allImages').html(result.html);
                    }
                });
            });

            /*
            * Queue completed event
            */

            self.on("queuecomplete", function () {
                $.ajax({
                    url: "/organizer/gallery/allImages",
                    type: "get",
                    success: function (response) {
                        $('.allImages').html(response);
                    }
                });
            });
        }
        };
    })
</script>

@endsection