<?php
include "../db.php";
include "./Navbar.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];   
}

if(isset($_POST['update'])){
    $cname = $_POST['cname'];
    $cdes = $_POST['cdes'];
    $cfees = $_POST['cfees'];
    $cdate = $_POST['cdate'];

    // Corrected: UPDATE spelling
    $sql1 = "UPDATE course SET C_Name = '$cname', C_Des = '$cdes', C_Fees = '$cfees', C_Date = '$cdate' WHERE C_ID = '$id'";
    $res1 = mysqli_query($conn, $sql1);
    header('location:acourselist.php');
}

?>



       <!-- admin add section -->
        <div class="col-lg-10">
            
              <div class="row">

                 <h3 class="p-4">Course List</h3>
    <?php
    // Corrected: use $id variable
    $sql = "SELECT * FROM course WHERE C_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);
    ?>
    <form id="userForm" class="w-50 ms-5 " method="post">
        <div class="form-group m-3">
            <!-- Corrected: show C_Name, not C_ID -->
            <input id="coursename" type="text" name="cname" value="<?php echo $data['C_Name'];?>" class="form-control border-2 border-black p-2" placeholder="course-name..." required>
        </div>
        <div class="form-group m-3">
            <input id="coursedes" type="text" name="cdes" value="<?php echo $data['C_Des'];?>" class="form-control border-2 border-black p-2" placeholder="course-description.." required>
        </div>
        <div class="form-group m-3">
            <input id="price" type="text" name="cfees" value="<?php echo $data['C_Fees'];?>" class="form-control border-2 border-black p-2" placeholder="fees" required>
        </div>
        <div class="form-group m-3">
            <input type="text" name="cdate" value="<?php echo $data['C_Date'];?>" class="form-control border-2 border-black p-2" id="date" placeholder="mm/dd/yyy">
        </div>
        <input type="submit" name="update" class="btn btn_add mt-3 px-4" value="Update New" >
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>