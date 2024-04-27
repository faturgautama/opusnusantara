
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset Password &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/stisla/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/stisla/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/stisla/assets/modules/ionicons/css/ionicons.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/stisla/assets/css/style.css">
  <link rel="stylesheet" href="/stisla/assets/css/components.css">

  <style>
    .btn-circle{
        border-radius:30px;
    }
  </style>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <b>OPUSNUSANTARA {{date('Y')}}</b>
            </div>

            <div class="card card-primary">
            
              <div class="card-header" id="panel-header"><a href="/v2/home" class="btn btn-sm btn-primary btn-circle"><i class="ion-arrow-left-b" style="font-size:16px;"></i></a> &nbsp; <h4>Reset Password</h4></div>

              <div class="card-body" id="panel-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <!-- <form id="formPassword"> -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <i class="text-danger" id="infoEmail"></i>
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2"
required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                    <i id="infoPassword" class="text-danger"></i>
                  </div>
                  
                  {{csrf_field()}}

                  <div class="form-group">
                    <button id="btnReset" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                <!-- </form> -->
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; OPUSNUSANTARA
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="/stisla/assets/modules/jquery.min.js"></script>
  <script src="/stisla/assets/modules/popper.js"></script>
  <script src="/stisla/assets/modules/tooltip.js"></script>
  <script src="/stisla/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/stisla/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/stisla/assets/modules/moment.min.js"></script>
  <script src="/stisla/assets/js/stisla.js"></script>
  <script src="/js/axios.js"></script>
  <script>
    $('#btnReset').click(function(){
        if($('#email').val() != '{{\Auth::user()->email}}'){
            $('#infoEmail').html('&nbsp; Email not match !') ;
            $('#email').css('border-color','red');
        }
        if($('#email').val() == ''){
            $('#infoEmail').html('&nbsp; Email not empety !') ;
            $('#email').css('border-color','red');
        }
        if($('#password').val() == '' || $('#password-confirm').val() == ''){
            $('#infoPassword').html('&nbsp; Password not empety !') ;
            $('#password').css('border-color','red');
            $('#password-confirm').css('border-color','red');
        }
        if($('#password').val() !== $('#password-confirm').val()){
            $('#infoPassword').html('&nbsp; Password not match !') ;
            $('#password').css('border-color','red');
            $('#password-confirm').css('border-color','red');
        }
        if($('#email').val() == '{{\Auth::user()->email}}' && $('#password').val() === $('#password-confirm').val()){
            var password = $('#password-confirm').val();
            var _token = $('input[name="_token"]').val();
            // $.ajax({
            //     url :"/v2/password/new"password,
            //     method : "POST",
            //     data :{
            //         _token:_token,
            //         password:password,
                    
            //     }, success:function(result){
            //         console.log(result);       
            //     }
            // }); 
            axios.post('/v2/password/new/'password)
            .then(function(resp){
                console.log(resp);
                $('#panel-header').replaceWith('<div class="card-header"><h4 class="text-center">Password Change Succesfully. <br>Now <a href="/v2/home">click hire.</a></h4></div>');
                $('#panel-body').hide();
            })
            .catch(function(err){
                console.log(err);
            })
        }
    });
  </script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="/stisla/assets/js/scripts.js"></script>
  <script src="/stisla/assets/js/custom.js"></script>
</body>
</html>