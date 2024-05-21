<?php
$servername = "localhost";

$password = "";
$dbname = "dp1";
$conn = mysqli_connect("localhost", "root", "", "dp1");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $name =  $_POST['email'];
        $pass = $_POST['psw'];
        $re_pass =  $_POST['passre'];

         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO form2  VALUES ('$name', 
            '$pass','$re_pass')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 
 
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
  ?>