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
		<script src="/assets/js/jquery.min.js"></script>
		<style>
			.card-box{
				box-shadow: 3px 4px 5px 0px #a09b9b !important;
			}
			.account-pages{
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-image: url(/image/bglogin1.jpg);
				transition: 1.5s linear;
				-moz-transition: 1.5s linear;
			}
			.btn{
				box-shadow: 2px 3px 3px 0px #a09b9b !important;
				transition: box-shadow 0.2s;
			}
			.btn:hover{
				box-shadow: 0px 0px 0px 0px #a09b9b !important;
			}
			input:focus{
				box-shadow: 2px 3px 3px 0px #a09b9b !important;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
			var bg=[0,1,2];
			var index=1;
			setInterval(function(){
			index=(index + 1) % bg.length;
			$('.account-pages').css('background-image','url("/image/bglogin'+index+'.jpg")');
			},5000);
			});
		</script>
	</head>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class="card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Sign Up to <strong class="text-custom">OpusNusantara</strong> </h3>
				</div>

				<div class="p-20">
					<form class="form-horizontal m-t-20" action="{{ route('register') }}" method="POST">
                        @csrf
						<div class="form-group ">
							<div class="col-12">
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" value="{{ old('name') }}" required autofocus placeholder="Name" name="name">
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

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

						<div class="form-group">
							<div class="col-12">
								<input class="form-control" type="text" required="" placeholder="No. Telp" name="nohp">
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-12">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
									Register
								</button>
							</div>
						</div>

					</form>

				</div>
				<div class="row">
					<div class="col-12 text-center">
						<p>
							Already have account?<a href="/login" class="text-primary m-l-5"><b>Sign In</b></a>
						</p>
					</div>
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