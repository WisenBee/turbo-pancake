<?php
include_once('config.php');

// Retrieve search text from the query string
$searchText = $_GET['searchText'];

// Build SQL query with search text
$sql = "SELECT * FROM produits WHERE nom LIKE '%" . $searchText . "%'";

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