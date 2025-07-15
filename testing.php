<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Light grey background for the whole page */
            min-height: 100vh;
            display: flex; /* Use flexbox for body to ensure content stretches */
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        /* Custom styles for the sidebar */
        .sidebar {
            width: 250px; /* Fixed width for sidebar */
            background-color: #343a40; /* Dark background */
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed; /* Fixed position */
            height: 100vh; /* Full height */
            left: 0;
            top: 0;
            transition: all 0.3s;
            z-index: 1000; /* Ensure sidebar is on top */
        }

        .sidebar.collapsed {
            width: 0; /* Hide sidebar */
            overflow: hidden;
        }

        .sidebar-header {
            padding: 15px 20px;
            margin-bottom: 20px;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .sidebar-menu .nav-link {
            color: #adb5bd; /* Light grey text for links */
            padding: 12px 20px;
            display: flex;
            align-items: center;
            border-radius: 0.5rem; /* Rounded corners for menu items */
            margin: 5px 10px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar-menu .nav-link.active,
        .sidebar-menu .nav-link:hover {
            background-color: #495057; /* Slightly lighter dark for hover/active */
            color: white;
        }

        .sidebar-menu .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px; /* Offset for the sidebar */
            flex-grow: 1; /* Take remaining space */
            padding: 20px;
            transition: margin-left 0.3s;
            background: linear-gradient(to right, #e0e0e0, #f5f5f5); /* Gradient background as in image */
            min-height: 100vh; /* Ensure it covers full height */
            border-radius: 1rem; /* Rounded corners for the main content area */
            box-shadow: 0 0 10px rgba(0,0,0,0.05); /* Subtle shadow */
            position: relative; /* For top-right icons */
        }

        .main-content.expanded {
            margin-left: 0; /* No offset when sidebar is collapsed (on smaller screens) */
        }

        /* Top bar within main content */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dee2e6; /* Separator */
            margin-bottom: 20px;
        }

        .top-bar .icons i {
            font-size: 1.5rem;
            margin-left: 20px;
            cursor: pointer;
            color: #495057;
        }

        /* Dashboard summary cards */
        .dashboard-card {
            background-color: white;
            padding: 20px;
            border-radius: 0.75rem; /* More rounded corners */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Deeper shadow for cards */
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 120px; /* Fixed height for cards */
        }

        .dashboard-card i {
            font-size: 2.5rem;
            color: #6c757d; /* Grey icon color */
            margin-bottom: 10px;
        }

        .dashboard-card .count {
            font-size: 1.8rem;
            font-weight: 700;
            color: #343a40;
        }

        .dashboard-card .title {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Table styling */
        .custom-table {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden; /* Ensures rounded corners apply to content */
            margin-top: 30px;
        }

        .custom-table thead {
            background-color: #f2f2f2; /* Light grey header */
            color: #343a40;
        }

        .custom-table th, .custom-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none; /* No border for the last row */
        }

        .btn-accept {
            background-color: #28a745; /* Green color */
            color: white;
            border-radius: 0.5rem;
            padding: 8px 15px;
            transition: background-color 0.2s ease;
        }
        .btn-accept:hover {
            background-color: #218838;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545; /* Red color */
            color: white;
            border-radius: 0.5rem;
            padding: 8px 15px;
            transition: background-color 0.2s ease;
        }
        .btn-delete:hover {
            background-color: #c82333;
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar.show {
                width: 250px;
            }
            .main-content.shrink {
                 margin-left: 250px;
            }
            .navbar-toggler {
                display: block; /* Show hamburger icon */
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            Materials of Dashboard
        </div>
        <ul class="nav flex-column sidebar-menu">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-users-cog"></i> Admin list
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user-circle"></i> User list
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-book"></i> Course list
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-boxes"></i> Item list
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user-plus"></i> Registration list
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-auto" href="#"> <!-- mt-auto pushes it to bottom -->
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <nav class="navbar navbar-light bg-light d-md-none">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand me-auto" href="#">Admin Dashboard</a>
                <div class="icons d-flex">
                    <i class="fas fa-bell"></i>
                    <i class="fas fa-user-circle ms-3"></i>
                </div>
            </div>
        </nav>

        <div class="top-bar d-none d-md-flex">
            <h2>Admin Dashboard</h2>
            <div class="icons">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>
            </div>
        </div>

        <h3 class="mb-4">Dashboard</h3>

        <!-- Dashboard Cards -->
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="dashboard-card">
                    <i class="fas fa-users"></i>
                    <div class="count">10</div>
                    <div class="title">Total Student</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="dashboard-card">
                    <i class="fas fa-book"></i>
                    <div class="count">5</div>
                    <div class="title">Course</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="dashboard-card">
                    <i class="fas fa-sign-in-alt"></i>
                    <div class="count">2</div>
                    <div class="title">Login List</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="dashboard-card">
                    <i class="fas fa-user-plus"></i>
                    <div class="count">2</div>
                    <div class="title">Registration List</div>
                </div>
            </div>
        </div>

        <!-- Registration List Table -->
        <div class="custom-table">
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
                        <td><button class="btn btn-accept">Accept</button></td>
                        <td><button class="btn btn-delete">Delete</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2</td>
                        <td>Jason</td>
                        <td>250000</td>
                        <td><button class="btn btn-accept">Accept</button></td>
                        <td><button class="btn btn-delete">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        // JavaScript for toggling sidebar on smaller screens
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const navbarToggler = document.querySelector('.navbar-toggler');

            if (navbarToggler) {
                navbarToggler.addEventListener('click', function() {
                    sidebar.classList.toggle('show'); // Bootstrap's 'show' class for collapse/expand
                    // You might want to adjust main-content margin if sidebar collapses/expands
                    // For fixed sidebar, main content doesn't need to move.
                    // For smaller screens, the main-content doesn't have a margin-left by default due to CSS.
                    // If you want main content to shift on mobile when sidebar opens, you'd add/remove a class.
                    // The current CSS effectively hides/shows the sidebar on mobile and main content stays put.
                });
            }

            // Optional: Close sidebar if clicked outside (for mobile)
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768 && sidebar.classList.contains('show') &&
                    !sidebar.contains(event.target) && !navbarToggler.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            });

             // Adjust main content margin based on sidebar state on resize
             function adjustLayout() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('show'); // Ensure sidebar is not 'show' when desktop view
                    mainContent.style.marginLeft = '250px';
                } else {
                    // On small screens, if sidebar is not 'show', ensure no margin-left
                    if (!sidebar.classList.contains('show')) {
                         mainContent.style.marginLeft = '0';
                    }
                }
            }

            // Initial adjustment
            adjustLayout();

            // Add resize listener
            window.addEventListener('resize', adjustLayout);
        });
    </script> -->
</body>
</html>
