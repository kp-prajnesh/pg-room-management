<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if (isset($_POST['add_room'])) {

    $room_no = $_POST['room_no'];
    $pg_type = $_POST['pg_type'];
    $room_type = $_POST['room_type'];
    $capacity = $_POST['capacity'];
    $rent = $_POST['rent'];
    $status = $_POST['status'];

    $sql = "INSERT INTO rooms
    (room_no, pg_type, room_type, capacity, rent, status)
    VALUES
    ('$room_no','$pg_type','$room_type','$capacity','$rent','$status')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Room Added Successfully');</script>";
    }
    else{
        echo "<script>alert('Failed to Add Room');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/forms.css?v=1">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include("../includes/admin_sidebar.php"); ?>

<div class="main-content">

    <?php include("../includes/admin_header.php"); ?>

    <div class="content">

        <h1><i class="fa-solid fa-bed"></i> Add Room</h1>

        <form method="POST">

            <label>Room Number</label>
            <input type="text" name="room_no" required>

            <label>PG Type</label>
            <select name="pg_type" required>
                <option value="">Select PG Type</option>
                <option value="Boys">Boys</option>
                <option value="Girls">Girls</option>
            </select>

            <label>Room Type</label>
            <select name="room_type" required>
                <option value="">Select Room Type</option>
                <option value="Single Sharing">Single Sharing</option>
                <option value="Double Sharing">Double Sharing</option>
                <option value="Triple Sharing">Triple Sharing</option>
                <option value="Four Sharing">Four Sharing</option>
            </select>

            <label>Capacity</label>
            <input type="number" name="capacity" min="1" required>

            <label>Rent</label>
            <input type="number" name="rent" required>

            <label>Status</label>
            <select name="status" required>
                <option value="Available">Available</option>
                <option value="Occupied">Occupied</option>
                <option value="Under Maintenance">Under Maintenance</option>
            </select>

            <br><br>

            <button type="submit" name="add_room">
                <i class="fa-solid fa-plus"></i> Add Room
            </button>

        </form>

    </div>

</div>

</body>
</html>