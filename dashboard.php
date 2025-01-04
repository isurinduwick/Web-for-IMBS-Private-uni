<?php
session_start();

//no one can access dashboard page without login
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    
    header("Location: index.php");
    exit();
}
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: index.php");
    exit();
}
 //dashboard only visible only the user enter correct username and password

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Campus Dashboard</h3>
        </div>
        <ul>
            <li><a href="registerStudent.php"><i class="fas fa-user-plus"></i> Register Student</a></li>
            <li><a href="#"><i class="fas fa-users"></i> View Students</a></li>
            <li><a href="#"><i class="fas fa-book"></i> Courses</a></li>
            <li><a href="#"><i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Reports</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-user-graduate"></i>
                <h3>Total Students</h3>
                <p>150</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-book"></i>
                <h3>Active Courses</h3>
                <p>12</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-chalkboard-teacher"></i>
                <h3>Lecturers</h3>
                <p>25</p>
            </div>
            
            </div>
        </div>

        
    
</body>
</html>