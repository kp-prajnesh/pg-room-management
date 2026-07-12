<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$sql = "SELECT p.id,u.name,r.room_no,p.amount,p.issued_date,p.due_date,
p.paid_date,p.payment_status
FROM payments p
INNER JOIN room_allocation ra ON p.allocation_id=ra.id
INNER JOIN users u ON ra.user_id=u.id
INNER JOIN rooms r ON ra.room_id=r.id
ORDER BY p.id DESC";

$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payments</title>
<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/tables.css">
</head>
<body>

<?php include("../includes/admin_sidebar.php"); ?>
<div class="main-content">
<?php include("../includes/admin_header.php"); ?>

<div class="content">
<h1>Payments</h1>

<p><a href="add_payment.php">+ Add Payment</a></p>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th>
<th>Room</th>
<th>User</th>
<th>Amount</th>
<th>Issued Date</th>
<th>Due Date</th>
<th>Paid Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['name']; ?></td>
<td>₹<?php echo $row['amount']; ?></td>
<td><?php echo $row['issued_date']; ?></td>
<td><?php echo $row['due_date']; ?></td>
<td><?php echo $row['paid_date']; ?></td>
<td><?php echo $row['payment_status']; ?></td>
<td>
<a href="edit_payment.php?id=<?php echo $row['id']; ?>">Edit</a> |
<a href="delete_payment.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this payment?');">Delete</a>
</td>
</tr>
<?php
}
}else{
?>
<tr>
<td colspan="9" align="center">No Payment Records Found</td>
</tr>
<?php } ?>
</table>

</div>
</div>
</body>
</html>