<?php

include "../db.php";
include "./Navbar.php";

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    $sql = "INSERT INTO admin(Admin_Name,Pass,Email) VALUES ('$name','$pass','$email')";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "User added successfully";
    }else{
        echo "failed to add ";
    }
}

?>

       <!-- admin add section -->
        <div class="col-lg-10">
            
              <div class="row">

                 <h3 class="p-4">Admin</h3>

                 <form id="userForm" class="w-50 ms-5" method="post">
                    <div class="form-group m-3">
                        <label for="name">Name:</label>
                        <input id="name" type="text" name="name" class="form-control border-2 border-black p-2" placeholder="name..." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="email">Email:</label>
                        <input id="name" type="text" name="email" class="form-control border-2 border-black p-2" placeholder="email..." required>
                    </div>
                    <div class="form-group m-3">
                        <label for="password">Password:</label>
                        <input id="pass" type="password" name="pass" class="form-control border-2 border-black p-2" placeholder="password...." required>
                    </div>
                    <button type="submit" name="add" class="btn btn_add mt-3 px-4">ADD</button>
                </form>

                <!-- admin table section -->
            <div class="custom-table mt-5 ">
                <table class="table mb-0 table-hover table-bordered">
                    <thead class="bg_th">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Admin ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql1 = "SELECT * FROM admin";
                        $res1 = mysqli_query($conn, $sql1);
                        $i = 1;
                        while($data = mysqli_fetch_assoc($res1)){

                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $data['Admin_ID'];?></td>
                            <td><?php echo $data['Admin_Name'];?></td>
                            <td><?php echo $data['Pass'];?></td>
                            <td><?php echo $data['Email'];?></td>
                            <td><a href="admin_del.php?id=<?php echo $data['Admin_ID'];?>" type="submit" class="btn btn-dark">Delete</a></td>
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