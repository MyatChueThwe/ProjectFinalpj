<?php
include "./nav.php";
include "db.php"; // DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Register User
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];
    $courses = isset($_POST['courses']) ? $_POST['courses'] : [];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql_user = "INSERT INTO user (User_Name, Email, Pass, Ph_Num) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_user);
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $phone);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // Insert booking
    $sql_booking = "INSERT INTO booking (User_ID, B_Date, Total_amt) VALUES (?, NOW(), ?)";
    $stmt = $conn->prepare($sql_booking);
    $stmt->bind_param("is", $user_id, $total);
    $stmt->execute();
    $booking_id = $stmt->insert_id;

    // Insert bookdatail
    $sql_detail = "INSERT INTO bookdatail (B_ID, C_ID, B_amt) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_detail);
    foreach ($courses as $course_id) {
        $stmt->bind_param("iis", $booking_id, $course_id, $total);
        $stmt->execute();
    }

    echo "<script>alert('Booking Successful!');window.location='index.php';</script>";
}
?>

    <!-- navbar end -->
    <section class="login-section">
        <div class="login-container">
            <!-- Image Section (Left side on larger screens, top on smaller screens) -->
            <div class="image-section">
                <img src="./registration form pg.jpg" alt="" width="100%" height="100%">
            </div>
    
            <!-- Form Section (Right side on larger screens, bottom on smaller screens) -->
            <div class="form-section">
                <h2 class="text-3xl font-bold mb-6 text-center ">Booking Form</h2>
                
    
                <form method="POST" action="resgi.php">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="your name ......" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="your email ....." required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="your password _" required>
                    </div>
                    
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone No :</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="your ph-num.." required>
                    </div>
                    <div class="mb-6">
                        <label class="form-label d-block">Choose Courses :</label>
                        <div class="row">
                            <?php 
                             $sql="select * from course";
                             $res=mysqli_query($conn,$sql);
                             while($row=mysqli_fetch_assoc($res)){
                            ?>
                            <div class="col-md-4 col-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="courses[]" value="<?php echo $row['C_ID']; ?>" id="course<?php echo $row['C_ID']; ?>">
                                    <label class="form-check-label" for="course<?php echo $row['C_ID']; ?>">
                                       <?php echo $row['C_Name'];?>
                                    </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
    
                    <!-- Total Amount Field -->
                <div class="mb-2">
                    <label for="total" class="form-label">Total Amount :</label>
                    <input type="text" class="form-control" name="total" id="total" placeholder="total amount..." required>
                </div>
                
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


<?php

include "./footer.php";

?>
