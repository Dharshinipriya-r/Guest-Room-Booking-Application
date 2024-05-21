<?php
// Establish connection to MySQL database

// Create connection
$conn = mysqli_connect("localhost", "root", "", "guest_room_booking");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from form
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

// Insert user into database
$sql = "INSERT INTO   house_sign_in(email,mobile, password) VALUES ('$email','$mobile', '$password')";

$query = "SELECT * FROM house_sign_in WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Email already exists, display error message
    echo "<script>alert('Email already exists. Please choose a different email.');</script>";
    include("homepage1.html");

    
} else if ($conn->query($sql) === TRUE) {
  
  echo "<script>alert('You have registered successfully. Redirected to the home page.');</script>";
  include("homepage1.html");

}
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
