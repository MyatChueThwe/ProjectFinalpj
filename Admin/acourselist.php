<?php

include ("../db.php");
include "./Navbar.php";

if (isset($_POST["add"])){
    $cname = $_POST['cname'];
    $cdes = $_POST['cdes'];
    $cfees = $_POST['cfees'];
    $cdate = $_POST['cdate'];
    $sql="INSERT INTO course(C_Name,C_Des,C_Fees,C_Date) VALUES ('$cname','$cdes','$cfees','$cdate')";
    mysqli_query($conn,$sql);
    // Redirect to prevent double insert
    header("Location: acourselist.php");
    exit();

}

?>


       <!-- admin add section -->
        <div class="col-lg-10">
            
              <div class="row">

                 <h3 class="p-4">Course List</h3>

                 <form id="userForm" class="w-50 ms-5 " method="post">
                    <div class="form-group m-3">
                        <input id="coursename" type="text" name="cname" class="form-control border-2 border-black p-2" placeholder="course-name..." required>
                    </div>
                    <div class="form-group m-3">
                        <input id="coursedes" type="text" name="cdes" class="form-control border-2 border-black p-2" placeholder="course-description.." required>
                    </div>
                    <div class="form-group m-3">
                        <input id="price" type="text" name="cfees" class="form-control border-2 border-black p-2" placeholder="fees" required>
                    </div>
                    <div class="form-group m-3">
                         <input type="text" name="cdate" class="form-control border-2 border-black p-2" id="date" placeholder="mm/dd/yyy">
                    </div>
                    <input type="submit" name="add" class="btn btn_add mt-3 px-4" value="Add New" >
                </form>

                <!-- admin table section -->
            <div class="custom-table mt-5 ">
                <table class="table mb-0 table-hover table-bordered">
                    <thead class="bg_th">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Date</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                          $sql1="SELECT * FROM course";
                          $res = mysqli_query($conn,$sql1);
                          $i=1;
                          while ($data = mysqli_fetch_assoc($res)){


                        ?>
                        <tr>
                            <td> <?php echo $i++;?></td>
                            <td><?php echo $data['C_ID'];?></td>
                            <td><?php echo $data['C_Name'];?></td>
                            <td><?php echo $data['C_Des'];?></td>
                            <td><?php echo $data['C_Fees'];?></td>
                            <td><?php echo $data['C_Date'];?></td>
                            <td><a href="course_edit.php?id=<?php echo $data['C_ID'];?>" type="submit" class="btn btn-secondary">Edit</a></td>
                            <td><a href="course_del.php?id=<?php echo $data['C_ID'];?>" type="submit" class="btn btn-dark">Delete</a></td>
                        </tr>
                        <?php
                          }
                          ?>
                        
                    </tbody>
                </table>
            </div>
                
             
        </div>

    </div>

        
    

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>