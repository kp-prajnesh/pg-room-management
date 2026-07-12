<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/tables.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/admin_header.php"); ?>

<div class="content">

<h1><i class="fa-solid fa-users"></i> Manage Users</h1>

<a href="add_user.php" class="add-btn">
    <i class="fa-solid fa-user-plus"></i> Add New User
</a>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Username</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['username']; ?></td>

<td>

<a href="edit_user.php?id=<?php echo $row['id']; ?>">
<i class="fa-solid fa-pen"></i>
</a>

&nbsp;&nbsp;

<a href="delete_user.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this user?')">

<i class="fa-solid fa-trash"></i>

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>