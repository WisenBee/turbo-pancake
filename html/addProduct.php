<?php
include_once '../additional/config.php';
// Start session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/addProduct.css">

	<script src="/js/main.js"></script>
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
		  </script>";
} else {
	// User is not logged in (guest)
	echo "<script>notLoggedIn();</script>";
}

?>
<div class="addPrdct-box">
	<h1>Add Product</h1>

	<form method="post" action="../additional/sql_add_product.php">
		<label for="product-name">Product Name:</label>
		<input type="text" id="product-name" name="product-name" required><br>
	  
		<label for="product-description">Product Description:</label>
		<input type="text" id="product-description" name="product-description" ><br>
	  
		<label for="product-details">Product Details:</label>
		<textarea id="product-details" name="product-details" ></textarea><br>
	  
		<label for="product-price">Price:</label>
		<input type="number" id="product-price" name="product-price" step="0.01" required><br>
	  
		<label for="product-image">Image:</label>
		<input type="text" id="product-image" name="product-image" ><br>
	  
		<input type="submit" value="Add Product">
	</form>
</div>
	<script src="app.js"></script>
</body>
</html>