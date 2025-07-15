<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Item List</title>
    <link rel="stylesheet" href="./adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- navbar start -->
    <nav class="navbar bg-black">
        <div class="container-fluid">
            <a class="navbar-brand fw-500" style="color:#F2F9DE ; margin-left: 15%;" href="#">Admin Dashboard</a>
            <span class="d-flex">
                <a href="#"><i class="bi bi-bell-fill fs-4 m-2"></i></a>
                <a href="#"><i class="bi bi-person-circle fs-4"></i></a>
            </span>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="row gx-0">
        <!-- Sidebar -->
        <div class="col-lg-2 bg-black sidebar-col">
            <h6>Material of Dashboard</h6>
            <ul class="list-group-flush text-light list-unstyled flex-column sidebar-nav-list ">
                <li class="list-group-item fst-italic"> <a href="./admindb.php" class="text-decoration-none"><i class="bi bi-view-stacked me-2"></i>Dashboard</a></li>
                <li class="list-group-item fst-italic"> <a href="./adminlist.php" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin list</a></li>
                <li class="list-group-item fst-italic"> <a href="./auserlist.php" class="text-decoration-none"><i class="bi bi-person-plus-fill me-2"></i>User list</a></li>
                <li class="list-group-item fst-italic"> <a href="./acourselist.php" class="text-decoration-none"><i class="bi bi-bookmarks-fill me-2"></i>Course list</a></li>
                <li class="list-group-item fst-italic active"> <a href="./aitemlist.php" class="text-decoration-none"><i class="bi bi-menu-up me-2"></i>Item list</a></li>
                <li class="list-group-item fst-italic"> <a href="./ingredient.php" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>Ingredients</a></li>
                <li class="list-group-item fst-italic"> <a href="./unit.php" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>Unit</a></li>
                <li class="list-group-item fst-italic"> <a href="./instruction.php" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>Instructions</a></li>
                <li class="list-group-item fst-italic"> <a href="./itemdetail.php" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>itemdetail</a></li>
                <li class="list-group-item fst-italic"> <a href="./aregistrationlist.php" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>Accept Detail list</a></li>
                <li class="list-group-item fst-italic"> <a href="./bookingdetaillist.php" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>Booking Detail list</a></li>
                <li class="list-group-item fst-italic"> <a href="../index.php" class="text-decoration-none"><i class="bi bi-box-arrow-right me-2"></i>Log out</a></li>
            </ul>
        </div>