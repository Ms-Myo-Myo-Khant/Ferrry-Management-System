<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ferry Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/bus.png">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<link rel="stylesheet" type="text/css" href="css/utilloginlanding.css">
	<link rel="stylesheet" type="text/css" href="css/mainloginlanding.css">
<!--===============================================================================================-->
</head>
<body>
	


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/ferryschool.jpg);background-position:0px -200px">
					<span class="login100-form-title-1">
						Login

					</span>
					
				</div>

				<form class="login100-form validate-form" method="post" action="login.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email" required="required">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<!-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div> -->
						<!-- remember me -->

						<div>
							<a href="forgotPassword.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>

					</div>

					<div class="backlink" style="display: block;float:left;width: 80%;height: 80%;margin-top: 60px;border-bottom: 1px solid gold;margin-left: -20px;padding-bottom: 20px;">
						<a href="landingpage.php" style="text-align:center;padding-bottom: 20px;"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back to FMS</a>
					</div>
				</form>

				
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="js/jquery-3.2.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>


	<script src="js/mainloginlanding.js"></script>
<!--===============================================================================================-->
</body>
</html>