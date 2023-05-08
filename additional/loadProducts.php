<?php
include_once('config.php');


$sql = "SELECT * FROM produits";


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
