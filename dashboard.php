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
</head>
<body>
    <!-- <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1> -->
  
    <h1>this is the dashboard</h1>
</body>
</html>