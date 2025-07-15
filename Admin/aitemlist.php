<?php
include "../db.php";
include "./Navbar.php";

// Simple Insert Query
if(isset($_POST['add'])){
    $name = $_POST['itemname'];
    $des = $_POST['itemdes'];
    $date = $_POST['date'];
    $course = $_POST['course'];
    $img = "";

    // Basic image upload
    if(isset($_FILES['img']) && $_FILES['img']['error'] == 0){
        $img = basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $img);
    }

    // Simple query
    $sql = "INSERT INTO item (Itm_Name, Itm_Des, Itm_Date, C_ID, Itm_Img) VALUES ('$name', '$des', '$date', '$course', '$img')";
    mysqli_query($conn, $sql);
}
?>



        <!-- Main Content -->
        <div class="col-lg-10 px-4 py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Item List</h3>
            </div>
            <div class="container-form" style="max-width:600px;">
                <form id="userForm" autocomplete="off" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="itemname" class="form-label fw-semibold">Item Name</label>
                        <input id="itemname" name="itemname" type="text" class="form-control border-2 border-black p-2" placeholder="Itm-Name.." required>
                    </div>
                    <div class="mb-3">
                        <label for="itemdes" class="form-label fw-semibold">Item Description</label>
                        <textarea id="itemdes" name="itemdes" class="form-control border-2 border-black p-2" rows="2" placeholder="Itm-Description.." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label fw-semibold">Date</label>
                        <input type="date" class="form-control border-2 border-black p-2" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFileLg" class="form-label fw-semibold">Image</label>
                        <input class="form-control form-control-lg border-2 border-black p-2" id="img" name="img" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label fw-semibold">Course</label>
                        <select name="course" id="course" class="form-select form-select-lg border-2 border-black p-2" required>
                            <option value="">Choose Course</option>
                        <?php
                            $sql = "SELECT * FROM course";
                            $res = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                           <option value="<?php echo $row['C_ID'];?>"><?php echo $row['C_Name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="add" value="ADD NEW" class="btn btn_add mt-2 px-4 py-2">
                    </div>
                </form>
            </div>
            <!-- admin table section -->
            <div class="custom-table mt-4">
                <table class="table mb-0 table-hover table-bordered align-middle">
                    <thead class="bg_th">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Item ID</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT item.*, course.C_Name FROM item LEFT JOIN course ON item.C_ID = course.C_ID";
                        $res2 = mysqli_query($conn, $sql2);
                        $a=1;
                        while($data = mysqli_fetch_assoc($res2)){
                        ?>
                        <tr class="style_photo">
                            <td><?php echo $a++ ?></td>
                            <td><?php echo $data['Itm_ID'];?></td>
                            <td><?php echo $data['Itm_Name'];?></td>
                            <td><?php echo $data['C_Name'];?></td>
                            <td><?php echo $data['Itm_Des'];?></td>
                            <td>
                            <img src="../img/<?php echo htmlspecialchars($data['Itm_Img']);?>" width="100px" alt="">
                            </td>
                            <td><?php echo $data['Itm_Date'];?></td>
                            <td><a href="itm_edit.php?id=<?php echo $data['Itm_ID'];?>" type="submit" class="btn btn-secondary">Edit</a></td>
                            <td><a href="itm_del.php?id=<?php echo $data['Itm_ID'];?>" type="submit" class="btn btn-dark">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>