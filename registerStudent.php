<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

function isCurrentPage($page) {
    return strpos($_SERVER['PHP_SELF'], $page) !== false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="registerStudent.css">
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
            <h1>Register New Student</h1>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['success_message']; 
                unset($_SESSION['success_message']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo $_SESSION['error_message']; 
                unset($_SESSION['error_message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="registration-container">
            <form action="process_registration.php" method="POST" class="registration-form">
                <div class="form-group">
                    <label for="nic"><i class="fas fa-id-card"></i> NIC Number</label>
                    <input type="text" name="nic" id="nic" required>
                </div>

                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Full Name</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-group">
                    <label for="address"><i class="fas fa-envelope"></i> Email</label>
                    <input type="address" name="address" id="address" required>
                </div>

                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i> Phone</label>
                    <input type="tel" name="phone" id="phone" required>
                </div>

                <div class="form-group">
                    <label for="course"><i class="fas fa-graduation-cap"></i> Course</label>
                  <input type="text" name="course" id="course" required>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-user-plus"></i> Register Student
                </button>
            </form>
        </div>
    </div>
</body>
</html>