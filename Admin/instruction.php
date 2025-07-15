<?php
include ("../db.php");
include ("./Navbar.php");



?>

        <!-- Main Content -->
        <div class="col-lg-10 px-4 py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Instruction</h3>
            </div>
            <div class="container-form" style="max-width:600px;">
               
                <form id="userForm" autocomplete="off" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="itemdes" class="form-label fw-semibold">Ins-Description</label>
                        <textarea id="itemdes" name="itemdes" class="form-control border-2 border-black p-2" rows="2" placeholder="Itm-Description.." required></textarea>
                    </div>
                    <div>
                        <input type="submit" name="add" value="ADD NEW" class="btn btn_add mt-2 px-4 py-2">
                    </div>
                </form>
            </div>
            
            <div class="custom-table mt-5">
                <table class="table mb-0 table-hover table-bordered">
                    <thead class="bg_th">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Instruction ID</th>
                            <th scope="col">Instruction Description</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_POST['add'])){
                           
                            $itemdes = $_POST['itemdes'];

                            $sql = "INSERT INTO instruction (Ins_Des) VALUES ('$itemdes')";
                            mysqli_query($conn, $sql);
                        }

                        $sql1 = "SELECT * FROM instruction";
                        $res1 = mysqli_query($conn, $sql1);
                        $i = 1;
                        while($data = mysqli_fetch_assoc($res1)){
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $data['Ins_ID'];?></td>
                            <td><?php echo $data['Ins_Des'];?></td>
                            <td><a href="ins_edit.php?id=<?php echo $data['Ins_ID'];?>" class="btn btn-secondary">Edit</a></td>
                            <td><a href="ins_del.php?id=<?php echo $data['Ins_ID'];?>" class="btn btn-dark">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>


                

            