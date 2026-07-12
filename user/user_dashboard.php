<?php
include("../includes/db.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<link rel="stylesheet" href="../css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include("../includes/user_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/user_header.php"); ?>

<div class="content">

<div class="cards">

<a href="profile.php" class="card-link">
<div class="card">
<i class="fa-solid fa-user fa-2x"></i>
<h3>My Profile</h3>
<p>View Your Profile</p>
</div>
</a>

<a href="my_room.php" class="card-link">
<div class="card">
<i class="fa-solid fa-bed fa-2x"></i>
<h3>My Room</h3>
<p>View Room Details</p>
</div>
</a>

<a href="payments.php" class="card-link">
<div class="card">
<i class="fa-solid fa-money-bill fa-2x"></i>
<h3>My Payments</h3>
<p>View Payment History</p>
</div>
</a>

<a href="complaints.php" class="card-link">
<div class="card">
<i class="fa-solid fa-triangle-exclamation fa-2x"></i>
<h3>Complaints</h3>
<p>Raise a Complaint</p>
</div>
</a>

<a href="reviews.php" class="card-link">
<div class="card">
<i class="fa-solid fa-star fa-2x"></i>
<h3>Reviews</h3>
<p>Give Your Feedback</p>
</div>
</a>

</div>

</div>

<?php include("../includes/user_footer.php"); ?>

</div>

</body>
</html>