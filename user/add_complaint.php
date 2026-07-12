<?php
include("../includes/user_session.php");
include("../includes/db.php");

$user_id = $_SESSION['user_id'];

// Check if user has a room allocation
$query = "SELECT * FROM room_allocation WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);
$allocation = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Complaint</title>
</head>
<body>

<h2>Add Complaint</h2>

<?php
if (!$allocation) {
    echo "<p style='color:red;'>You have not been allocated a room yet.</p>";
} else {
?>

<form action="insert_complaint.php" method="POST">

    <input type="hidden" name="allocation_id" value="<?php echo $allocation['id']; ?>">

    <label>Complaint</label><br>
    <textarea name="complaint_text" rows="5" cols="50" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit Complaint">

</form>

<?php } ?>

</body>
</html>