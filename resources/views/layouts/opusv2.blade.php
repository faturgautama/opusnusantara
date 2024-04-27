<?php
$lomba_competition = \App\Lomba::where('tipe_konten', 'competition')
    ->select("name", "id")
    ->get();
$lomba_education = \App\Lomba::where('tipe_konten', 'education')
    ->select("name", "id")
    ->get();

// dd($lomba);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>OPUSNUSANTARA {{Date('Y')}}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/stisla/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/fontawesome/css/all.min.css">
  
  <!-- CSS Libraries -->
  
  <!-- <link rel="stylesheet" href="/stisla/assets/modules/prism/prism.css"> -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="/stisla/assets/css/style.css">
  <link rel="stylesheet" href="/stisla/assets/css/components.css">

  <script src="/stisla/assets/modules/jquery.min.js"></script>

<style>
  .no-gutter > [class*='col-'] {
      padding-right:0 !important;
      padding-left:0 !important;
  }
  .card .card-header{
    border-bottom: 1px solid rgba(0, 0, 0, 0.125) !important;
  }
  .card .card-footer{
    border-top: 1px solid rgba(0, 0, 0, 0.125) !important;
  }
  .card .card-body p {
    font-size:15px;
  }
  body{
    color:#43474a;
  }
  .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6{
    color: rgb(64, 64, 66);
  }
  .btn-inline{
    border-radius: 0px;
    padding-bottom: 10px;
  }
  .select-inline{
    border-radius: 0px
  }
  @media (max-width: 700px){
    #times{
      visibility: hidden;
    }
  }
</style>
<link rel="stylesheet" href="/ubold/assets/css/icons.css">
@yield('css')
<!-- /END GA -->
</head>

<body id="body">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3" width="100%">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul>
        
        </ul>
        <ul class="navbar-nav navbar-right" style="display:block;width:100%">
        <li>
        <div class="row">
          <div class="col-12 col-md-9"><marquee direction="left" class="text-white">
                @php $info = \App\Article::where('type', 'info')->orderBy('created_at','Desc')->first(); @endphp
                {{$info ? $info['title'] : null}}
            </marquee></div>
          <div class="col-3" id="times">
            <div class=" text-white">{{\Carbon\Carbon::Now()->format('l, d F Y')}}</div> 
          </div>
        </div>
         
        </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand" onclick="playWellcome()" id="SWellcome">
            <a href="#">OPUSNUSANTARA</a>
          </div>
          <audio id="TxtWellcome">
              <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=en&q={{str_replace(' ','+','Hi , Wellcome to Opusnusantara , Keep Smile Today')}}+" type="audio/mpeg">
              Your browser does not support the audio tag.
          </audio>
          <script>
          var x = document.getElementById("TxtWellcome"); 
          function playWellcome() { 
            x.play(); 
          } 
          </script>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{Date('Y')}}</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">MENU</li>
            <li><a class="nav-link" href="/v2/home"><i class="fas fa-home" aria-hidden="true"></i> <span>Home</span></a></li>
            @if(\Auth::user()->email == 'organizer@gmail.com')
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Organizer</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/organizer/lomba">Lomba</a></li>
                <li><a class="nav-link" href="/v2/content/new">News</a></li>
                <li><a class="nav-link" href="/v2/gallery/new">Gallery</a></li>
              </ul>
            </li>
            <li><hr></li>
            @endif
            <!-- <li><a class="nav-link" href="/v2/streaming"><i class="far fa-play-circle" aria-hidden="true"></i> <span>Streaming</span></a></li> -->
            <li><a class="nav-link" href="/v2/myregister">&nbsp;&nbsp; <i class="md md-assignment-ind" aria-hidden="true"></i> <span>My Registration</span></a></li>
            <li><a class="nav-link" href="/v2/live"><i class="far fa-play-circle" aria-hidden="true"></i> <span>Streaming</span></a></li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>News</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/v2/news/latest">Latest</a></li>
                <li><a class="nav-link" href="/v2/news/all">All News</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-images"></i><span>Gallery</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" id="foto-1">Competition</a></li>
                <li><a class="nav-link" id="foto-2">Education</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Others</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/v2/password/update">Change Password</a></li>
                <li><a class="nav-link" id="Question">Question</a></li>
                <li><a class="nav-link" href="#map">Contant Support</a></li>
                <li><a class="nav-link" href="#table-1">About</a></li>
              </ul>
            </li>
          </ul>

          @if(\Auth::user())
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="/logout" method="post">
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split">
              &nbsp;<i class="fas fa-user"></i>{{strtoupper('L O  G O U T')}}
            </button>
            </form>
          </div>
          @else
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/v2/login" class="btn btn-primary btn-lg btn-block btn-icon-split">
              &nbsp;<i class="fas fa-user"></i>{{strtoupper('L O G I N')}}
            </a>
          </div>
          @endif
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            @yield('content')
            
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; OPUSNUSANTARA</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div> 
  <form class="modal-part" id="modal-login-part">
    <p>Respon akan kami sampaikan melalui whatsapp</p>
    <div class="form-group">
    <label>Whatsapp</label>
    <div class="input-group">
        <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="fa fa-whatsapp"></i>
        </div>
        </div>
        <input id="modal-whatsapp" type="number" class="form-control" placeholder="Whatsapp" name="whatsapp">
    </div>
    </div>
    <div class="form-group">
    <label>Question</label>
    <div class="input-group">
        <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="">...</i>
        </div>
        </div>
        <textarea name="question" id="modal-pertanyaan" class="form-control"></textarea>
    </div>
    </div>
    <div class="form-group mb-0">
    
    </div>
  </form>

  <!-- General JS Scripts -->
  <script src="/stisla/assets/modules/popper.js"></script>
  <script src="/stisla/assets/modules/tooltip.js"></script>
  <script src="/stisla/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/stisla/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/stisla/assets/modules/moment.min.js"></script>
  <script src="/stisla/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <!-- <script src="/stisla/assets/modules/prism/prism.js"></script> -->
@yield('js')
  <!-- Page Specific JS File -->

  <script>

  $("#foto-1").fireModal({title: 'Gallery Of Competition',body: '<form method="post" action="/v2/gallery/competition">{{csrf_field()}}<div class="row no-gutter"><div class="col-md-9"><select name="lomba_id" class="form-control select-inline"><option value="">--- Select Competition ---</option> @foreach($lomba_competition as $data) <option value="{{$data->id}}">{{$data->name}}</option> @endforeach</select></div><div class="col-md-3"><button class="btn btn-primary btn-inline btn-block" type="submit">Show</button></div></div></form>', center: true});

  $("#foto-2").fireModal({title: 'Gallery Of Education',body: '<form method="post" action="/v2/gallery/education">{{csrf_field()}}<div class="row no-gutter"><div class="col-md-9"><select name="lomba_id" class="form-control select-inline"><option value="">--- Select Education ---</option> @foreach($lomba_education as $data) <option value="{{$data->id}}">{{$data->name}}</option> @endforeach</select></div><div class="col-md-3"><button class="btn btn-primary btn-inline btn-block" type="submit">Show</button></div></div></form>', center: true});

  $("#Question").fireModal({
  title: 'Question',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  onFormSubmit: function(modal, e, form) {
    // Form Data
    let form_data = $(e.target).serialize();
    console.log(form_data); 
    var wa = $('#modal-whatsapp').val();
    var quest = $('#modal-pertanyaan ').val();
    var _token = $('input[name="_token"]').val();
    console.log(wa);
    $.ajax({
        url :"/v2/api/question",
        method : "POST",
        data :{
            _token:_token,
            wa:wa,
            quest :quest,
            
        }, success:function(result){
            console.log(result);
        }
        
    }); 
    // DO AJAX HERE
    let fake_ajax = setTimeout(function() {
      form.stopProgress();
      modal.find('.modal-body').prepend('<div class="alert alert-info">Thanks for question. </div>')

      clearInterval(fake_ajax);
    }, 1500);

    e.preventDefault();
  },
  shown: function(modal, form) {
    console.log(form)
  },
  buttons: [
    {
      text: 'Submit',
      submit: true,
      class: 'btn btn-primary btn-shadow',
      handler: function(modal) {
      }
    }
  ]
});

  </script>

  <!-- Template JS File -->
  <script src="/stisla/assets/js/scripts.js"></script>
  <script src="/stisla/assets/js/custom.js"></script>
</body>
</html>
