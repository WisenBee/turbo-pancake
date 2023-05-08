<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="/css/Login.css">
</head>

<body>
<div class="hero">
		<nav>
			<h2 class="logo">Siry<span> Shop</span></h2>
			<ul class="navigation">
				<li><a href="/index.php">Home</a></li>
				<li><a href="/html/aboutUs.html">About US</a></li>
				<li><a href="#prdct">Product</a></li>
				<li><a href="/html/contactUs.html">Contact us</a></li>
			</ul>

			<div>
				<h2 id="userWelcome" class="logo"></h2>
			</div>
			<div id="btdiv">
			<button id="log" type="button" onclick=" location.reload();location.href='/html/login.php'; return false;">Login</button>
				<button id="sign" onclick= "location.reload();location.href='/html/signup.php'; return false;">SignUp</button>
			</div>
        </nav>
	<div class="login-box">
		<h1>Login</h1>
		<form method="post" action="../additional/login.php">
		<div class="inputBox">
			<input type="text" id="email" name="email">
			<span>Email</span>
		</div>
		
		<div class="inputBox">
			
			<input type="password" id="password" name="password" >
			<span>Password</span>
		</div>

			<input type="submit" value="Login">
		</form>
		<div class="extra">
			<br>
			<a href="signup.php">don't have an account?</a>
			<br>
			<br>
			<?php
			if(isset($_GET['error'])) {
				$error = $_GET['error'];
				echo '<div id="error-message">' . $error . '</div>';
			}
		?>
		</div>
	</div>
	
</body>

</html>
