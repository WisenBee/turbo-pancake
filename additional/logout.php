<?php
// Start session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Delete session cookie
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}

header("Cache-Control: no-cache, must-revalidate");
