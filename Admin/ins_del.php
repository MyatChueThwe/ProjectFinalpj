<?php

include "../db.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM instruction WHERE Ins_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res) {
        header('location:instruction.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>