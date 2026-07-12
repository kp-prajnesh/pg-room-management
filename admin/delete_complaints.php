<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM complaints WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Complaint deleted successfully.');
                window.location='complaints.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting complaint.');
                window.location='complaints.php';
              </script>";
    }
}
?>