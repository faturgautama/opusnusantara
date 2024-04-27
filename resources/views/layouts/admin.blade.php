
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E-Absensi OPUSNUSANTARA &mdash; 2019</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/stisla/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/stisla/assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/stisla/assets/css/style.css">
  <link rel="stylesheet" href="/stisla/assets/css/components.css">
  @yield('css')
<!-- Start GA -->/
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="/stisla/assets/modules/jquery.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
            <div class="login-brand">
              <h1 class="text-center">ABSENSI PESERTA</h1>
            </div>

            @yield('content')
            
            <div class="simple-footer text-center">
              Copyright &copy; OPUSNUSANTARA
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  
  <script src="/stisla/assets/modules/popper.js"></script>
  <script src="/stisla/assets/modules/tooltip.js"></script>
  <script src="/stisla/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/stisla/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/stisla/assets/modules/moment.min.js"></script>
  <script src="/stisla/assets/js/stisla.js"></script>
  <script>
    function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
    }
  </script>
  <!-- JS Libraies -->
  <script src="/stisla/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="/stisla/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="/stisla/assets/js/page/auth-register.js"></script>
  @yield('js')
  <!-- Template JS File -->
  <script src="/stisla/assets/js/scripts.js"></script>
  <script src="/stisla/assets/js/custom.js"></script>
</body>
</html>