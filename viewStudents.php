<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require_once 'db_connect.php';

function isCurrentPage($page) {
    return strpos($_SERVER['PHP_SELF'], $page) !== false;
}

$students = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = $_POST['nic'];
    $query = "SELECT * FROM students WHERE nic LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(["%$nic%"]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="dashboard.css">
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
            <li><a href="editStudents.php" class="<?php echo isCurrentPage('courses.php') ? 'active' : ''; ?>">
                <i class="fas fa-book"></i> Edit Students</a></li>
           </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>View Students</h1>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <div class="content">
            <form method="POST" action="viewStudents.php">
                <div class="form-group">
                    <label for="nic"><i class="fas fa-id-card"></i> Search by NIC</label>
                    <input type="text" name="nic" id="nic" placeholder="Enter NIC number" required>
                </div>
                <button type="submit" class="submit-btn"><i class="fas fa-search"></i> Search</button>
            </form>

            <?php if (!empty($students)): ?>
                <div class="student-list">
                    <h2>Search Results</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>NIC</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($student['nic']); ?></td>
                                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                                    <td><?php echo htmlspecialchars($student['address']); ?></td>
                                    <td><?php echo htmlspecialchars($student['telephone']); ?></td>
                                    <td><?php echo htmlspecialchars($student['course']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>

</html>