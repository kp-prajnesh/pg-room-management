<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$query = "SELECT
            c.id,
            u.name,
            r.room_no,
            c.complaint_text,
            c.complaint_date,
            c.status
          FROM complaints c
          JOIN room_allocation ra ON c.allocation_id = ra.id
          JOIN users u ON ra.user_id = u.id
          JOIN rooms r ON ra.room_id = r.id
          ORDER BY c.id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Complaints</title>

    <style>
        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:10px;
            text-align:center;
        }

        a{
            text-decoration:none;
            padding:5px 10px;
        }
    </style>
</head>

<body>

<h2>Manage Complaints</h2>

<table>

<tr>
    <th>ID</th>
    <th>User</th>
    <th>Room</th>
    <th>Complaint</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['room_no']; ?></td>
    <td><?php echo $row['complaint_text']; ?></td>
    <td><?php echo $row['complaint_date']; ?></td>
    <td><?php echo $row['status']; ?></td>

    <td>
        <a href="edit_complaints.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="delete_complaints.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this complaint?');">
           Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

</body>
</html>