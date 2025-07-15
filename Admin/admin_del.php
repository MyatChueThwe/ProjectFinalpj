<?php

include "../db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="DELETE FROM admin WHERE Admin_ID='$id'";
    mysqli_query($conn, $sql);
    header('location: adminlist.php');
}

?>