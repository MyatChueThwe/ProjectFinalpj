<?php
include ("../db.php");
include ("./Navbar.php");

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $unit = $_POST['unit'];

    $sql = "INSERT INTO ingredient (Ing_Name, Uni_ID) VALUES ('$name', '$unit')";
    $res = mysqli_query($conn, $sql);
}

?>

   <div class="col-lg-10">
            
              <div class="row">

                 <h3 class="p-4">ingredient</h3>

                 <form id="userForm" class="w-50 ms-5" method="post">
                    <div class="form-group m-3">
                        <label for="iname">Name:</label>
                        <input id="name" type="text" name="name" class="form-control border-2 border-black p-2" placeholder="Ing-name..." required>
                    </div>
                    <select class="form-select border-2 border-black" style="width:37rem" name="unit" aria-label="Default select example">
                              <option selected>Open this select Unit</option>
                                      <?php 
                                         $sql = "SELECT * FROM unit";
                                         $res = mysqli_query($conn, $sql);
                                         while($row=mysqli_fetch_assoc($res)):
 
                                      ?>
                                      <option value="<?php echo $row['Uni_ID']; ?>"><?php echo $row['Uni_Name']; ?></option>
                                      <?php endwhile;?>
                                                     </select>
                    
                    <button type="submit" name="save" class="btn btn_add mt-3 px-4">Save</button>
                </form>

                <div class="custom-table mt-5 ">
                    <table class="table mb-0 table-hover table-bordered">
                        <thead class="bg_th">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Ingredient ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $sql1 = "SELECT * FROM ingredient";
                            $res1 = mysqli_query($conn, $sql1);
                            $i = 1;
                            while($data = mysqli_fetch_assoc($res1)){

                        ?>
                  <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $data['Ing_ID'];?></td>
                         <td><?php echo $data['Ing_Name'];?></td>
                         <td><?php echo $data['Uni_ID'];?></td>
                         <td><a href="ing_edit.php?id=<?php echo $data['Ing_ID'];?>" type="submit" class="btn btn-secondary">Edit</a></td>
                         <td><a href="ing_del.php?id=<?php echo $data['Ing_ID'];?>" type="submit" class="btn btn-dark">Delete</a></td>
                  </tr>

                        <?php } ?>
                        </tbody>
                    </table>

    </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>