<!DOCTYPE html>
<html>
<head>
	<title>Sign up Page</title>
	<link rel="stylesheet" type="text/css" href="/css/signup.css">
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
		<h1>Sign up</h1>
		<form action="../additional/signup.php" method="POST">
			
			<div class="inputBox">
			<input type="email" id="email" name="email"  required>
			<span>Email</span>
			</div>

			<div class="inputBox">
			<input type="number" id="number" name="number"  required>
			<span>Phone number</span>
			</div>

			<div class="inputBox">
			<input type="text" id="username" name="username" required>
			<span>Username</span>
			</div>

			<div class="inputBox">
			<input type="password" id="password" name="password"  required>
			<span>Password</span>
			</div>

			<div class="inputBox">
			<input type="password" id="confPassword" name="confPassword"  required>
			<span>Confirm password</span>
			</div>

			<input type="submit" value="SignUp">
		</form>
		<div class="extra">
			<br>
			<a href="/html/login.php">Already a user?</a>
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
	<script>
		function checkPassword() {
			const password = document.getElementById("password");
			const confPassword = document.getElementById("confPassword");

			if (password.value !== confPassword.value) {
				confPassword.setCustomValidity("Passwords don't match");
			} else {
				confPassword.setCustomValidity("");
			}
		}

		document.getElementById("confPassword").addEventListener("input", checkPassword);
	</script>
</body>
</html>
