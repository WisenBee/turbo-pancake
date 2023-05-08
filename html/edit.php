<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/edit.css">
</head>
<body>
	

	<?php
		// Include config file
		include_once('../additional/config.php');

		// Check if product ID is provided
		if (!isset($_GET['id'])) {
			header('Location: ../index.php');
			exit();
		}

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Prepare SQL statement to retrieve product by ID
		$stmt = $conn->prepare("SELECT * FROM produits WHERE num = ?");
		$stmt->bind_param("i", $_GET['id']);

		// Execute SQL statement
		$stmt->execute();

		// Get result set
		$result = $stmt->get_result();

		// Check if product exists
		if ($result->num_rows == 0) {
			header('Location: ../index.php');
			exit();
		}

		// Get product information
		$product = $result->fetch_assoc();
	?>

	<form method="post" action="../additional/sql_edit.php">
	<h1>Edit Product</h1>
		<input type="hidden" name="product-id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
	  
		<label for="product-name">Product Name:</label>
		<input type="text" id="product-name" name="product-name" required value="<?php echo htmlspecialchars($product['nom']); ?>"><br>
	  
		<label for="product-description">Product Description:</label>
		<input type="text" id="product-description" name="product-description" value="<?php echo htmlspecialchars($product['description_simple']); ?>"><br>
	  
		<label for="product-details">Product Details:</label>
		<textarea id="product-details" name="product-details"><?php echo htmlspecialchars($product['description']); ?></textarea><br>
	  
		<label for="product-price">Price:</label>
		<input type="number" id="product-price" name="product-price" step="0.01" required value="<?php echo htmlspecialchars($product['prix']); ?>"><br>
	  
		<label for="product-image">Image:</label>
		<input type="text" id="product-image" name="product-image" value="<?php echo htmlspecialchars($product['url']); ?>"><br>

        <label for="product-image-preview">Image Preview:</label>
		<img id="product-image-preview" src="../images/<?php echo htmlspecialchars($product['url']); ?>"><br>

	  
		<input type="submit" value="Update Product">
	</form>

	<script src="app.js"></script>
</body>
</html>
