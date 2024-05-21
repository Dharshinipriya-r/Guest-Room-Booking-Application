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


<div class="bordered">
    <div class="project">
        <h1>Guest Room Booking</h1>
        <div class="pro">
            <a href="homepage_house.html" id="home">Home</a>
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
        <th>Edit</th>
        <th>Delete</th>
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
            <td><a href='edit.php?id={$row['id']}' ' style='color: white; background-color: green; padding: 5px 10px; text-decoration: none; border-radius: 4px;'>Edit</a></td>
            <td><a href='delete.php?id={$row['id']}' ' style='color: white; background-color: blue; padding: 5px 10px; text-decoration: none; border-radius: 4px;'>Delete</></td>
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
