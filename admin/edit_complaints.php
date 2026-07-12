<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$id = $_GET['id'];

// Fetch complaint details
$query = "SELECT * FROM complaints WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Update status
if (isset($_POST['update'])) {

    $status = $_POST['status'];

    $update = "UPDATE complaints SET status='$status' WHERE id='$id'";

    if (mysqli_query($conn, $update)) {
        echo "<script>
                alert('Complaint status updated successfully.');
                window.location='complaints.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Error updating complaint.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Complaint</title>
</head>
<body>

<h2>Edit Complaint Status</h2>

<form method="POST">

    <label>Complaint</label><br>
    <textarea rows="5" cols="50" readonly><?php echo $row['complaint_text']; ?></textarea>
    <br><br>

    <label>Status</label><br>
    <select name="status" required>
        <option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>
            Pending
        </option>

        <option value="In Progress" <?php if($row['status']=="In Progress") echo "selected"; ?>>
            In Progress
        </option>

        <option value="Resolved" <?php if($row['status']=="Resolved") echo "selected"; ?>>
            Resolved
        </option>
    </select>

    <br><br>

    <input type="submit" name="update" value="Update">

</form>

</body>
</html>