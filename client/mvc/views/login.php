<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link href="./mvc/assets/css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="login">
		<h1>Login</h1>
		<form action="login/loginAction" method="post">
			<label for="username">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="username" placeholder="Username" id="username" required>
			<label for="password">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="password" placeholder="Password" id="password" required>


			<div class="remember-row">
				<div class="ck">
					<input type="checkbox" value="remember-me">
					<span class="label-text">Remember me</span>
				</div>
				<div class="forgot">
					<p class="forgotPwd">
						<a class="lnk-toggler" href="forgotpassword.html">Forgot password?</a>
					</p>
				</div>
			</div>
			<input type="submit" value="Login">
			<div id="register">
				<span>Do you haven't account?</span> <a href="http://localhost:8080/Ecommerce-Website/client/registration/registration">Đăng ký</a>
			</div>
		</form>
	</div>
</body>

</html>