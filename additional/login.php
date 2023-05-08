<?php
// Start session
session_start();

// Include config file
require_once('config.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get input data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare SQL statement to retrieve user data
  $stmt = $conn->prepare("SELECT id, type, nom_utilisateur, contact FROM utilisateurs WHERE email=? AND mdp=?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if user exists and password is correct
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['nom_utilisateur'];
    $_SESSION['type'] = $row['type'];
    $_SESSION['contact'] = $row['contact'];

    // Check if session data already exists in database
    $session_id = session_id();
    $stmt = $conn->prepare("SELECT * FROM sessions WHERE session_id=?");
    $stmt->bind_param("s", $session_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
      // Session data doesn't exist in database, insert it
      $user_id = $row['id'];
      $username = $row['nom_utilisateur'];
      $type = $row['type'];
      $contact = $row['contact'];
      $stmt = $conn->prepare("INSERT INTO sessions (session_id, user_id, username, type, contact) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $session_id, $user_id, $username, $type, $contact);
      $stmt->execute();
    }

    // Set cookie with user's ID
    setcookie('user_id', $row['id'], time() + (86400 * 30), '/'); // 86400 = 1 day

    // Redirect to main page
    header('Location: ../index.php');
    exit();
  } else {
    // User not found or password is incorrect
    $error = "Email or password is incorrect.";
    header("Location: ../html/login.php?error=".urlencode($error));
    exit();
  }
}
?>
