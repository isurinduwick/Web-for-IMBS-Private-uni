<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

function isCurrentPage($page) {
    return strpos($_SERVER['PHP_SELF'], $page) !== false;
}

$query = "SELECT * FROM students";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="editStudents.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>
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
            <li><a href="editStudents.php" class="<?php echo isCurrentPage('editStudents.php') ? 'active' : ''; ?>">
                <i class="fas fa-book"></i> Edit Students</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Edit Students</h1>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <div class="content">
            <div class="student-grid">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="student-card">
                        <div class="student-info">
                            <h3><i class="fas fa-user-graduate"></i> <?php echo $row['name']; ?></h3>
                            <div class="info-item">
                                <i class="fas fa-id-card"></i>
                                <span><strong>NIC:</strong> <?php echo $row['nic']; ?></span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Address:</strong> <?php echo $row['address']; ?></span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <span><strong>Telephone:</strong> <?php echo $row['telephone']; ?></span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-book"></i>
                                <span><strong>Course:</strong> <?php echo $row['course']; ?></span>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="edit-btn" onclick="editStudent(<?php echo $row['id']; ?>)">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="delete-btn" onclick="deleteStudent(<?php echo $row['id']; ?>)">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        function editStudent(id) {
            window.location.href = 'editStudentForm.php?id=' + id;
        }

        function deleteStudent(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href = 'deleteStudent.php?id=' + id;
            }
        }
    </script>
</body>
</html>
