<?php
include("../includes/db.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['user'];


$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/tables.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include("../includes/user_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/user_header.php"); ?>

<div class="content">

<h1><i class="fa-solid fa-user"></i> My Profile</h1>

<table>

<tr>
<th>Name</th>
<td><?php echo $user['name']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $user['email']; ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo $user['phone']; ?></td>
</tr>

<tr>
<th>Username</th>
<td><?php echo $user['username']; ?></td>
</tr>

</table>

<br><br>

<a href="edit_profile.php" class="btn">
<i class="fa-solid fa-pen"></i>
Edit Profile
</a>

&nbsp;&nbsp;

<a href="change_password.php" class="btn">
    <i class="fa-solid fa-key"></i>
    Change Password
</a>

</div>

<?php include("../includes/user_footer.php"); ?>

</div>

</body>
</html>