<?php
include ("./nav.php");
include ("./db.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];

  // Course info
  $sql = "SELECT * FROM course WHERE C_ID = '$id'";
  $res = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($res)){
?>
    <h2 class="text-center m-4 course-p">
      <?php echo htmlspecialchars($row['C_Name']); ?>
    </h2>
    <div class="info">
      <p class="text-success fw-bold course-p">
        <i class="bi bi-check-circle-fill text-success"></i>
        <?php echo htmlspecialchars($row['C_Des']); ?>
        <hr width="auto">
      </p>
      <p class="text-success fw-bold course-p">
        <i class="bi bi-check-circle-fill text-success"></i>
        <?php echo htmlspecialchars($row['C_Fees']); ?> MMK
        <hr width="300px">
      </p>
    </div>
<?php
  }
?>
    <h4 class="text-center m-4 course-p"> The following snack-making techniques:</h4>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
          // !!! ပြဿနာဖြစ်နေတဲ့ SQL ကို ဒီလိုပြောင်းပါ !!!
          $sql1 = "SELECT * FROM item WHERE C_ID = '$id'";
          $res1 = mysqli_query($conn, $sql1);
          while($data = mysqli_fetch_assoc($res1)):
        ?>
          <div class="col">
            <div class="card snack-card">
              <img src="./img/<?php echo htmlspecialchars($data['Itm_Img']); ?>" height="300px" alt="...">
              <div class="card-body">
                <h4 class="card-title"><?php echo htmlspecialchars($data['Itm_Name']); ?></h4>
                <p class="card-text"><?php echo htmlspecialchars($data['Itm_Des']); ?></p>
                <button class="snack-btn">
                  <a href="item4montlmy.html" class="snack-btn-text text-decoration-none">More Info</a>
                </button>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
<?php
} else {
  // id မရှိရင် item အားလုံးပြပါ
?>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
          $sql1 = "SELECT * FROM item";
          $res1 = mysqli_query($conn, $sql1);
          while($data = mysqli_fetch_assoc($res1)):
        ?>
          <div class="col">
            <div class="card snack-card">
              <img src="./img/<?php echo htmlspecialchars($data['Itm_Img']); ?>" height="300px" alt="...">
              <div class="card-body">
                <h4 class="card-title"><?php echo htmlspecialchars($data['Itm_Name']); ?></h4>
                <p class="card-text"><?php echo htmlspecialchars($data['Itm_Des']); ?></p>
                <button class="snack-btn">
                  <a href="item4montlmy.html" class="snack-btn-text text-decoration-none">More Info</a>
                </button>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
<?php } ?>

<div class="see-more">
  <button class="see-more-btn">
    <a href="resgi.html" class="see-more-text text-decoration-none">Join Class</a>
  </button>
</div>

<?php include("./footer.php") ?>