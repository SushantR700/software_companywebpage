<?php
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
$usernname = $_POST['name'];
$passwword = $_POST['ppassword'];
$email = $_POST['eemail'];

// Check if username already exists
$sql = "SELECT * FROM users WHERE username='$usernname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "Username already exists";
} else {
  // Insert new user into database
  $sql = "INSERT INTO users (username, password, email) VALUES ('$usernname', '$passwword', '$email')";
  if (mysqli_query($conn, $sql)) {
    echo "User registered successfully";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
