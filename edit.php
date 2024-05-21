<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guest_room_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM house_crud WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
    } else {
        echo "No room found with the given ID.";
        exit();
    }
} else {
    echo "No ID parameter provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categories = $_POST['categories'];
    $details = $_POST['details'];
    $price_per_day = $_POST['price_per_day'];
    $min_booking = $_POST['min_booking'];
    $max_booking = $_POST['max_booking'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "UPDATE house_crud SET categories='$categories', details='$details', price_per_day='$price_per_day', min_booking='$min_booking', max_booking='$max_booking', image='$image' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: display.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>House owner crud operation</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <header>
        <h1>Edit room</h1>
    </header>      </div>
    </nav> <div class="project"> <div class="pro">
    <a href="homepage_house2.html" id="home">Home</a>
            <a href="https://cartrabbit.io/" id="home">Help</a>
            <a href="display.php" id="home">Back</a></body></div></div>
    <style>
.pro a {
     color: black;
    text-decoration: none;
    text-transform: capitalize;
    transition: 0.3x;
    padding: 4px;
    border-radius: 2px;
    border:1px solid transparent;
    
    gap: 16px;
    flex-direction: row;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.project{
    color:#1a821d;
    padding: 32px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    align-items: center;
    flex-direction: row;
}

#home{
    color: black;
    font-weight: 300;
  
   }
   .container {
  width: 300px ;
  height: 100%;
  margin: 50px auto;
  background-color: #fff;
  margin-top: auto;
  border-radius: 5px;
  box-shadow: 0 0 30px black ;
 
}

#register{
    border: 1px solid #1a821d;
}
</style>
<link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<div class="container">
<main>
        <section id="room-form">
<form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
<label> Categories </label>
                <input type="text" id="room-name" placeholder="Room categories" name="categories" required>
                <label> Details </label>
                <input type="text" name="details" placeholder="Room details" class="form-control">
                <label> Price per day </label>
                <input type="number" name="price_per_day" id="rent-amount" placeholder="Rent Amount" required>
                <label> Minimum booking period </label>
                <input type="number" name="min_booking" id="min-booking-days" placeholder="Min Booking Days" required>
                <label> Maximum booking period</label>
                <input type="number" name="max_booking" id="max-booking-days" placeholder="Max Booking Days" required>
                <input type="file" name="image" id="image" required>
                <div class="button-container">
                    <button type="submit" name="submit" class="save-button">Save</button>
                    <button type="submit" name="cancel" href="display.php" class="cancel-button">Cancel</button>
                </div>
</form>
</section>
    </main></div>
</body>
</html>
