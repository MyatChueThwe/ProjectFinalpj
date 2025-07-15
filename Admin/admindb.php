<?php
include "./Navbar.php";
include "../db.php";

// Get total students
$res_students = mysqli_query($conn, "SELECT COUNT(*) AS total FROM user");
$row_students = mysqli_fetch_assoc($res_students);
$total_students = $row_students['total'];

// Get total courses
$res_courses = mysqli_query($conn, "SELECT COUNT(*) AS total FROM course");
$row_courses = mysqli_fetch_assoc($res_courses);
$total_courses = $row_courses['total'];

// Get total bookings
$res_bookings = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking");
$row_bookings = mysqli_fetch_assoc($res_bookings);
$total_bookings = $row_bookings['total'];

// Get total registrations (unique users who booked)
$res_regs = mysqli_query($conn, "SELECT COUNT(DISTINCT User_ID) AS total FROM booking");
$row_regs = mysqli_fetch_assoc($res_regs);
$total_regs = $row_regs['total'];

// Get student list with total course fees
$sql = "SELECT u.User_ID, u.User_Name, SUM(b.Total_amt) AS total_fees
        FROM user u
        LEFT JOIN booking b ON u.User_ID = b.User_ID
        GROUP BY u.User_ID, u.User_Name
        ORDER BY u.User_ID ASC";
$res = mysqli_query($conn, $sql);
?>

<div class="col-lg-10">
    <div class="row mx-2 gap-4 text-center">
        <div class="col-lg-2 border border-secondary card p-2 m-3 ">
            <i class="bi bi-people-fill fs-3 text-center"></i>
            <h6 class="text-secondary fw-bold fs-4"><?php echo $total_students; ?></h6>
            <h5>Total Students</h5>  
        </div>
        <div class="col-lg-2 border border-secondary card p-2 m-3">
            <i class="bi bi-card-checklist fs-3 text-center"></i>
            <h6 class="text-secondary fs-4"><?php echo $total_courses; ?></h6>
            <h5>Course</h5>
        </div>
        <div class="col-lg-2 border border-secondary card p-2 m-3">
            <i class="bi bi-person-check-fill fs-3 text-center"></i>
            <h6 class="text-secondary fs-4"><?php echo $total_bookings; ?></h6>
            <h5>Booking List</h5>
        </div>
        <div class="col-lg-2 border border-secondary card p-2 m-3">
            <i class="bi bi-ui-checks fs-3 text-center"></i>
            <h6 class="text-secondary fs-4"><?php echo $total_regs; ?></h6>
            <h5>Registration list</h5>
        </div>

        <!-- table section -->
        <div class="custom-table">
            <table class="table mb-0 table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total Course Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; while($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['User_ID']; ?></td>
                        <td><?php echo htmlspecialchars($row['User_Name']); ?></td>
                        <td><?php echo $row['total_fees'] ? $row['total_fees'] : 0; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>