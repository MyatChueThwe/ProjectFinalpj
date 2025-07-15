<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styles for the entire page */
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(to bottom, #f2f9de, #e0d8bf, #ccb9a6, #b59b90, #9b7f7d);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; 
            min-height: 100vh;
            overflow-x: hidden;
        }

        
        .page-container {
            flex-grow: 1; 
            display: flex; 
            flex-direction: column; /* Default to column stacking on small screens */
            padding-left: 0; /* Remove default padding for container-fluid */
            padding-right: 0;
            height: 100vh;
            
        }

        
        @media (min-width: 992px) { 
            .page-container {
                flex-direction: row;
            }
        }

        /* Navbar styling */
        .navbar-brand {
            margin-left: 15%; 
            color: #F2F9DE ;
            font-weight: 600;
        }
        .navbar .bi {
            color: #F2F9DE;
        }

        /* Sidebar column styling */
        .sidebar-col {
            background-color: black;
            color: #F2F9DE;
            padding-top: 1rem;
            /* min-height: 100vh removed as it can cause overflow on small screens or when content is short,
               flex-grow will make it fill available space vertically if parent has min-height: 100vh */
            position: sticky; /* Keep sidebar fixed when scrolling on larger screens */
            top: 0; /* Align to top of the viewport */
            height: 100%; /* Fill height of parent flex item */
        }

        /* Adjust sidebar appearance for smaller screens */
        @media (max-width: 991.98px) { /* Below large (lg) breakpoint */
            .sidebar-col {
                min-height: auto; /* Allow height to adjust to content on small screens */
                position: static; /* Remove sticky positioning on small screens */
                width: 100%; /* Take full width on small screens */
                padding-bottom: 1rem; /* Add some padding at the bottom when stacked */
            }
            /* Make sidebar list items horizontal and wrap on small screens */
            .sidebar-nav-list {
                display: flex; /* Use flexbox for horizontal layout */
                flex-wrap: wrap; /* Allow items to wrap to next line */
                justify-content: center; /* Center items if they wrap */
                padding: 0.5rem; /* Add some padding around the list */
            }
            .sidebar-nav-list .list-group-item {
                flex: 1 1 auto; /* Allow items to grow/shrink based on content */
                min-width: 140px; /* Minimum width for each item to prevent squishing */
                margin: 5px; /* Spacing between items */
                text-align: center; /* Center text within each item */
            }
            .sidebar-nav-list .list-group-item a {
                justify-content: center; /* Center content within link (icon + text) */
            }
        }

        .sidebar-col h6 {
            padding-left: 1rem; /* Align title with list items */
            margin-bottom: 1rem;
            font-size: 1rem; /* Adjust font size for heading */
            font-weight: 600; /* Make it bolder */
        }

        /* Styling for the navigation list inside the sidebar */
        .sidebar-nav-list {
            padding-left: 0; /* Remove default unordered list padding */
            margin-bottom: 0; /* Remove default unordered list margin */
        }

        .sidebar-nav-list .list-group-item {
            background-color: black;
            color: #F2F9DE;
            border: none; /* Remove default list group item border */
            padding: 0.75rem 1rem; /* Adjust padding for list items */
            transition: background-color 0.2s ease, color 0.2s ease; /* Smooth transition for hover effects */
            cursor: pointer;
            border-radius: 0.25rem; /* Slight rounding for list items */
        }

        .sidebar-nav-list .list-group-item a {
            color: #F2F9DE; /* Link text color */
            text-decoration: none; /* Remove underline from links */
            display: flex; /* Use flex to align icon and text side-by-side */
            align-items: center; /* Vertically center icon and text */
        }

        .sidebar-nav-list .list-group-item i {
            margin-right: 0.5rem; /* Space between icon and text */
        }

        .sidebar-nav-list .list-group-item:hover {
            background-color: #F2F9DE; /* Background changes on hover */
            color: black; /* Text color changes on hover */
        }
        .sidebar-nav-list .list-group-item:hover a,
        .sidebar-nav-list .list-group-item:hover i {
            color: black; /* Ensure link and icon color also change on hover */
        }

        /* Main content column styling */
        .main-content-col {
            
            padding: 20px;
            border-radius: 1rem; /* Rounded corners for the content area */
            box-shadow: 0 0 10px rgba(0,0,0,0.05); /* Subtle shadow for depth */
            flex-grow: 1; /* Allows it to take available space horizontally */
            /* min-height: calc(100vh - 56px) removed, let flexbox handle vertical filling */
        }

        /* Dashboard cards row styling */
        .dashboard-cards-row {
            margin-bottom: 30px; /* Space below the cards row */
            justify-content: center; /* Center cards horizontally when there's extra space */
            padding: 0.5rem; /* Add some padding to the row container */
            margin-left: -0.5rem; /* Compensate for internal column padding */
            margin-right: -0.5rem; /* Compensate for internal column padding */
        }
        .dashboard-cards-row > [class*="col-"] {
            padding-left: 0.5rem; /* Add padding between columns */
            padding-right: 0.5rem;
        }

        /* Individual dashboard card styling */
        .dashboard-card {
            background-color: white;
            padding: 20px;
            border-radius: 0.75rem; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Deeper shadow */
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 120px; /* Consistent height for all cards */
            border: 1px solid #e0e0e0; /* Subtle border */
            width: 100%; /* Ensure card takes full column width */
        }

        .dashboard-card i {
            font-size: 2.5rem; /* Larger icon size */
            color: #6c757d; /* Grey icon color */
            margin-bottom: 10px;
        }

        .dashboard-card h6.fs-4 { /* Styling for the number (e.g., '10') */
            font-weight: 700 !important; /* Make numbers bold */
            color: #343a40; /* Darker color for counts */
            margin-bottom: 0.25rem; /* Small space below number */
        }

        .dashboard-card h5 { /* Styling for the title (e.g., 'Total Students') */
            font-size: 0.95rem;
            color: #6c757d;
            margin-top: 5px;
            margin-bottom: 0;
        }
        /* Table container styling */
        .custom-table {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden; /* Ensures rounded corners apply to content */
            margin-top: 30px;
            border: 1px solid #e0e0e0;
            padding: 15px; /* Add padding inside the table container */
        }

        
        

        

    </style>
</head>
<body>

    <!-- Navbar start -->
    <nav class="navbar bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <span class="d-flex">
                <a href="#"><i class="bi bi-bell-fill fs-4 m-2"></i></a>
                <a href="#"><i class="bi bi-person-circle fs-4"></i></a>
            </span>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Main Content Area with Sidebar and Dashboard -->
    <div class="container-fluid page-container">
        <!-- Sidebar Column -->
        <div class="col-lg-2 col-md-4  sidebar-col">
            <h6>Material of Dashboard</h6>
            <ul class="list-group-flush text-light list-unstyled sidebar-nav-list">
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-view-stacked me-2"></i>Dashboard</a></li>
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin list</a></li>
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-person-plus-fill me-2"></i>User list</a></li>
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-bookmarks-fill me-2"></i>Course list</a></li>
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-menu-up me-2"></i>Item list</a></li>
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-ui-checks me-2"></i>Registration list</a></li>
                <li class="list-group-item fst-italic"> <a href="" class="text-decoration-none"><i class="bi bi-box-arrow-right me-2"></i>Log out</a></li>
            </ul>
        </div>

        <!-- Main Dashboard Content Column -->
        <div class="col-lg-10 col-md-8  main-content-col">
            <h3 class="mb-4">Dashboard</h3>

            <div class="row dashboard-cards-row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="dashboard-card">
                        <i class="bi bi-people-fill fs-3"></i>
                        <h6 class="text-secondary fw-bold fs-4">10</h6>
                        <h5>Total Students</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="dashboard-card">
                        <i class="bi bi-card-checklist fs-3"></i>
                        <h6 class="text-secondary fs-4">5</h6>
                        <h5>Course</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="dashboard-card">
                        <i class="bi bi-person-check-fill fs-3"></i>
                        <h6 class="text-secondary fs-4">20</h6>
                        <h5>Login List</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="dashboard-card">
                        <i class="bi bi-ui-checks fs-3"></i>
                        <h6 class="text-secondary fs-4">10</h6>
                        <h5>Registration list</h5>
                    </div>
                </div>
            </div>
             

             <!-- table section -->
             <div class="custom-table table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Course Fees</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Nils</td>
                            <td>100000</td>
                            <td><button class="btn btn-success">Accept</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                            <td>Jason</td>
                            <td>250000</td>
                            <td><button class="btn btn-success">Accept</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            

            





        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
