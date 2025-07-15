<?php

include "../db.php";
include "./Navbar.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get existing data
    
}

if (isset($_POST['update'])) {
    $itemdes = $_POST['itemdes'];
    
    $sql = "UPDATE instruction SET Ins_Des = '$itemdes' WHERE Ins_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    header('location:instruction.php');
}

?>

<?php

$sql = "SELECT * FROM ingredient WHERE Ing_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);

?>

<!-- Main Content -->
   <div class="col-lg-10 px-4 py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Instruction</h3>
            </div>
            <div class="container-form" style="max-width:600px;">

            <?php
              
               $sql1 = "select * from instruction where Ins_ID='$id'";
               $res1 = mysqli_query($conn,$sql1);
               $row = mysqli_fetch_assoc($res1);
            
            ?>
               
                <form id="userForm" autocomplete="off" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="itemdes" class="form-label fw-semibold">Ins-Description</label>
                        <textarea id="itemdes" value="<?php echo $row['Ins_Des'];?>" name="itemdes"  class="form-control border-2 border-black p-2" rows="2" placeholder="Itm-Description.." required></textarea>
                    </div> 
                    <div>
                        <input type="submit" name="update" value="Update" class="btn btn_add mt-2 px-4 py-2">
                    </div>
                </form>
            </div>
    
    </div>        
