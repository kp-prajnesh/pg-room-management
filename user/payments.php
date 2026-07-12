<?php
include("../includes/db.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['user'];

$sql = "SELECT
rooms.room_no,
payments.amount,
payments.issued_date,
payments.due_date,
payments.paid_date,
payments.payment_status

FROM payments

INNER JOIN room_allocation
ON payments.allocation_id = room_allocation.id

INNER JOIN rooms
ON room_allocation.room_id = rooms.id

INNER JOIN users
ON room_allocation.user_id = users.id

WHERE users.username='$username'";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Payments</title>

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

<h1><i class="fa-solid fa-money-bill"></i> My Payments</h1>

<table>

<tr>
    <th>Room No</th>
    <th>Amount</th>
    <th>Issued Date</th>
    <th>Due Date</th>
    <th>Paid Date</th>
    <th>Status</th>
</tr>

<?php

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
?>

<tr>

<td><?php echo $row['room_no']; ?></td>

<td>₹<?php echo $row['amount']; ?></td>

<td><?php echo $row['issued_date']; ?></td>

<td><?php echo $row['due_date']; ?></td>

<td><?php echo $row['paid_date']; ?></td>

<td><?php echo $row['payment_status']; ?></td>

</tr>

<?php
    }
}
else
{
?>

<tr>
<td colspan="6">No Payment Records Found</td>
</tr>

<?php
}
?>

</table>

</div>

<?php include("../includes/user_footer.php"); ?>

</div>

</body>
</html>