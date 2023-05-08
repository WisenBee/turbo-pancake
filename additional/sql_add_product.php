
<?php

session_start();

$user_id = (int) $_SESSION['user_id'];

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["product-name"];
    $description = $_POST["product-description"];
    $price = (double) $_POST["product-price"];
    $image_url = $_POST["product-image"];
    $details = $_POST["product-details"];

    $sql = "INSERT INTO produits (nom, description_simple, prix, url, description,owner) VALUES ('$name', '$description', $price, '$image_url', '$details', $user_id)";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);