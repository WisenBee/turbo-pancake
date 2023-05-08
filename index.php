<?php
include_once 'additional/config.php';
// Start session
session_start();
?>


<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" href="/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,500;0,600;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<script>
		function openPayMode() {
			window.location.href = "/html/payMode.html";
		}
	</script>
	<script src="/js/main.js"></script>

</head>



<body>

	<div class="hero">
		<nav>
			<h2 class="logo">Siry<span> Shop</span></h2>
			<ul class="navigation">
				<li><a href="index.php">Home</a></li>
				<li><a href="/html/aboutUs.html">About Us</a></li>
				<li><a href="#box">Product</a></li>
				<li><a href="/html/ContactUs.html">Contact us</a></li>
			</ul>

			<div>
				<h2 id="userWelcome" class="logo"></h2>
			</div>
			<div id="btdiv">
				<button id="log" type="button" onclick=" location.reload();location.href='/html/login.php'; return false;">Login</button>
				<button id="sign" onclick="location.reload();location.href='/html/signup.php'; return false;">SignUp</button>
			</div>

			<div class="toggle" onclick="toggleMenu();"></div>
		</nav>
		<div class="content">
			<div class="textBox">
				<h2> It's not just a Shop <br> it's <b> Siry </b>shop
				</h2>
				<p>
					Welcome to our online shop! We offer a wide range of high-quality
					products, from electronics and gadgets to fashion and home accessories. With fast shipping and
					excellent customer service, we're committed to providing you with the best shopping experience
					possible. Explore our collection today and find the perfect products to suit your needs and style.
				</p>
				<a href="#box">Explore Our Products</a>
			</div>
			<div class="imageBox">
				<img src="/images/product3.png" class="laptop">
			</div>
		</div>
	</div>



	<div class="section">
		<div class="container">
			<div id="box">
				<h1>Search</h1>
			<div class="search">
				<input type="text" id="searchBar" placeholder="Type...">
				<button id="searchBtn">Search</button>
			</div>
				
			</div>

			<div class="header">
				<h1>products</h1>
				<button id="add" onclick=" window.open('/html/addProduct.php'); return false;">Add Product</button>
			</div>

			<?php

			// Check if user is logged in
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
				// User is logged in
				$user_id = $_SESSION['user_id'];
				$type = $_SESSION['type'];
				$username = $_SESSION['username'];
				echo "<script>var user_id = " . json_encode($user_id) . "; var type = " . json_encode($type) . ";
			 			var username = " . json_encode($username) . ";
			 			LoggedIn(user_id, type, username);

			  			var searchButton = document.getElementById(\"searchBtn\");
			  			searchButton.onclick = function() {
						search(document.getElementById('searchBar').value, user_id, type);
			  			}
			 		</script>";
			} else {
				// User is not logged in (guest)
				echo "<script>
						notLoggedIn();
						var searchButton = document.getElementById(\"searchBtn\");
			  			searchButton.onclick = function() {
						search(document.getElementById('searchBar').value, 0, 'guest');
						}
					</script>";
			}

			?>

			<div class="products">


			</div>
		</div>

	</div>


	<footer class="footer">
		<div class="containers">
			<div class="row">
				<div class="footer-col">
					<h4>company</h4>
					<ul>
						<li><a href="/html/aboutUs.html">about us</a></li>
						<li><a href="/html/contactUs.html">Contact Us</a></li>
						<li><a href="#">privacy policy</a></li>
						
					</ul>
				</div>
				<div class="footer-col">
					<h4>get help</h4>
					<ul>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">shipping</a></li>
						<li><a href="#">returns</a></li>
						<li><a href="#">order status</a></li>
						<li><a href="#">payment options</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>online shop</h4>
					<ul>
						<li><a href="#box">watch</a></li>
						<li><a href="#box">bag</a></li>
						<li><a href="#box">shoes</a></li>
						<li><a href="#box">dress</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>follow us</h4>
					<div class="social-links">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>



	<script src="/js/all.min.js"></script>
	<script type="text/javascript">
		function toggleMenu() {
			var menuToggle = document.querySelector('.toggle');
			var navigation = document.querySelector('.navigation')
			menuToggle.classList.toggle('active')
			navigation.classList.toggle('active')

		}
	</script>

</body>


</html>