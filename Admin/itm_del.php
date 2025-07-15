<?php

include "../db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM item WHERE Itm_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    header("location:aitemlist.php");
}

?>