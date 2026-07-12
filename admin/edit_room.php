<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM rooms WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_room']))
{
    $room_no = $_POST['room_no'];
    $pg_type = $_POST['pg_type'];
    $room_type = $_POST['room_type'];
    $capacity = $_POST['capacity'];
    $rent = $_POST['rent'];
    $status = $_POST['status'];

    $sql = "UPDATE rooms SET
            room_no='$room_no',
            pg_type='$pg_type',
            room_type='$room_type',
            capacity='$capacity',
            rent='$rent',
            status='$status'
            WHERE id='$id'";

    if(mysqli_query($conn,$sql))
    {
        header("Location: manage_rooms.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Room</title>

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

<h1>Edit Room</h1>

<form method="POST">

<label>Room Number</label>
<input type="text" name="room_no" value="<?php echo $row['room_no']; ?>" required>

<label>PG Type</label>
<select name="pg_type" required>
    <option value="Boys" <?php if($row['pg_type']=="Boys") echo "selected"; ?>>Boys</option>
    <option value="Girls" <?php if($row['pg_type']=="Girls") echo "selected"; ?>>Girls</option>
</select>

<label>Room Type</label>
<select name="room_type" required>
    <option value="Single Sharing" <?php if($row['room_type']=="Single Sharing") echo "selected"; ?>>Single Sharing</option>
    <option value="Double Sharing" <?php if($row['room_type']=="Double Sharing") echo "selected"; ?>>Double Sharing</option>
    <option value="Triple Sharing" <?php if($row['room_type']=="Triple Sharing") echo "selected"; ?>>Triple Sharing</option>
    <option value="Four Sharing" <?php if($row['room_type']=="Four Sharing") echo "selected"; ?>>Four Sharing</option>
</select>

<label>Capacity</label>
<input type="number" name="capacity" value="<?php echo $row['capacity']; ?>" required>

<label>Rent</label>
<input type="number" name="rent" value="<?php echo $row['rent']; ?>" required>

<label>Status</label>
<select name="status" required>
    <option value="Available" <?php if($row['status']=="Available") echo "selected"; ?>>Available</option>
    <option value="Occupied" <?php if($row['status']=="Occupied") echo "selected"; ?>>Occupied</option>
    <option value="Under Maintenance" <?php if($row['status']=="Under Maintenance") echo "selected"; ?>>Under Maintenance</option>
</select>

<button type="submit" name="update_room">
    <i class="fa-solid fa-floppy-disk"></i> Update Room
</button>

</form>

</div>

</div>

</body>
</html>