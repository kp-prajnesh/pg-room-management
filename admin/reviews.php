<?php
include '../includes/db.php';
include '../includes/session.php';

$query = "SELECT reviews.*, users.name 
          FROM reviews 
          JOIN users 
          ON reviews.user_id = users.id
          ORDER BY reviews.review_date DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Reviews</title>

<style>
body{
    font-family:Arial;
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

.delete{
    background:#dc3545;
    color:white;
    padding:6px 10px;
    text-decoration:none;
    border-radius:5px;
}
</style>

</head>

<body>

<h2>Manage Reviews</h2>

<table>

<tr>
    <th>ID</th>
    <th>User Name</th>
    <th>Rating</th>
    <th>Review</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>
<?php echo $row['rating']; ?>/5
</td>

<td>
<?php echo $row['review']; ?>
</td>

<td>
<?php echo $row['review_date']; ?>
</td>

<td>

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