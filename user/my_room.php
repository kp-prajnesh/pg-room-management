<?php
include("../includes/db.php");
session_start();
if(!isset($_SESSION['user'])){header("Location: ../login.php");exit();}
$username=$_SESSION['user'];
$sql = "SELECT
            users.name,
            rooms.room_no,
            rooms.pg_type,
            rooms.room_type,
            rooms.capacity,
            rooms.rent,
            rooms.status,
            room_allocation.allocation_date
        FROM room_allocation
        INNER JOIN users
            ON room_allocation.user_id = users.id
        INNER JOIN rooms
            ON room_allocation.room_id = rooms.id
        WHERE users.username = '$username'";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>My Room</title>
<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/tables.css"></head><body>
<?php include("../includes/user_sidebar.php"); ?>
<div class="main-content">
<?php include("../includes/user_header.php"); ?>
<div class="content">
<h1>My Room</h1>
<?php if(mysqli_num_rows($result)>0){ $roomDetails=mysqli_fetch_assoc($result); ?>
<table>
<tr><th>Name</th><td><?php echo $roomDetails['name']; ?></td></tr>
<tr><th>Room Number</th><td><?php echo $roomDetails['room_no']; ?></td></tr>
<tr><th>PG Type</th><td><?php echo $roomDetails['pg_type']; ?></td></tr>
<tr><th>Room Type</th><td><?php echo $roomDetails['room_type']; ?></td></tr>
<tr><th>Capacity</th><td><?php echo $roomDetails['capacity']; ?></td></tr>
<tr><th>Monthly Rent</th><td><?php echo $roomDetails['rent']; ?></td></tr>
<tr><th>Room Status</th><td><?php echo $roomDetails['status']; ?></td></tr>
<tr><th>Allocation Date</th><td><?php echo $roomDetails['allocation_date']; ?></td></tr>
</table>
<?php } else { echo "<h3>No Room Allocated Yet.</h3>"; } ?>
</div></div></body></html>