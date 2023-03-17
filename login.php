<?php
// Start session
session_start();

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$usernname = $_POST['username'];
$passwword = $_POST['password'];

// Check if user exists and password is correct
$sql = "SELECT * FROM users WHERE username='$usernname' AND password='$passwword'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Set session variables
  $_SESSION['usernname'] = $usernname;
  $_SESSION['loggedin'] = true;

  // Redirect to home page
  header('Location: home.php');
} else {
  echo "Invalid username or password";
}

mysqli_close($conn);
?>
