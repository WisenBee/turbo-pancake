<?php

require_once('config.php');

// Check if account already exists
$email = $_POST["email"];
$exist = 0;

$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $error = "Account already exists.";
    header("Location: ../html/signup.php?error=".urlencode($error));
    exit();
} else {
    // Create account in databases
    $phone_number = $_POST["number"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    $sql = "INSERT INTO utilisateurs (email, contact, nom_utilisateur, mdp) VALUES ('$email', '$phone_number', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();

if($exist==0){header('Location: ../index.php');}


?>