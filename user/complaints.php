<?php
include("../includes/user_session.php");
include("../includes/db.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT c.*, r.room_no
          FROM complaints c
          JOIN room_allocation ra ON c.allocation_id = ra.id
          JOIN rooms r ON ra.room_id = r.id
          WHERE ra.user_id = '$user_id'
          ORDER BY c.id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Complaints</title>
    <style>
        table{
            width:100%;
            border-collapse:collapse;
        }
        table, th, td{
            border:1px solid black;
        }
        th, td{
            padding:10px;
            text-align:center;
        }
        a{
            text-decoration:none;
        }
    </style>
</head>
<body>

<h2>My Complaints</h2>

<p>
    <a href="add_complaint.php">➕ Add Complaint</a>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Room No</th>
        <th>Complaint</th>
        <th>Date</th>
        <th>Status</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['room_no']; ?></td>
        <td><?php echo $row['complaint_text']; ?></td>
        <td><?php echo $row['complaint_date']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>