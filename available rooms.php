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

$sql = "SELECT id, categories, details, price_per_day, min_booking, max_booking, image FROM house_crud";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Rooms</title>
<style>
    h1{
    margin: left;
}
.pro a {
     color: white;
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
    color:white;
    padding: 32px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    align-items: center;
    flex-direction: row;
}

.bordered {
    border: 2px solid white;
    padding: 3px 5px;
    background-color:gray;
  }
#home{
    color:white;
}
#register{
    border: 1px solid white;
}
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }
    .popup img {
        max-width: 90%;
        max-height: 90%;
    }
    .popup .close {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }
</style>
</head>
<body>
<script src="book1.js"></script>
<script src="book2.js"></script>

<div class="bordered">
    <div class="project">
        <h1>Guest Room Booking</h1>
        <div class="pro">
            <a href="homepage1.html" id="home">Home</a>
            <a href="create.php" id="Help">Add Rooms</a>
            </div>
            </div>
<table>
    <tr>
        <th>ID</th>
        <th>Room Categories</th>
        <th>Room Details</th>
        <th>Price/Day (in Rupees)</th>
        <th>Minimum Booking Period</th>
        <th>Maximum Booking Period</th>
        <th>Room Image</th>
      
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
            echo "<tr>
            
            <td style='color: white;'>{$row['id']}</td>
            <td style='color: white;'>{$row['categories']}</td>
            <td style='color: white;'>{$row['details']}</td>
            <td style='color: white;'>{$row['price_per_day']}</td>
            <td style='color: white;'>{$row['min_booking']}</td>
            <td style='color: white;'>{$row['max_booking']}</td>
            <td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' height='100' width='100' alt='" . $row['categories'] . "' onclick='showPopup(this.src)' /></td>
            <td><button class='butt' onclick='openBookingForm()'>Book Room</button></td>
          </tr>";
        }
      
    } else {
        echo "<tr><td colspan='9'>No rooms found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<div class="popup" id="popup">
    <span class="close" onclick="closePopup()">&times;</span>
    <img id="popup-img" src="">
</div>

<script>
    function showPopup(src) {
        document.getElementById('popup-img').src = src;
        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>
    <link rel="stylesheet" href="book1.css">
</head>
<body>
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap"
    rel="stylesheet"
  />
  
  
  <link rel="stylesheet" href="booking form .css">
 
  <title>single room</title>
</head>





<div id="bookingForm" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeBookingForm()">&times;</span>
    <h2>Book</h2>
    <form action="book.php" method="post">
        <div class="elem-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" size="50" placeholder="Your Name" pattern=[A-Z\sa-z]{3,20} required>
        </div>
        <div class="elem-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" placeholder="mail@email.com" required>
        </div>
        <div class="elem-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="contact" placeholder="" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
        </div>
        <hr>
        <div class="elem-group inlined">
          <label for="adult">Adults</label>
          <input type="number" id="adult" name="adults" placeholder="" min="1" required>
        </div>
        <div class="elem-group inlined">
          <label for="child">Children</label>
          <input type="number" id="child" name="children" placeholder="" min="0" required>
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Check-in Date</label>
          <input type="date" id="checkin-date" name="check_in_date" required>
        </div>
        <div class="elem-group inlined">
          <label for="checkout-date">Check-out Date</label>
          <input type="date" id="checkout-date" name="check_out_date" required>
        </div>
        <div class="elem-group">
            <label for="name">No.of.days stay</label>
            <input type="number" id="name" name="total_stays" placeholder="" pattern=[A-Z\sa-z]{3,20} required>
              
        </div>
        <div class="elem-group">
            <label for="name">Room preference</label>
            <input type="text" id="name" name="room_preference" placeholder="eg:single rom,double.." pattern=[A-Z\sa-z]{3,20} required>
        <br>  
         <center><button class="but" type="submit">Book The Room</button></center>  
        </div>
        <hr>
      
      <center></center>  
      </form>
  </div>
</div>

<script src="book1.js"></script>
<script src="book2.js"></script>
</body>
</html>
