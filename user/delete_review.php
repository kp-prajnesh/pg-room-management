<?php
include '../includes/db.php';
include '../includes/session.php';

$user_id = $_SESSION['id'];

$id = $_GET['id'];

$query = "DELETE FROM reviews 
          WHERE id='$id' 
          AND user_id='$user_id'";

$result = mysqli_query($conn, $query);

if($result)
{
    echo "<script>
            alert('Review deleted successfully.');
            window.location='reviews.php';
          </script>";
}
else
{
    echo "<script>
            alert('Failed to delete review.');
            window.location='reviews.php';
          </script>";
}

?>