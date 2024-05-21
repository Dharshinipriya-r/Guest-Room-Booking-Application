<?php


// Create connection
$conn = mysqli_connect("localhost", "root", "", "guest_room_booking");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from form
$login_username = $_POST['login_username'];
$login_password = $_POST['login_password'];

// Query database to check if user exists
$sql = "SELECT * FROM sign_in WHERE email='$login_username' AND password='$login_password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<script>alert('You have logged in successfully.');</script>";
 include("userinterface.html");
} else {
    include("incorrect.html");
}

$conn->close();
?>
