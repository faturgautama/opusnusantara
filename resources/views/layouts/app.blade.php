<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <!--Start of Tawk.to Script-->

    <link rel="stylesheet" href="/css/shepherd-theme-arrows.css" />


    <style>
      html {
          position: relative;
          min-height: 100%;
      }
      body {
          margin: 0 0 60px; /* bottom has to be the same as footer height */
      }
       .link-navbar{
          color: #343a40;

        }

        .link-navbar:hover{
          text-decoration: none;
          color: #b3b3b3!important;
        }

        footer {
            /* just for demo */
            /* background-color: #F8F8F8;
            border-top: 1px solid #E7E7E7;
            text-align:center;
            padding:20px; */
          /* just for demo */

            /* position: absolute;
            left: 0;
            bottom: 0;
            height: 60px;
            width: 100%; */
        }
    </style>
    @yield('css')

    <title>OPUS NUSANTARA</title>
  </head>
  <body>
    <header>

          <nav class="navbar navbar-expand-lg navbar-light bg-white">

            <a href="/" class="navbar-brand">
              <img src="/image/logo.png" style="max-width:225px;" class="img-fluid" alt="Responsive image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="/news">News</a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a class="nav-link" href="/gallery">Gallery</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/lombaku">My Registration</a>
                </li>
                <li class="nav-item">
                <div class="d-block d-lg-none">
                  @if(Auth::check())
                    <a class="nav-link" href="/logout">Logout </a>
                  @else
                    <a class="nav-link" href="/login">Login </a>
                  @endif
                </div>
              </li>

              </ul>
              <div class="d-none d-lg-block">
                  @if(Auth::check())
                    <a class="btn btn-outline-danger" href="/logout">Logout </a>
                  @else
                    <a class="btn btn-outline-primary" href="/login">Login </a>
                  @endif

              </div>
            </div>
        </nav>



      </header>

      <main role="main">
      <div class="bg-light">
        @yield('content')
      </div>
      </main>



      <footer class="text-muted">
        <br>
        <div class="container">
          <p class="float-right">
            <a href="#">Back to top</a>
          </p>
          <p>© Copyright OPUS NUSANTARA 2018</p>
        </div>
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/js/jquery.min.js" ></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/js/pdfobject.min.js"></script>
    <script src="/js/tether.min.js"></script>
    <script src="/js/shepherd.min.js"></script>
    @yield('js')
  </body>
</html>
