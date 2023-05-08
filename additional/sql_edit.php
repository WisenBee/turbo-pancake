<?php
include_once('config.php');

// Check if product ID is provided
if (!isset($_POST['product-id'])) {
  header('Location: ../html/login.php');
  exit();
}

// Prepare SQL statement to update product by ID
$stmt = $conn->prepare("UPDATE produits SET nom = ?, description_simple = ?, description = ?, prix = ?, url = ? WHERE num = ?");
$stmt->bind_param("sssdsi", $_POST['product-name'], $_POST['product-description'], $_POST['product-details'], $_POST['product-price'], $_POST['product-image'], $_POST['product-id']);

// Execute SQL statement
$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect back to home page
header('Location: ../index.php');
exit();
?>