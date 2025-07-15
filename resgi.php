<?php
include "./nav.php";
include "db.php"; // DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $courses = isset($_POST['courses']) ? $_POST['courses'] : [];


    // 1. User Register
    $sql_user = "INSERT INTO user (User_Name, Email, Pass, Ph_Num) VALUES ('$name', '$email', '$password', '$phone')";
    mysqli_query($conn, $sql_user);
    $user_id = mysqli_insert_id($conn);

    // 2. Calculate Total Amount
    $total = 0;
    if (!empty($courses)) {
        $course_ids = implode(",", array_map('intval', $courses));
        $sql_fees = "SELECT SUM(C_Fees) AS total FROM course WHERE C_ID IN ($course_ids)";
        $result = mysqli_query($conn, $sql_fees);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
    }

    // 3. Insert Booking
    $sql_booking = "INSERT INTO booking (User_ID, B_Date, Total_amt) VALUES ('$user_id', NOW(), '$total')";
    mysqli_query($conn, $sql_booking);
    $booking_id = mysqli_insert_id($conn);

    // 4. Insert Bookdatail
    foreach ($courses as $course_id) {
        $sql_detail = "INSERT INTO bookdatail (B_ID, C_ID, B_amt) VALUES ('$booking_id', '$course_id', '$total')";
        mysqli_query($conn, $sql_detail);
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
                                    <input class="form-check-input course-checkbox" type="checkbox" name="courses[]" value="<?php echo $row['C_ID']; ?>" data-fee="<?php echo $row['C_Fees']; ?>" id="course<?php echo $row['C_ID']; ?>">
                                    <label class="form-check-label" for="course<?php echo $row['C_ID']; ?>">
                                       <?php echo $row['C_Name'];?> (<?php echo $row['C_Fees']; ?>)
                                    </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Total Amount Field (UI only, readonly) -->
                    <div class="mb-2">
                        <label for="total_ui" class="form-label">Total Amount :</label>
                        <input type="text" class="form-control" id="total_ui" value="0" readonly>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.course-checkbox');
    const totalField = document.getElementById('total_ui');

    function updateTotal() {
        let total = 0;
        checkboxes.forEach(cb => {
            if (cb.checked) {
                total += parseFloat(cb.getAttribute('data-fee')) || 0;
            }
        });
        totalField.value = total;
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateTotal);
    });
});
</script>
