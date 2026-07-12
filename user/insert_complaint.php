<?php
include("../includes/user_session.php");
include("../includes/db.php");

if (isset($_POST['submit'])) {

    $allocation_id = $_POST['allocation_id'];
    $complaint_text = mysqli_real_escape_string($conn, $_POST['complaint_text']);
    $complaint_date = date("Y-m-d");
    $status = "Pending";

    $query = "INSERT INTO complaints (allocation_id, complaint_text, complaint_date, status)
              VALUES ('$allocation_id', '$complaint_text', '$complaint_date', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Complaint submitted successfully.');
                window.location='complaints.php';
              </script>";
    } else {
        echo "<script>
                alert('Error submitting complaint.');
                window.location='add_complaint.php';
              </script>";
    }
}
?>