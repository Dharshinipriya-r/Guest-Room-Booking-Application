<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Guest room booking</title>
    <div class="bordered">
    <div class="project">
        <h1>Booked Rooms</h1>
        <div class="pro">
            <a href="homepage_house.html" id="home">Home</a>
            <a href="https://cartrabbit.io/" id="Help">Help</a>
            <a href="homepage_house.html" id="Help">Back</a>
            </div>
            </div>
  </head>
  <body>
 
  <style>*{
    margin:0 ;
    padding: 0;
    box-sizing: border-box;
}
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
    background-color: darkgray;
  }
#home{
    color:white;
}
#register{
    border: 1px solid white;
}</style>
    <!--table-->
    <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
      <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Total no.of Adults</th>
        <th>Total no.of Children</th>
        <th>Check-in-Date</th>
        <th>Check-out_Dte</th>
        <th>No.of days Stayed</th>
        <th>Room Preference</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from bookings";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[contact]</td>
        <td>$row[adults]</td>
        <td>$row[children]</td>
        <td>$row[check_in_date]</td>
        <td>$row[check_out_date]</td>
        <td>$row[total_stays]</td>
        <td>$row[room_preference]</td>

        <td>
                  <a class='btn btn-success' >Booked</a>
                 
                </td>
      </tr>
      ";
        }
        
      ?>
    </tbody>
  </table>
      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>