<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $conn = mysqli_connect("localhost", "root", "", "guest_room_booking");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO bookings (name,email,contact,adults,children,check_in_date,check_out_date,total_stays,room_preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssiiissis", $name, $email, $contact, $adults, $children, $check_in_date, $check_out_date, $total_stays,$room_preference);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $total_stays = $_POST['total_stays'];
    $room_preference = $_POST['room_preference'];

    if ($stmt->execute()) {
        $success_message = "Booking Successful! Thank you for choosing our room.";
    } else {
        $error_message = "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1{
      font-family: 'Kaushan Script', cursive;
    font-size:4em;
    letter-spacing:3px;
    color:#1a821d;
    margin:0;
    margin-bottom:20px;
    align-items: center;
    justify-content: center;
  }

        .success-message, .error-message {
            text-align: center;
            margin-top: 20px;
        }

        .success-message {
            margin:0;
    font-size:1.3em;
    color:#aaa;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing:1px;
        }
        .go-home a
    {text-decoration: none;
        color: white;} 
        .go-home{
    color:#fff;
    background:#1a821d;
    border:none;
    padding:10px 50px;
    margin:30px 0;
    border-radius:30px;
    text-transform:capitalize;
    box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
    align-items: center;
    justify-content: center;
  }
        .error-message {
            color: #f44336;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Booking Succesfully</h1>
    
    <?php if (isset($success_message)) : ?>
        <p class="success-message"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <?php if (isset($error_message)) : ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <!-- Booking form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Form fields go here -->
       
    </form>

</div>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
<center> <button class="go-home">
                <a href="homepage1.html" id="home">Go home</a>
            </button></center>
</body>
</html>
