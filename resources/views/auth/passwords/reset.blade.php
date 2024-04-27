<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

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
					<h3 class="text-center"> Reset Password </h3>
				</div>

				<div class="p-20">
					<form class="form-horizontal m-t-20" method="POST" action="{{ route('password.request') }}">
                        @csrf

						<div class="form-group ">
							<div class="col-12">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" required="" value="{{ old('email') }}" placeholder="Email" name="email">
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-12">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" placeholder="Password" name="password">
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
                        </div>
                        
                        <div class="form-group">
							<div class="col-12">
								<input class="form-control" type="password" required="" placeholder="Confirm Password" name="password_confirmation">
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-12">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
									Reset
								</button>
							</div>
						</div>
					</form>
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
		<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5a83810fd7591465c707a4e8/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

	</body>
</html>