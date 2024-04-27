@extends('layouts.opusv2')

@section('css')
<style>
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
  <link rel="stylesheet" href="/stisla/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="/stisla/assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="/stisla/assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="/stisla/assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script>
        $(document).ready(function(){
            $('#editformData').hide();
            function showImage(src, target) {
                var fr = new FileReader();
                fr.onload = function(){
                    target.src = fr.result;
                }
                fr.readAsDataURL(src.files[0]);
            }

                $('#foto2').change(function putImage() {
                    var src = document.getElementById("foto2");
                    var target = document.getElementById("target2");
                    showImage(src, target);
                });
                $('#foto').change(function putImage() {
                    var src = document.getElementById("foto");
                    var target = document.getElementById("target");
                    showImage(src, target);
                });
        // jQuery methods go here...

        });
    </script>
@endsection

@section('content')
<div class="section-header">
    <h1>Create Content by Opus Nusantara v2</h1>
    <audio autoplay> 
        <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Enjoy the new features of Opus Nusantara . We can see the latest news from opus nusantara here')}}+" type="audio/mpeg">
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
            <form action="/v2/content/create" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                <div class="col-sm-12 col-md-8">
                <select name="type" id="type" class="form-control selectric">
                    <option value="">-- Select Type --</option>
                    <option value="news">News</option>
                    <option value="live">Video / Live</option>
                    <option value="blog">Blog</option>
                    <option value="info">Info</option>
                </select>
                <script>
                    $('#type').change(function(){
                        if($(this).val() == 'info'){
                            $('#forInfo').replaceWith('<i id="forInfo" class="text-danger">* Untuk info cukup isi form title.</i>');
                            $('#foto').replaceWith('<input type="file" name="file" id="foto" class="form-control" disabled>');
                            // $('#content').replaceWith('<div id="content"></div>');
                        }
                        if($(this).val() == 'live'){
                            $('#notLive').hide();
                            $('#Live').show()
                            // $('#content').replaceWith('<div id="content"></div>');
                        }
                        if($(this).val() != 'info' && $(this).val() != 'live'){
                            $('#forInfo').replaceWith('<i id="forInfo"></i>');
                            $('#foto').replaceWith('<input type="file" name="file" id="foto" class="form-control">');
                            // $('#content').replaceWith('<div id="content"><textarea name="content" class="summernote"></textarea></div>');
                            $('#notLive').show();
                            $('#Live').hide();
                        }
                    });
                    $(document).ready(function(){
                        $('#Live').hide();
                    });

                </script>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                
                <div class="col-sm-12 col-md-8">
                <input name="title" type="text" class="form-control">
                <i id="forInfo"></i>
                </div>
            </div>
            <div id="notLive" class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                <div class="col-sm-12 col-md-4">
                <input type="file" name="file" id="foto" class="form-control">
                </div>
                <div class="col-sm-12 col-md-4">
                <img id="target" src="" alt="">
                </div>
            </div>
            <div id="Live" class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                <div class="col-sm-12 col-md-4">
                <input type="file" name="file" accept="video/*" id="foto" class="form-control">
                </div>
                
                <div class="col-sm-12 col-md-4">
                <input name="link" type="url" class="form-control" placeholder="URL Youtube">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-8">
                    <textarea name="content" class="summernote"></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-8">                    
                    <button class="btn btn-primary btn-post">Publish</button>         
                </div>
            </div>
            </div>
            </form> 
        </div>
    </div>
    <div class="col-12" id="editformData">
        <div class="card">
            <div class="card-header">
            <h4>Edit Content</h4>
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
            <form action="" id="editFormUrl" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                
                <div class="col-sm-12 col-md-8">
                <input name="title" id="title" type="text" class="form-control">
                <!-- <i id="forInfo"></i> -->
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Custom URL</label>
                <div class="col-sm-12 col-md-8">
                <input name="url" id="url" type="url" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                <div class="col-sm-12 col-md-4">
                <input type="file" name="file" id="foto2" class="form-control">
                </div>
                <div class="col-sm-12 col-md-4">
                <img id="target2" src="" alt="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-8">                
                    <textarea id="content2" name="content" class="summernote"></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-8">                    
                    <button type="sumbit" class="btn btn-primary btn-post">Re-Publish</button>
                    <a class="btn btn-danger text-white" id="btEditCancel">Cancel</a>
                </div>
            </div>
            </div>
            </form> 
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All News</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>URL Random</th>
                            <th>Viewed</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            $news = \App\Article::where(
                                'author_id',
                                \Auth::user()->id
                            )
                                ->orderby('created_at', 'Decs')
                                ->get();
                            ?>
                            @foreach($news as $data)
                            @if($data->type == 'blog' || $data->type == 'news' || $data->type == 'live')
                            <tr>
                                <td>{{$x++}}</td>
                                <td>{{$data->title}}</td>
                                <td><a href="/v2/news/{{$data->randuri}}">{{$data->randuri}}</a></td>
                                <td>{{$data->viewed}}</td>
                                <td>
                                    <form action="/v2/content/{{$data->id}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <a href="#editformData" id="btnEdit{{$data->id}}" class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <?php $img = \App\Attachment::find(
                                                $data->attach_id
                                            ); ?>
                                            <script>
                                               $('#btnEdit{{$data->id}}').click(function(){
                                                   $('#editformData').show();
                                                   $('#createformData').hide();
                                                   $('#editFormUrl').attr('action','/v2/content/{{$data->id}}/edit');
                                                   $('#title').val('{{$data->title}}');
                                                   $('#url').val('{{$data->randuri}}');
                                                   $('#target2').attr("src","/uploads/news/{{$img['name']}}");
                                                   $('#content2').summernote('code','{!!$data->content!!}');
                                               });
                                            </script>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
$('#btEditCancel').click(function(){
    $('#editformData').hide();
    $('#createformData').show();
});







</script>
<!-- JS Libraies -->
<script src="/stisla/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="/stisla/assets/modules/codemirror/lib/codemirror.js"></script>
  <script src="/stisla/assets/modules/codemirror/mode/javascript/javascript.js"></script>
  <script src="/stisla/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="/stisla/assets/modules/datatables/datatables.min.js"></script>
  <script src="/stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="/stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="/stisla/assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script>

    $("#table-1").dataTable({
    "columnDefs": [
        { "sortable": true, "targets": [2,3] }
    ]
    }); 
    var table = $('#table-1').DataTable();
    // table.column(0).visible(false);
  </script>
@endsection

