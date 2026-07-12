<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$user_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));

$room_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM rooms"));

$allocation_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM room_allocation"));

$payment_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM payments"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../css/dashboard.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

    <?php include("../includes/admin_header.php"); ?>

    <div class="content">

        <h1>Dashboard</h1>

        <div class="cards">

            <div class="card">
                <i class="fa-solid fa-users"></i>
                <h3>Total Users</h3>
                <p><?php echo $user_count;?></p>
            </div>

            <div class="card">
                <i class="fa-solid fa-bed"></i>
                <h3>Total Rooms</h3>
                <p><?php echo $room_count;?></p>
            </div>

            <div class="card">
                <i class="fa-solid fa-key"></i>
                <h3>Allocated Rooms</h3>
                <p><?php echo $allocation_count;?></p>
            </div>

            <div class="card">
                <i class="fa-solid fa-money-bill"></i>
                <h3>Payments</h3>
                <p><?php echo $payment_count;?></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>