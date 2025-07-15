<?php
include "./db.php";
include "./Nav.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql_ing = "SELECT  ID.Ing_ID,G.Ing_Name, ID.Ing_values,U.UNI_NAME,ID.ITM_ID,I.ITM_NAME,S.Ins_Des
    FROM itemdetail AS ID,
		 INGREDIENT AS G,
         INSTRUCTION AS S,
		 UNIT AS U, 
         ITEM AS I
    WHERE G.Ing_ID = ID.Ing_ID AND G.Uni_ID = U.Uni_ID AND ID.ITM_ID=I.ITM_ID AND ID.Ins_ID=S.Ins_ID AND ID.ITM_ID= '$id'";
$res_ing = mysqli_query($conn, $sql_ing);
$ingredients = [];
$instructions = [];
$item_name = "";

if ($res_ing && mysqli_num_rows($res_ing) > 0) {
    while ($row = mysqli_fetch_assoc($res_ing)) {
        $ingredients[] = $row;
        $item_name = $row['ITM_NAME'];
        $instructions[] = $row['Ins_Des'];
    }
}


?>

<!-- Display HTML -->
<h2 class="text-center m-4 course-p"><?php echo $item_name; ?></h2>

<!-- Ingredients Section -->
<div class="info">
    <h3 class="text-success course-p">Ingredients</h3>
    <?php foreach ($ingredients as $ing): ?>
        <p class="text-success fs-5 fw-bold course-p">
            <i class="bi bi-check2-circle text-success"></i>
            <?php echo $ing['Ing_values'] . " " . $ing['UNI_NAME'] . " " . $ing['Ing_Name']; ?>
        </p>
    <?php endforeach; ?>
</div>

<!-- Instructions Section -->
<div class="background-image-container" style=" background-image: url('./မုန့်လက်ကောက်.jpg'); ">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card recipe-card p-4">
            <div class="card-body text-center">
                <h2 class="card-title mb-3"><?php echo $item_name; ?></h2>
                <hr class="my-4">
                <h3 class="card-subtitle mb-4">Instructions</h3>
                <?php if (count($instructions) > 0): ?>
                    <ol class="text-start">
                        <?php foreach ($instructions as $ins): ?>
                            <li><?php echo nl2br(htmlspecialchars($ins)); ?></li>
                        <?php endforeach; ?>
                    </ol>
                <?php else: ?>
                    <p class="text-muted">No instructions available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- See More -->
<div class="see-more">
    <button class="see-more-btn">
        <a href="./userlogin.php" class="see-more-text text-decoration-none">More Details</a>
    </button>
</div>

<?php include "./footer.php"; ?>
