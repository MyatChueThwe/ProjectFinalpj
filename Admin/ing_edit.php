<?php

include "../db.php";
include "./Navbar.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get existing data
    
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $unit = $_POST['unit'];

    $sql2 = "UPDATE ingredient SET Ing_Name = '$name', Uni_ID = '$unit' WHERE Ing_ID = '$id'";

    
    $res2 = mysqli_query($conn, $sql2);
    header('location:ingredient.php');
}

?>

<?php

$sql = "SELECT * FROM ingredient WHERE Ing_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);

?>

<form id="userForm" class="w-50 ms-5" method="post">
    <div class="form-group m-3">
        <label for="iname">Name:</label>
        <input id="name" type="text" name="name" class="form-control border-2 border-black p-2"
        value="<?php echo $data['Ing_Name']; ?>"

        required>
    </div>

    <select class="form-select border-2 border-black p-2" name="unit" aria-label="Default select example">
        <option disabled>Open this select Unit</option>
        <?php 
        $sql1 = "SELECT * FROM unit";
        $res1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_assoc($res1)):
            $selected = ($row['Uni_ID'] == $data['Uni_Name']) ? 'selected' : '';
        ?>
            <option value="<?php echo $row['Uni_ID']; ?>" <?php echo $selected; ?>>
                <?php echo $row['Uni_Name']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit" name="save" class="btn btn_add mt-3 px-4">Save</button>
</form>
