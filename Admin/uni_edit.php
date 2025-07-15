<?php

include "../db.php";
include "./Navbar.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['update'])) {
    $uname = $_POST['uname'];
    
    
    $sql1 = "UPDATE unit SET Uni_Name = '$uname' WHERE Uni_ID = '$id'";
    $res1 = mysqli_query($conn, $sql1);
    
    header('location:unit.php');
}

?>


<div class="col-lg-10">
            
              <div class="row">

              <?php
    // Corrected: use $id variable
    $sql = "SELECT * FROM unit WHERE Uni_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);
    ?>
                 <h3 class="p-4">Unit</h3>

                 <form id="userForm" class="w-50 ms-5" method="post">
                    <div class="form-group m-3">
                        <label for="name">Name:</label>
                        <input id="name" type="text" name="uname"  value="<?php echo $data['Uni_Name'];?>" class="form-control border-2 border-black p-2" placeholder="Uni_name..." required>
                    </div>
                    <button type="submit" name="update" class="btn btn_add mt-3 px-4">Update</button>
                </form>


               

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>