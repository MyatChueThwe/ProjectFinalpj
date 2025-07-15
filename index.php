<?php
session_start();
include ("./nav.php");
include ("./db.php");

// Handle search and course filter
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : null;

// Build item query
if ($search !== '') {
    $sql1 = "SELECT item.*, course.* FROM item LEFT JOIN course ON item.C_ID = course.C_ID WHERE item.Itm_Name LIKE '%$search%' OR course.C_Name LIKE '%$search%'";
} else if ($course_id) {
    $sql1 = "SELECT * FROM item WHERE C_ID = $course_id";
} else {
    $sql1 = "SELECT * FROM item";
}
$res1 = mysqli_query($conn, $sql1);
?>

<!-- hero section start -->
<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./Hero bg.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Welcome to Bon Apetit!</h5>
        <p>We're here to share the delicious world of traditional Burmese snacks.</p>
        <p>Learn about unique ingredients, cultural stories, and helpful tips.</p>
        <p>Start your culinary journey and taste the true flavors of Myanmar today!</p>
         <button class="carousel-btn"><a href="./resgi.php" class="carousel-btn text-decoration-none">JOIN CLASS</a></button>
      </div>
    </div>
</div>
<!-- hero section end -->

<!-- course section start -->
<h2 class="title-design m-5 text-center">Class Information Here!</h2>
<div class="container px-3 text-center">
    <div class="row gx-3 row-cols-lg-3 row-cols-1 g-2">
      <div class="col">
        <div class="p-3 bg-tip fs-4"><i class="bi bi-buildings-fill fs-3 me-2"></i>Saturday-Sunday Class</div></div>
      <div class="col">
        <div class="p-3 bg-tip fs-4"><i class="bi bi-stopwatch-fill fs-3 me-2"></i>7AM-4PM (2days)</div>
      </div>
      <div class="col">
        <div class="p-3 bg-tip fs-4"><i class="bi bi-geo-alt-fill fs-3 me-2"></i>Thingangyun Branch</div>
      </div>
    </div>
</div>
<p class="course-p m-4 text-center ">If you want to join our class, you can find information about<br>the courses through these links.</p>
<div class="container text-center">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
    <?php
    $sql="select * from course";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
    ?>
      <div class="col">
        <div class="p-3 bg-course">
          <a href="index.php?course_id=<?php echo $row['C_ID']; ?>" class="text-decoration-none text-dark"><?php echo $row['C_Name']; ?></a>
        </div>
      </div>
    <?php } ?>
    </div>
</div>
<!-- course section end -->

<!-- search bar -->
<div class="container my-4">
  <form class="d-flex justify-content-center" method="get" action="index.php">
    <input class="form-control w-50 me-2" type="text" name="search" placeholder="Search item or course..." value="<?php echo htmlspecialchars($search); ?>">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</div>

<!-- snacks section start -->
<h3 class="text-center mt-5">Here are Our Traditional Burmese snacks!</h3>
<hr width="40%" class="line-snack">
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while($data = mysqli_fetch_assoc($res1)): ?>
      <div class="col">
        <div class="card snack-card">
          <img src="./img/<?php echo htmlspecialchars($data['Itm_Img']); ?>" height="300px" alt="...">
          <div class="card-body">
            <h4 class="card-title"><?php echo htmlspecialchars($data['Itm_Name']); ?></h4>
            <p class="card-text"><?php echo htmlspecialchars($data['Itm_Des']); ?></p>
            <button class="snack-btn">
              <a href="item.php?id=<?php echo htmlspecialchars($data['Itm_ID']); ?>" class="snack-btn-text text-decoration-none">More Info</a>
            </button>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<div class="see-more">
  <button class="see-more-btn"><a href="./Ccourse.php" class="see-more-text text-decoration-none">See More</a></button>
</div>
<!-- snacks section end -->

<?php include ("./footer.php"); ?>