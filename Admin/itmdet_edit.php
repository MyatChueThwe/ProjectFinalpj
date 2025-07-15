<?php

include "../db.php";
include "./Navbar.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];   
}

if(isset($_POST['save'])) {
    $item = $_POST['item'];
    $ingredient = $_POST['ingredient'];
    $value = $_POST['value'];
    $instruction = $_POST['instruction'];

    // Corrected SQL query
    $sql = "UPDATE itemdetail 
            SET Itm_ID = '$item', 
                Ing_ID = '$ingredient', 
                Ing_values = '$value', 
                Ins_ID = '$instruction', 
            WHERE Ide_ID = '$id'"; // Use ItmDet_ID for the WHERE clause
    $res = mysqli_query($conn, $sql);

    // Check for errors
    if($res){
        echo "Category Updated Successfully";
    }
    header('location: itemdetail.php');
}

?>

<div class="col-lg-10">
    <div class="row">
        <h3 class="p-4">Ingredient</h3>
        <?php
        
        $sql = "SELECT * FROM itemdetail WHERE Ide_ID = '$id'"; // Use ItmDet_ID to fetch the correct record
        $res = mysqli_query($conn, $sql);

        // Check if the query was successful
        if (!$res) {
            echo "Error fetching data: " . mysqli_error($conn);
            exit; // Stop execution if there's an error
        }

        $data = mysqli_fetch_assoc($res);

        // Check if data was found
        if (!$data) {
            echo "No record found for the given ID.";
            exit; // Stop execution if no data is found
        }
        ?>
        <form id="userForm" class="w-50 ms-5 mt-4" method="post">
            <!-- Item Selection -->
            <div class="form-group mb-3">
                <label for="item">Item:</label>
                <select class="form-select border-2 border-black p-2" name="item" id="item" required>
                    <option disabled>Open this select Item</option>
                    <?php 
                        $sql = "SELECT * FROM item";
                        $res = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($res)):
                    ?>
                        <option value="<?php echo $row['Itm_ID']; ?>" <?php echo ($row['Itm_ID'] == $data['Itm_ID']) ? 'selected' : ''; ?>>
                            <?php echo $row['Itm_Name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Ingredient Selection -->
            <div class="form-group mb-3">
                <label for="ingredient">Ingredient:</label>
                <select class="form-select border-2 border-black p-2" name="ingredient" id="ingredient" required>
                    <option disabled>Open this select Ingredient</option>
                    <?php 
                        $sql1 = "SELECT * FROM ingredient";
                        $res1 = mysqli_query($conn, $sql1);
                        while($row = mysqli_fetch_assoc($res1)):
                    ?>
                        <option value="<?php echo $row['Ing_ID']; ?>" <?php echo ($row['Ing_ID'] == $data['Ing_ID']) ? 'selected' : ''; ?>>
                            <?php echo $row['Ing_Name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Value Input -->
            <div class="form-group mb-3">
                <label for="name">Value:</label>
                <input id="name" type="text" name="value" value="<?php echo $data['Ing_values']; ?>" class="form-control border-2 border-black p-2"
                       placeholder="Ing-values..." required>
            </div>

            <!-- Instruction Selection -->
            <div class="form-group mb-4">
                <label for="instruction">Instruction:</label>
                <select class="form-select border-2 border-black p-2" name="instruction" id="instruction" required>
                    <option disabled>Open this select Instruction</option>
                    <?php 
                        $sql2 = "SELECT * FROM instruction";
                        $res2 = mysqli_query($conn, $sql2);
                        while($row = mysqli_fetch_assoc($res2)):
                    ?>
                        <option value="<?php echo $row['Ins_ID']; ?>" <?php echo ($row['Ins_ID'] == $data['Ins_ID']) ? 'selected' : ''; ?>>
                            <?php echo $row['Ins_Des']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            
            <!-- Submit Button -->
            <button type="submit" name="save" class="btn btn-dark px-4">Save</button>
        </form>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
