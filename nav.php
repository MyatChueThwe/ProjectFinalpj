<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon Apiti</title>
    <link rel="stylesheet" href="./style.css">
    <!-- bootstrap link --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> 
    
  <style>
        .snack-card{
            border-top-left-radius: 40%;
        }
     </style>
</head>
     <!-- navbar start -->

     <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="./img pj/sticker-chef-cuisine-cook-wall-bon-apetit-4c773f87bd0369fcb953c826ee8888f2.png" alt="Logo" width="80" height="50" class="d-inline-block align-text-top"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.php">Home</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Courses
                </a>
                <ul class="dropdown-menu">
                 <?php
$sql="SELECT * FROM course";
$res = mysqli_query($conn,$sql);
$i=1;
while($data = mysqli_fetch_assoc($res)){
                ?>
                 <li><a class="dropdown-item" href="Ccourse.php?id=<?php echo $data['C_ID'];?>"><?php echo $data['C_Name'];?></a></li>
                 <?php } ?>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./about.php">About Us</a>
              </li>
              <?php if (isset($_SESSION['user_name'])): ?>
                <li class="nav-item">
                  <span class="nav-link"> <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="./userlogin.php">Log In</a>
                </li>
              <?php endif; ?>
            </ul>
            <form class="d-flex mr-5" role="search" method="get" action="index.php">
                <span class="bg-white d-flex spam-search">
                  <input class="form-control me-2 text-dark" name="search" type="search" placeholder="Search item or course..." aria-label="Search"/>
                  <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search text-dark fs-4"></i></button>
                </span>
            </form>
          </div>
        </div>
      </nav>  