<?php
include("../includes/db.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../login.php");
    exit();
}

$username=$_SESSION['user'];

$sql="SELECT * FROM users WHERE username='$username'";
$result=mysqli_query($conn,$sql);
$user=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $update="UPDATE users SET
    name='$name',
    email='$email',
    phone='$phone'
    WHERE username='$username'";

    if(mysqli_query($conn,$update))
    {
        echo "<script>alert('Profile Updated Successfully');</script>";
        echo "<script>window.location='profile.php';</script>";
    }
    else
    {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Profile</title>

<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/forms.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<?php include("../includes/user_sidebar.php"); ?>

<div class="main-content">

<?php include("../includes/user_header.php"); ?>

<div class="content">

<h1>Edit Profile</h1>

<form method="POST">

<label>Name</label>
<input type="text"
name="name"
value="<?php echo $user['name']; ?>"
required>

<label>Email</label>
<input type="email"
name="email"
value="<?php echo $user['email']; ?>"
required>

<label>Phone</label>
<input type="text"
name="phone"
value="<?php echo $user['phone']; ?>"
required>

<label>Username</label>
<input type="text"
value="<?php echo $user['username']; ?>"
readonly>

<br><br>

<button type="submit"
name="update_profile">

<i class="fa-solid fa-floppy-disk"></i>

Update Profile

</button>

</form>

</div>

</div>

</body>
</html>