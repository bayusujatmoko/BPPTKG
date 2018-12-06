<!DOCTYPE html>
<html lang="en">
<head>
	<title>BPPTKG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="new_bpptkg_dev/login/images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_devlogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="new_bpptkg_dev/login/css/main.css">
<!--===============================================================================================-->
<style>
	.wrap-login100{
		background-image: linear-gradient(to bottom, #2a3f54, #354b62, #415870, #4c667f, #58738e);
	}
	.login100-form-btn:hover{
		background-image: linear-gradient(to bottom, #3cdc6b, #44e072, #4ce579, #54e97f, #5bee86);
    cursor: pointer;
	}
	.login100-form-btn{
		background-image: linear-gradient(to bottom, #f2f3f4, #f2f3f4, #f2f3f4, #f2f3f4, #f2f3f4);
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('new_bpptkg_dev/login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="new_bpptkg_dev/base/proses/login.php">
					<span >
						<img class="login100-form-logo" src="new_bpptkg_dev/login/images/logo.png" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						BPPTKG
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" placeholder="Username" name="uname" name="form1" id="uname" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" placeholder="Password" name="password" value="<?php echo ''; ?>" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Ingat Saya
						</label>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="Masuk" class="login100-form-btn">
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Lupa Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/vendor/bootstrap/js/popper.js"></script>
	<script src="new_bpptkg_dev/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="new_bpptkg_dev/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="new_bpptkg_dev/login/js/main.js"></script>

</body>
</html>