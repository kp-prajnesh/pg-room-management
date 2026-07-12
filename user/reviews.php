<?php
include '../includes/db.php';
include '../includes/session.php';

$user_id = $_SESSION['id'];

$query = "SELECT * FROM reviews WHERE user_id='$user_id' ORDER BY review_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Reviews</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin:20px;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        table,th,td{
            border:1px solid #ccc;
        }
        th,td{
            padding:10px;
            text-align:center;
        }
        th{
            background:#007bff;
            color:white;
        }
        .btn{
            padding:8px 15px;
            background:#28a745;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }
        .edit{
            background:#ffc107;
            color:black;
            padding:5px 10px;
            text-decoration:none;
            border-radius:4px;
        }
        .delete{
            background:#dc3545;
            color:white;
            padding:5px 10px;
            text-decoration:none;
            border-radius:4px;
        }
    </style>
</head>

<body>

<h2>My Reviews</h2>

<p>
    <a href="add_review.php" class="btn">+ Add Review</a>
</p>

<table>
<tr>
    <th>ID</th>
    <th>Rating</th>
    <th>Review</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['rating']; ?>/5</td>
    <td><?php echo $row['review']; ?></td>
    <td><?php echo $row['review_date']; ?></td>

    <td>
        <a class="edit" href="edit_review.php?id=<?php echo $row['id']; ?>">Edit</a>

        <a class="delete"
        href="delete_review.php?id=<?php echo $row['id']; ?>"
        onclick="return confirm('Delete this review?')">
        Delete
        </a>
    </td>
</tr>

<?php
}
?>

</table>

</body>
</html>