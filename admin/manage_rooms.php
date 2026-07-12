<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$result = mysqli_query($conn, "SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rooms</title>

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/tables.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<script src="../js/dashboard.js"></script>

<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/admin_header.php"); ?>

<div class="content">

<h1><i class="fa-solid fa-bed"></i> Manage Rooms</h1>
<a href="add_room.php" class="add-btn">
    <i class="fa-solid fa-plus"></i> Add New Room
</a>
<input type="text" id="searchInput"
placeholder="Search Room..."
onkeyup="searchRoom()">

<table>

<tr>
    <th>ID</th>
    <th>Room No</th>
    <th>PG Type</th>
    <th>Room Type</th>
    <th>Capacity</th>
    <th>Rent</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['room_no']; ?></td>

<td><?php echo $row['pg_type']; ?></td>

<td><?php echo $row['room_type']; ?></td>

<td><?php echo $row['capacity']; ?></td>

<td>₹ <?php echo $row['rent']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="edit_room.php?id=<?php echo $row['id']; ?>">
<i class="fa-solid fa-pen"></i></a>

&nbsp;&nbsp;

<a href="delete_room.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this room?')">

<i class="fa-solid fa-trash"></i>

</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>
</html>