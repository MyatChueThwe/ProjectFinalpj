<?php
include "../db.php";
include "./Navbar.php";

// Approve/Reject logic
if (isset($_GET['approve'])) {
    $bdetail_id = intval($_GET['approve']);
    mysqli_query($conn, "UPDATE bookdatail SET access=1 WHERE Bdetail_ID='$bdetail_id'");
}
if (isset($_GET['reject'])) {
    $bdetail_id = intval($_GET['reject']);
    mysqli_query($conn, "UPDATE bookdatail SET access=0 WHERE Bdetail_ID='$bdetail_id'");
}

// Booking list with user and course info
$sql = "SELECT bd.Bdetail_ID, u.User_Name, c.C_Name, bd.access
        FROM bookdatail bd
        JOIN booking b ON bd.B_ID = b.B_ID
        JOIN user u ON b.User_ID = u.User_ID
        JOIN course c ON bd.C_ID = c.C_ID
        ORDER BY bd.Bdetail_ID DESC";
$res = mysqli_query($conn, $sql);
?>

<div class="container mt-5">
    <h3 class="mb-4">User Course Access Control</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bdetail ID</th>
                <th>User Name</th>
                <th>Course Name</th>
                <th>Access</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $row['Bdetail_ID']; ?></td>
                <td><?php echo htmlspecialchars($row['User_Name']); ?></td>
                <td><?php echo htmlspecialchars($row['C_Name']); ?></td>
                <td>
                    <?php echo $row['access'] ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Not Approved</span>'; ?>
                </td>
                <td>
                    <?php if (!$row['access']): ?>
                        <a href="?approve=<?php echo $row['Bdetail_ID']; ?>" class="btn btn-success btn-sm">Approve</a>
                    <?php else: ?>
                        <a href="?reject=<?php echo $row['Bdetail_ID']; ?>" class="btn btn-warning btn-sm">Reject</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>