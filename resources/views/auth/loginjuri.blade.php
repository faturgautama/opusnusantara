<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="/assets/images/favicon_1.ico">

    <title>Opus Nusantara</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="/assets/js/modernizr.min.js"></script>

</head>
<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="card-box">
            <div class="panel-heading">
                <h4 class="text-center"> Sign In to <strong class="text-custom">
                @if($email=='juri1@gmail.com')
                Juri 1
                @endif
                @if($email=='juri2@gmail.com')
                Juri 2
                @endif
                @if($email=='juri3@gmail.com')
                Juri 3
                @endif
                
                </strong></h4>
            </div>


            <div class="p-20">
                <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <div class="col-12">
                        @if($email == 'juri1@gmail.com')
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" required name="email" placeholder="E-Mail Address" value="juri1@gmail.com" required autofocus>
                        @endif
                        @if($email =='juri2@gmail.com')
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" required name="email" placeholder="E-Mail Address" value="juri2@gmail.com" required autofocus>
                        @endif
                        @if($email == 'juri3@gmail.com')
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" required name="email" placeholder="E-Mail Address" value="juri3@gmail.com" required autofocus>
                        @endif
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            @if($email == 'juri1@gmail.com')
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="rahasia" required placeholder="Password">
                            @endif
                            @if($email == 'juri2@gmail.com')
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="rahasia" required placeholder="Password">
                            @endif
                            @if($email == 'juri3@gmail.com')
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="rahasia" required placeholder="Password">
                            @endif
                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                type="submit">Login
                            </button>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-10">
                        <div class="col-12">
                            <a class="btn btn-block text-uppercase waves-effect waves-light"
                                href="/register" style="background-color: #eb4026;color:  white;">Register
                            </a>
                        </div>
                    </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-12">
                        <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot
                        your password?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="/register" class="text-primary m-l-5"><b>Sign Up</b></a>
            </p>

        </div>
    </div>

</div>




<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/detect.js"></script>
<script src="/assets/js/fastclick.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/jquery.blockUI.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/jquery.nicescroll.js"></script>
<script src="/assets/js/jquery.scrollTo.min.js"></script>

<script src="/assets/js/jquery.core.js"></script>
<script src="/assets/js/jquery.app.js"></script>


</body>
</html>