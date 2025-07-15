<?php
include "../db.php";
include "./Navbar.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];   
}

// Handle update
if(isset($_POST['update'])){
    $itmname = $_POST['itemname'];
    $itemdes = $_POST['itemdes'];
    $date = $_POST['date'];
    $course = $_POST['course'];
    $img = "";

    // Handle new image upload if provided
    if(isset($_FILES['img']) && $_FILES['img']['error'] == 0){
        $img = basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $img);
    } else {
        // Fallback to previous image name if not updated
        $img = $_POST['old_img'];
    }

    // Simple update query
    $sql1 = "UPDATE item SET Itm_Name='$itmname', Itm_Des='$itemdes', Itm_Date='$date', Itm_Img='$img', C_ID='$course' WHERE Itm_ID='$id'";
    mysqli_query($conn, $sql1);
    header('location:aitemlist.php');
    exit();
}

// Load item data for editing
$sql2 = "SELECT * FROM item WHERE Itm_ID = '$id'";
$res2 = mysqli_query($conn, $sql2);
$data = mysqli_fetch_assoc($res2);
?>


        <!-- Main Content -->
        <div class="col-lg-10 px-4 py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Edit Item</h3>
            </div>
            <div class="container-form" style="max-width:600px;">
                <form id="userForm" class="w-50 ms-5" method="post" enctype="multipart/form-data">
                    <div class="form-group m-3">
                        <label for="itemname" class="form-label fw-semibold">Item Name</label>
                        <input id="itemname" type="text" name="itemname" value="<?php echo $data['Itm_Name'];?>" class="form-control border-2 border-black p-2" placeholder="Itm-name.." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="itemdes" class="form-label fw-semibold">Item Description</label>
                        <input id="itemdes" type="text" name="itemdes" value="<?php echo $data['Itm_Des'];?>" class="form-control border-2 border-black p-2" placeholder="Itm-des.." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="date" class="form-label fw-semibold">Date</label>
                        <input id="date" type="date" name="date" value="<?php echo $data['Itm_Date'];?>" class="form-control border-2 border-black p-2" placeholder="Itm-date.." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="img" class="form-label fw-semibold">Image</label>
                        <input type="file" name="img" class="form-control border-2 border-black p-2" id="img">
                        <!-- Display current image name as fallback -->
                        <input type="hidden" name="old_img" value="<?php echo $data['Itm_Img']; ?>">
                        <?php if($data['Itm_Img']){ ?>
                            <img src="../img/<?php echo htmlspecialchars($data['Itm_Img']);?>" width="100px" alt="Current Image">
                        <?php } ?>
                    </div>
                    <div class="form-group m-3">
                        <label for="course" class="form-label fw-semibold">Course</label>
                        <select name="course" id="course" class="form-select form-select-lg border-2 border-black p-2" required>
                            <option value="">Choose Course</option>
                            <?php
                                $sql = "SELECT * FROM course";
                                $res = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($res)){
                                    $selected = ($row['C_ID'] == $data['C_ID']) ? "selected" : "";
                                    echo "<option value=\"{$row['C_ID']}\" $selected>{$row['C_Name']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="update" class="btn btn_add mt-3 px-4" value="Update">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>