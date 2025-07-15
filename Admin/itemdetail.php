<?php

include "../db.php";
include "./Navbar.php";

if(isset($_POST['save'])){
    $item = $_POST['item'];
    $ingredient = $_POST['ingredient'];
    $value = $_POST['value'];
    $instruction = $_POST['instruction'];

    // Corrected SQL query
    $sql = "INSERT INTO itemdetail (Itm_ID, Ing_ID, Ing_values, Ins_ID) VALUES ('$item', '$ingredient', '$value', '$instruction')";
    $res = mysqli_query($conn, $sql);

    // Check for errors
    if (!$res) {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
<div class="col-lg-10">
    <div class="row">
        <h3 class="p-4">Item-Detail</h3>
        <form id="userForm" class="w-50 ms-5 mt-4" method="post">
            <!-- Item Selection -->
            <div class="form-group mb-3">
                <label for="item">Item:</label>
                <select class="form-select border-2 border-black p-2" name="item" id="item" required>
                    <option disabled selected>Open this select Item</option>
                    <?php 
                        $sql = "SELECT * FROM item";
                        $res = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($res)):
                    ?>
                        <option value="<?php echo $row['Itm_ID']; ?>"><?php echo $row['Itm_Name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Ingredient Selection -->
            <div class="form-group mb-3">
                <label for="ingredient">Ingredient:</label>
                <select class="form-select border-2 border-black p-2" name="ingredient" id="ingredient" required>
                    <option disabled selected>Open this select Ingredient</option>
                    <?php 
                        $sql1 = "SELECT * FROM ingredient";
                        $res1 = mysqli_query($conn, $sql1);
                        while($row = mysqli_fetch_assoc($res1)):
                    ?>
                        <option value="<?php echo $row['Ing_ID']; ?>"><?php echo $row['Ing_Name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Value Input -->
            <div class="form-group mb-3">
                <label for="name">Value:</label>
                <input id="name" type="text" name="value" class="form-control border-2 border-black p-2"
                       placeholder="Ing-values..." required>
            </div>

            <!-- Instruction Selection -->
            <div class="form-group mb-4">
                <label for="instruction">Instruction:</label>
                <select class="form-select border-2 border-black p-2" name="instruction" id="instruction" required>
                    <option disabled selected>Open this select Instruction</option>
                    <?php 
                        $sql2 = "SELECT * FROM instruction";
                        $res2 = mysqli_query($conn, $sql2);
                        while($row = mysqli_fetch_assoc($res2)):
                    ?>
                        <option value="<?php echo $row['Ins_ID']; ?>"><?php echo $row['Ins_Des']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            
            <!-- Submit Button -->
            <button type="submit" name="save" class="btn btn-dark px-4">Save</button>
        </form>

        <div class="custom-table mt-5">
            <table class="table mb-0 table-hover table-bordered">
                <thead class="bg_th">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Ingredient Name</th>
                        <th scope="col">Value</th>
                        <th scope="col">Instruction</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "SELECT ID.Itm_ID,I.Itm_Name, S.Ins_Des, G.Ing_Name, ID.Ide_ID, ID.Ing_values FROM ITEMDETAIL AS ID
                    LEFT JOIN ITEM AS I ON ID.Itm_ID = I.Itm_ID
                    LEFT JOIN INSTRUCTION AS S ON ID.Ins_ID = S.Ins_ID
                    LEFT JOIN ingredient AS G ON ID.Ing_ID = G.Ing_ID ORDER BY I.Itm_ID ASC;";
                    $res1 = mysqli_query($conn, $sql1);
                    $i = 1;
                    while($data = mysqli_fetch_assoc($res1)){
                    ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $data['Ide_ID'];?></td>
                        <td><?php echo $data['Itm_Name'];?></td>
                        <td><?php echo $data['Ing_Name'];?></td>
                        <td><?php echo $data['Ing_values'];?></td>
                        <td><?php echo $data['Ins_Des'];?></td>
                        <td><a href="itmdet_edit.php?id=<?php echo $data['Ide_ID'];?>" class="btn btn-secondary">Edit</a></td>
                        <td><a href="itmdet_del.php?id=<?php echo $data['Ide_ID'];?>" class="btn btn-dark">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
