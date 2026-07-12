<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if(isset($_POST['allocate_room']))
{
    $user_id = $_POST['user_id'];
    $room_id = $_POST['room_id'];
    $allocation_date = $_POST['allocation_date'];

    // Allocate room
    $sql = "INSERT INTO room_allocation(user_id, room_id, allocation_date)
            VALUES('$user_id','$room_id','$allocation_date')";

    if(mysqli_query($conn,$sql))
    {
        // Change room status
        mysqli_query($conn,"UPDATE rooms SET status='Occupied' WHERE id='$room_id'");

        echo "<script>alert('Room Allocated Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Allocation Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Allocate Room</title>

<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/tables.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/admin_header.php"); ?>

<div class="content">

<h1><i class="fa-solid fa-key"></i> Allocate Room</h1>

<form method="POST">

<label>Select User</label>

<select name="user_id" required>

<option value="">Select User</option>

<?php

$users=mysqli_query($conn,"SELECT * FROM users");

while($user=mysqli_fetch_assoc($users))
{
?>

<option value="<?php echo $user['id']; ?>">

<?php echo $user['name']; ?>

</option>

<?php
}
?>

</select>

<label>Select Room</label>

<select name="room_id" required>

<option value="">Select Room</option>

<?php

$rooms=mysqli_query($conn,"SELECT * FROM rooms WHERE status='Available'");

while($room=mysqli_fetch_assoc($rooms))
{
?>

<option value="<?php echo $room['id']; ?>">

<?php echo $room['room_no']; ?> -
<?php echo $room['room_type']; ?>

</option>

<?php
}
?>

</select>

<label>Allocation Date</label>

<input type="date" name="allocation_date" required>

<button type="submit" name="allocate_room">

<i class="fa-solid fa-key"></i>

Allocate Room

</button>

</form>

<br><br>

<h2><i class="fa-solid fa-list"></i> Allocated Rooms</h2>

<table>

<tr>

<th>ID</th>
<th>User Name</th>
<th>Room No</th>
<th>Room Type</th>
<th>Allocation Date</th>

</tr>

<?php

$sql="SELECT
room_allocation.id,
users.name,
rooms.room_no,
rooms.room_type,
room_allocation.allocation_date

FROM room_allocation

INNER JOIN users
ON room_allocation.user_id=users.id

INNER JOIN rooms
ON room_allocation.room_id=rooms.id";

$result=mysqli_query($conn,$sql);

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