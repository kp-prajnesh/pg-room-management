<?php
include("../includes/db.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['user'];

if(isset($_POST['change_password']))
{
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$current_password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        if($new_password == $confirm_password)
        {
            $update = "UPDATE users
                       SET password='$new_password'
                       WHERE username='$username'";

            if(mysqli_query($conn,$update))
            {
                echo "<script>alert('Password Changed Successfully');</script>";
                echo "<script>window.location='profile.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('New Password and Confirm Password do not match');</script>";
        }
    }
    else
    {
        echo "<script>alert('Current Password is Incorrect');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Change Password</title>

<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/forms.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include("../includes/user_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/user_header.php"); ?>

<div class="content">

<h1><i class="fa-solid fa-lock"></i> Change Password</h1>

<form method="POST">

<label>Current Password</label>
<input type="password"
name="current_password"
required>

<label>New Password</label>
<input type="password"
name="new_password"
required>

<label>Confirm Password</label>
<input type="password"
name="confirm_password"
required>

<br><br>

<button type="submit" name="change_password">
<i class="fa-solid fa-key"></i>
Change Password
</button>

</form>

</div>

<?php include("../includes/user_footer.php"); ?>

</div>

</body>
</html>