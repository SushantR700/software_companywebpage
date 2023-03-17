<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit;
}

// Get username from session variable
$usernname = $_SESSION['usernname'];

// Display welcome message
echo "Welcome, $usernname!";
?>
