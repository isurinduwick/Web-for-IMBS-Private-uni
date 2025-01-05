<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $course = $_POST['course'];

    $query = "UPDATE students SET name=:name, nic=:nic, address=:address, telephone=:telephone, course=:course WHERE id=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':nic', $nic);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: editStudents.php');
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
    <title>Edit Student</title>
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
            <li><a href="editStudents.php" class="<?php echo isCurrentPage('editStudents.php') ? 'active' : ''; ?>">
                <i class="fas fa-book"></i> Edit Students</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Edit Student</h1>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <div class="form-container">
            <form method="POST" action="editStudentForm.php">
                <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nic">NIC:</label>
                    <input type="text" id="nic" name="nic" value="<?php echo $student['nic']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $student['address']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="telephone">Telephone:</label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo $student['telephone']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="course">Course:</label>
                    <input type="text" id="course" name="course" value="<?php echo $student['course']; ?>" required>
                </div>

                <button type="submit" class="submit-btn">Update Student</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
