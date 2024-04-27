@extends('layouts.organizer')
@section('css')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
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
</style>
@endsection

@section('content')
<div class="container">

    <div class="card">
      <div class="card-header">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <h6 class="h-block">
                          Upload Image
                      <h6>
                  </div>
              </div>
          </div>
      </div>
        <div class="card-body">
          <div class="row">
              <div class="col-sm-12">
<h2 class="page-heading">Upload your Images <span id="counter"><a class="btn btn-primary" href="/organizer/gallery/{{$lomba->id}}">Upload</a></span></h2>
                  <form method="POST" action="/organizer/gallery/storeImage/{{$lomba->id}}" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                	{{ csrf_field() }}
                	<div class="fallback">
					    			<input name="file" type="file" />
									</div>
                  <input type="text" name="lombaId" value="{{$lomba->id}}" hidden>
                </form>

              </div>
          </div>


        </div>
    </div>


    <br>

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h6 class="h-block">
                            Gallery Photos <b>{{$lomba->name}}</b>
                        <h6>
                          <form action="deleteImages" class="row" method="post">
                            {{csrf_field()}}
                            <input type="text" name="lombaId[]" value="{{$lomba->id}}" hidden>
                            <button type="submit" class="btn btn-sm btn-danger" name="button" ><i class="fa  fa-trash"></i>Delete All</button>
                          </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <!-- <div class="container"> -->

            <?php  $images =  $images->where('lomba_id', $lomba->id) ?>



              @foreach ($images as $image)
              <div class="col-sm-4 imgList">
                  <div class="upldPhoto">
                  <!-- <span title="Delete image" data-id="{{ $image->id }}" class="alert-danger pull-right removeImage"><i class="fa fa-2x fa-trash"></i></span> -->
                  <form action="deleteImage/{{$image->id}}" class="row" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-sm btn-danger" name="button" ><i class="fa  fa-trash"></i></button>
                  </form>
                  <div class="col sm-12 col md-3">
                    <a onclick="window.open('{{url('/uploads/').'/'.$image->image }}')" class="preview">
                        <img class="intense" src="{{url('/uploads/').'/'.$image->image }}" alt="" width="200px">
                    </a>
                  </div>
                  </div>
              </div>
              @endforeach
              <!-- </div> -->
            </div>
        </div>
    </div>
    <br />

<script type="text/javascript">
$('.preview').anarchytip();

</script>
    <script>
    window.onload = function() {
      // Intensify all images with the 'intense' classname.
        var elements = document.querySelectorAll( '.intense' );
      Intense( elements );
    }
    </script>
    <script async src="{{ asset('js/dropzone.js') }}"></script>
    <script type="text/javascript">
    	$(document).ready(function(){

    		var token = $('meta[name="csrf-token"]').attr('content');
    		var baseUrl = "{{url('/')}}";

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
    		  maxFilesize: 2, // MB
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
                        url: "{{ route('allImages') }}",
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
