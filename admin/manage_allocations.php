<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$sql = "SELECT
        room_allocation.id,
        users.name,
        rooms.room_no,
        rooms.room_type,
        room_allocation.allocation_date
        FROM room_allocation
        INNER JOIN users ON room_allocation.user_id = users.id
        INNER JOIN rooms ON room_allocation.room_id = rooms.id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Allocated Rooms</title>

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/tables.css">
</head>

<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/admin_header.php"); ?>

<div class="content">

<h1>Allocated Rooms</h1>

<table>

<tr>
    <th>ID</th>
    <th>User Name</th>
    <th>Room No</th>
    <th>Room Type</th>
    <th>Allocation Date</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['room_no']; ?></td>

<td><?php echo $row['room_type']; ?></td>

<td><?php echo $row['allocation_date']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>
</html>