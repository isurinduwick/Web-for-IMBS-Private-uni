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
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Campus Dashboard</h3>
        </div>
        <ul>
            <li><a href="registerStudent.php">Register Student</a></li>
            <li><a href="#">View Students</a></li>
            <li><a href="#">Courses</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
        
        <div class="content">
            <h2>Dashboard Overview</h2>
            <!-- Add dashboard content here -->
        </div>
    </div>

    <script>
        function showRegistrationForm() {
            document.getElementById('registrationForm').style.display = 'block';
        }
    </script>
</body>
</html>