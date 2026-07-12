<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if(isset($_POST['add_user']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,phone,email,address,username,password)
            VALUES('$name','$phone','$email','$address','$username','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('User Added Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add User</title>

<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/forms.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/admin_header.php"); ?>

<div class="content">

<h1><i class="fa-solid fa-user-plus"></i> Add User</h1>

<form method="POST">

<label>Full Name</label>
<input type="text" name="name" required>

<label>Phone Number</label>
<input type="text" name="phone" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Address</label>
<textarea name="address" rows="4" required></textarea>

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<button type="submit" name="add_user">
<i class="fa-solid fa-user-plus"></i> Add User
</button>

</form>

</div>

</div>

</body>
</html>