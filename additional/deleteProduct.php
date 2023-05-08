<?php
include_once('config.php');


// Check if product ID is provided
if (!isset($_POST['id'])) {
  header('Location: index.php');
  exit();
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to delete product by ID
$stmt = $conn->prepare("DELETE FROM produits WHERE num = ?");
$stmt->bind_param("i", $_POST['id']);

// Execute SQL statement
$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect back to home page
header('Location: ../index.php');
exit();
?>