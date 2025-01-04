<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $conn->prepare("INSERT INTO students (nic, name, address, telephone, course) VALUES (?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $_POST['nic'],
            $_POST['name'],
            $_POST['address'],
            $_POST['phone'],
            $_POST['course']
        ]);

        $_SESSION['success_message'] = "Student registered successfully!";
        header("Location: registerStudent.php");
        exit();
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Registration failed: " . $e->getMessage();
        header("Location: registerStudent.php");
        exit();
    }
}
?>
