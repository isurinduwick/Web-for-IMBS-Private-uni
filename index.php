<?php
// Start a session to manage login status
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    //password and username both are admin
    if ($username === "admin" && $password === "admin") {

        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); //will redirect to dashboard.php
        exit();
    } else {
        // Invalid login
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">



</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (!empty($error)) {
            echo "<p class='error'>$error</p>";
        } ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>