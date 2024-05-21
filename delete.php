<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `house_crud` where id=$id";
        $conn->query($sql);
    }
    header('location:/form/display.php');
    exit;
?>