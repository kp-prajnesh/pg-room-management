<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM rooms WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location: manage_rooms.php");
        exit();
    }
    else
    {
        echo "Failed to delete room.";
    }
}
?>