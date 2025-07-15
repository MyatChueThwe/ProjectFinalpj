<?php
include "./db.php";
include "./Nav.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE Email='$email' AND Pass='$password'";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        $_SESSION['user_id'] = $row['User_ID'];
        $_SESSION['user_name'] = $row['User_Name'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<section class="login-section">
    <div class="login-container">
        <div class="image-section">
            <img src="./user login pg.png" alt="" width="100%" height="100%">
        </div>
        <div class="form-section">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Log in Form</h2>
            <hr class="mb-6 mx-auto w-24 border-blue-500 border-2 rounded-full">
            <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
            <form method="POST" action="userlogin.php">
                <div class="mb-4">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="your email ....." required>
                </div>
                <div class="mb-6">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="your password _" required>
                </div>
                <div class="link-text mb-4">
                    If you want an account, need to <a href="resgi.php">Registration first</a>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include "./footer.php"; ?>