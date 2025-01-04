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

// Include database connection
require_once 'db_connect.php';

// Add this function after session checks and before HTML
function isCurrentPage($page) {
    return strpos($_SERVER['PHP_SELF'], $page) !== false;
}

// Query to count total students
$query = "SELECT COUNT(*) as total FROM students";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$totalStudents = $result['total'];

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
            <li><a href="dashboard.php" class="<?php echo isCurrentPage('dashboard.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="registerStudent.php" class="<?php echo isCurrentPage('registerStudent.php') ? 'active' : ''; ?>">
                <i class="fas fa-user-plus"></i> Register Student</a></li>
            <li><a href="viewStudents.php" class="<?php echo isCurrentPage('viewStudents.php') ? 'active' : ''; ?>">
                <i class="fas fa-users"></i> View Students</a></li>
            <li><a href="courses.php" class="<?php echo isCurrentPage('courses.php') ? 'active' : ''; ?>">
                <i class="fas fa-book"></i> Courses</a></li>
            <li><a href="schedule.php" class="<?php echo isCurrentPage('schedule.php') ? 'active' : ''; ?>">
                <i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="reports.php" class="<?php echo isCurrentPage('reports.php') ? 'active' : ''; ?>">
                <i class="fas fa-chart-bar"></i> Reports</a></li>
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
                <p><?php echo $totalStudents; ?></p>
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