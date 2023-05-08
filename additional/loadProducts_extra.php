<?php
include_once('config.php');

// Check if session exists
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  $owner_number = $_SESSION['user_id'];
  $sql = "SELECT * FROM produits WHERE owner = $owner_number";
} else {
  $sql = "SELECT * FROM produits";
}

// Execute query and retrieve data
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

// Output data as JSON
echo json_encode($data);

$conn->close();
?>