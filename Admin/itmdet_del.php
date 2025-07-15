<?php

include "../db.php";
include "./Navbar.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM itemdetail WHERE Ide_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header("location:itemdetail.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>