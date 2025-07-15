<?php

include "../db.php";
include "./Navbar.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM unit WHERE Uni_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    header("location:unit.php");
}


?>