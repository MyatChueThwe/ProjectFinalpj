<?php
include "../db.php";
include "./Navbar.php";

// Booking detail list
$sql = "SELECT 
            bd.Bdetail_ID, 
            u.User_Name, 
            c.C_Name, 
            bd.B_amt, 
            b.B_Date
        FROM bookdatail bd
        JOIN booking b ON bd.B_ID = b.B_ID
        JOIN user u ON b.User_ID = u.User_ID
        JOIN course c ON bd.C_ID = c.C_ID
        ORDER BY bd.Bdetail_ID DESC";
$res = mysqli_query($conn, $sql);
?>

<div class="col-lg-10 px-4 py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-4">Booking Detail List</h3>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bdetail ID</th>
                <th>User Name</th>
                <th>Course Name</th>
                <th>Amount</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $row['Bdetail_ID']; ?></td>
                <td><?php echo htmlspecialchars($row['User_Name']); ?></td>
                <td><?php echo htmlspecialchars($row['C_Name']); ?></td>
                <td><?php echo htmlspecialchars($row['B_amt']); ?></td>
                <td><?php echo htmlspecialchars($row['B_Date']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div> 