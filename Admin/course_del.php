<
<?php

include "../db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM course WHERE C_ID = '$id'";
    $res = mysqli_query($conn,$sql);
    header('location:acourselist.php');

}


?>