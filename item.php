<?php
include "./db.php";
include "./Nav.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

// Query to get ingredients and instruction
$sql = "SELECT 
            ID.Ing_ID,
            G.Ing_Name,
            ID.Ing_values,
            U.UNI_NAME,
            ID.ITM_ID,
            I.ITM_NAME,
            S.Ins_Des 
        FROM itemdetail AS ID
        JOIN INGREDIENT AS G ON G.Ing_ID = ID.Ing_ID
        JOIN UNIT AS U ON G.Uni_ID = U.Uni_ID
        JOIN ITEM AS I ON ID.ITM_ID = I.ITM_ID
        JOIN INSTRUCTION AS S ON ID.Ins_ID = S.Ins_ID
        WHERE ID.ITM_ID = '$id'";

$res = mysqli_query($conn, $sql);
$ingredients = [];

if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $ingredients[] = $row;
    }
}
?>

<?php if (!empty($ingredients)): ?>
    <!-- Ingredients Section -->
    <h2 class="text-center m-4 course-p"><?php echo $ingredients[0]['ITM_NAME']; ?></h2>  
    <div class="info">
        <h3 class="text-success course-p">Ingredients</h3>
        <?php foreach ($ingredients as $row): ?>
            <p class="text-success fs-5 fw-bold course-p">
                <i class="bi bi-check2-circle text-success"></i>
                <?php echo $row['Ing_values']; ?> 
                <?php echo $row['UNI_NAME']; ?> 
                <?php echo $row['Ing_Name']; ?>
            </p>
        <?php endforeach; ?>
    </div>

    <!-- Instruction Section -->
    <div class="background-image-container">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card recipe-card p-4">
                <div class="card-body text-center">
                    <h2 class="card-title mb-3"><?php echo $ingredients[0]['ITM_NAME']; ?></h2>
                    <hr class="my-4">
                    <h3 class="card-subtitle mb-4">Instructions</h3>
                    <ol class="list-unstyled text-start">
                        <li><?php echo $ingredients[0]['Ins_Des']; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- See More Button -->
    <div class="see-more">
        <button class="see-more-btn">
            <a href="./userlogin.php" class="see-more-text text-decoration-none">More Details</a>
        </button>
    </div>
<?php else: ?>
    <p class="text-danger text-center mt-5">No data found for this item.</p>
<?php endif; ?>

<?php include "./footer.php"; ?>
