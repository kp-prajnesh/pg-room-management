<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_user']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET
            name='$name',
            phone='$phone',
            email='$email',
            address='$address',
            username='$username',
            password='$password'
            WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location: manage_users.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

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

        <h1><i class="fa-solid fa-user-pen"></i> Edit User</h1>

        <form method="POST">

            <label>Full Name</label>
            <input type="text" name="name"
            value="<?php echo $row['name']; ?>" required>

            <label>Phone Number</label>
            <input type="text" name="phone"
            value="<?php echo $row['phone']; ?>" required>

            <label>Email</label>
            <input type="email" name="email"
            value="<?php echo $row['email']; ?>" required>

            <label>Address</label>
            <textarea name="address" rows="4" required><?php echo $row['address']; ?></textarea>

            <label>Username</label>
            <input type="text" name="username"
            value="<?php echo $row['username']; ?>" required>

            <label>Password</label>
            <input type="text" name="password"
            value="<?php echo $row['password']; ?>" required>

            <button type="submit" name="update_user">
                <i class="fa-solid fa-floppy-disk"></i> Update User
            </button>

        </form>

    </div>

</div>

</body>
</html>