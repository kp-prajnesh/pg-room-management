<?php
session_start();
include("includes/db.php");

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check Admin
    $admin_query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $admin_result = mysqli_query($conn, $admin_query);

    if (mysqli_num_rows($admin_result) == 1) {

        $_SESSION['admin'] = $username;
        header("Location: admin/admin_dashboard.php");
        exit();

    }

    // Check User
    $user_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $user_result = mysqli_query($conn, $user_query);

    if (mysqli_num_rows($user_result) == 1) {

    $row = mysqli_fetch_assoc($user_result);

    $_SESSION['user'] = $username;
    $_SESSION['user_id'] = $row['id'];

    header("Location: user/user_dashboard.php");
    exit();

    }

    $error = "Invalid Username or Password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PG Room Management System</title>

    <!-- Common CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Login CSS -->
    <link rel="stylesheet" href="css/login.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container">

    <div class="login-card">

        <div class="logo">

            <i class="fa-solid fa-building"></i>

        </div>

        <h1>Smart PG</h1>

        <h3>Welcome</h3>

        <p>Please login to continue</p>

        <?php
        if (isset($error)) {
            echo "<p style='color:red; text-align:center; margin-bottom:15px;'>$error</p>";
        }
        ?> 
        
        <form method="POST">

            <div class="input-group">

                <i class="fa-solid fa-user"></i>

                <input
                type="text"
                name="username"
                placeholder="Enter Username"
                required>

            </div>

            <div class="input-group">

                <i class="fa-solid fa-lock"></i>

                <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter Password"
                required>

                <span onclick="showPassword()">

                    <i class="fa-solid fa-eye"></i>

                </span>

            </div>

            <button type="submit" name="login">

                <i class="fa-solid fa-right-to-bracket"></i>

                Login

            </button>

        </form>

    </div>

</div>

<script src="js/login.js"></script>

</body>

</html>